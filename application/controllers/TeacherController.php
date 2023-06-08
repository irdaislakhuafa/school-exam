<?php
class TeacherController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function auth()
    {
        $currentUser = $this->session->get_userdata();
        if (isset($currentUser)) {
            if (isset($currentUser["userId"])) {
                if ($this->teacherModel->get(array('id' => $currentUser["userId"]))) {
                    return;
                }
            }
        }
        redirect(base_url() . "teacher/login");
    }

    // TODO: add auth
    public function index()
    {
        $this->load->view("teacher/login");
    }

    public function login()
    {
        // retrieve login data (email, password)
        $formLogin = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'email/passowrd diperlukan untuk login');
            redirect(base_url() . "teacher/");
        }

        // // TODO: check email and password from database
        $teacher = $this->teacherModel->getByEmail($formLogin["email"]);
        if ($teacher == null) {
            $this->session->set_flashdata('error', 'Email tidak terdaftar sebagai guru!');
            redirect(base_url() . "teacher/");
        }

        if ($teacher->password != hash('sha256', $formLogin["password"])) {
            $this->session->set_flashdata('error', 'Password salah');
            redirect(base_url() . 'teacher/');
        }

        // set session variable
        $this->session->set_userdata(array(
            "userId" => $teacher->id,
            "userName" => $teacher->name,
        ));
        redirect(base_url() . "teacher/home");
    }

    public function home()
    {
        // add auth
        $this->auth();
        $currentUser = $this->session->get_userdata();

        // get list class by teacher id
        $listClass = $this->classModel->getListByTeacherId($currentUser["userId"]);
        for ($i = 0; $i < count($listClass); $i++) {
            $listStudent = $this->studentModel->getListByClassId($listClass[$i]["id"]);
            if ($listStudent != null || $listStudent != array()) {
                $listClass[$i]["totalStudent"] = count($listStudent);
            } else {
                $listClass[$i]["totalStudent"] = 0;
            }
        }
        $data["listClass"] = $listClass;

        $this->load->view("teacher/home", $data);
    }

    // TODO: add auth
    public function newClass()
    {
        $this->load->view("teacher/newClass");
    }

    // TODO: add auth
    // TODO: add login to create new class
    public function createClass()
    {
        // TODO: add auth

        // array
        $classData = $this->input->post();

        // handle input validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('tema', 'Tema', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'semua data harus di isi!');
            redirect(base_url() . "teacher/class/new");
        }


        // handle if class code already exists
        $currentUser = $this->session->get_userdata();
        $existingClass = $this->classModel->getByCodeAndTeacherId($classData["code"], $currentUser["userId"]);
        if ($existingClass != null) {
            $this->session->set_flashdata('error', 'kode kelas sudah ada dikelas "' . $existingClass->name . '"');
            redirect(base_url() . "teacher/class/new");
        }

        // save it to database
        $classData["teacherId"] = $currentUser["userId"];
        $isOk = $this->classModel->insert($classData);
        if (!$isOk) {
            var_dump($isOk);
            $this->session->set_flashdata('error', 'gagal menyimpan data');
            redirect(base_url() . "teacher/class/new");
        }
        // success create a class
        $this->session->set_flashdata('success', 'Berhasil membuat kelas "' . $classData["name"] . '"');
        redirect(base_url() . "teacher/class/subtema/select");
    }
    // TODO: added method to edit class
    // TODO: added method to view scores student of class
    // TODO: add auth
    public function editClass()
    {
        $requestBody = $this->input->post();
        $class = $this->classModel->get(array('id' => $requestBody["id"]));
        if ($class == null) {
            $this->session->set_flashdata('error', 'kelas dengan id' . $requestBody["id"] . " tidak ada!");
            redirect(base_url() . "teacher/home");
        }

        $data["class"] = $class;
        $this->load->view("teacher/editClass", $data);
    }

    public function updateClass()
    {
        $requestBody = $this->input->post();
        if (!$this->classModel->update(array("id" => $requestBody["id"]), $requestBody)) {
            $this->session->set_flashdata('error', 'gagal mengupdate data');
        }
        // TODO: update materi/subtema

        $this->session->set_flashdata('success', 'Data berhasil update');
        // TODO: update materi/subtema later
        // redirect(base_url() . "teacher/class/subtema/selectEdit");
        redirect(base_url() . "teacher/home");
    }

    // TODO: add auth
    public function selectSubtema()
    {
        $data['listSubtema'] = $this->subtemaModel->getList();
        $this->load->view("teacher/selectSubtema", $data);
    }

    // TODO: add auth
    public function newMateri($subtemaId, $questionNumber = 0)
    {
        $data['subtema'] = $this->subtemaModel->get(array('id' => $subtemaId));
        $data['questionNumber'] = $questionNumber == 0 ? 1 : $questionNumber;

        if ($questionNumber != 0 && $questionNumber <= 6) {
            // to store uploaded images
            $images = array();

            // upload images
            for ($i = 1; $i <= 3; $i++) {
                $imgKey = 'image' . $i;
                $imgDescription = 'image' . $i . "Description";

                // var_dump(isset($_FILES[$imgKey]));
                // var_dump($_FILES[$imgKey]);
                if (isset($_FILES[$imgKey]) == true) {
                    if ($_FILES[$imgKey]['name'] != "") {
                        // upload config
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] =  'gif|jpg|jpeg|png';
                        $config['max_size'] = (1024 * 5); // 5MB

                        // $fileName = $_FILES();
                        $fileName = $this->random->generateUUID() . $_FILES[$imgKey]['name'];
                        $config['file_name'] = $fileName;

                        // TODO: for loop to upload file here
                        $this->load->library('upload', $config);

                        // if upload failed
                        if (!$this->upload->do_upload($imgKey)) {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('error', $error);
                            // TODO: show error on display
                            var_dump($error);
                            return;
                        }

                        array_push($images, array(
                            $imgKey . "Url" => $fileName,
                            $imgKey . "Text" => $this->input->post($imgDescription),
                        ));
                    }
                }
            }

            // $requestBody = ;

            // save materi
            $materi = array(
                "subtemaId" => $subtemaId,
                "content" => $this->input->post('content'),
                "title" => $this->input->post('title'),
                "number" => $this->input->post('number'),
            );

            $materiId = $this->random->generateUUID();
            if (!$this->materiModel->insert($materi, $materiId)) {
                var_dump("Failed to insert materi");
                return;
            }

            // save images data
            foreach ($images as $i => $value) {
                $key = 'image' . ($i + 1);
                $image = array(
                    "materiId" => $materiId,
                    "name" => $value[$key . "Url"],
                    "description" => $value[$key . "Text"],
                );

                if (!$this->imagesModel->insert($image)) {
                    var_dump("Failed to insert image");
                    return;
                }
            }

            //  save soal
            for ($i = 1; $i <= 2; $i++) {
                $soal = array(
                    "materiId" => $materiId,
                    "question" => $this->input->post("question" . $i),
                );

                if (!$this->soalModel->insert($soal)) {
                    var_dump("Failed to insert soal");
                    return;
                }
            }
        }

        if ($questionNumber >= 6) {
            redirect(base_url() . "teacher/class/subtema/select");
        } else {
            $this->load->view("teacher/newMateri", $data);
        }

        return;
    }

    // TODO: add auth
    public function selectEditSubtema()
    {
        $listSubtema = $this->subtemaModel->getList();
        $data['listSubtema'] = $listSubtema;
        $this->load->view("teacher/selectEditSubtema", $data);
        return;
    }

    // TODO: add auth
    // TODO: add support to update subtema
    public function updateSubtema()
    {
        return;
    }

    // TODO: add auth
    public function selectSubtemaResult()
    {
        $listSubtema = $this->subtemaModel->getList();
        $data['listSubtema'] = $listSubtema;
        $this->load->view("teacher/selectSubtemaResult", $data);
        return;
    }

    // TODO: add auth
    public function resultMateri($classId, $subtemaId)
    {
        $data["listMateri"] = $this->materiModel->getList(array("classId" => $classId, "subtemaId" => $subtemaId));
        $this->load->view("teacher/resultMateri", $data);
        return;
    }

    public function resultSubtema($classId)
    {
        $listSubtema = $this->subtemaModel->getList();
        $data['listSubtema'] = $listSubtema;
        $data["classId"] = $classId;
        $this->load->view("teacher/resultSubtema", $data);
        return;
    }

    public function resultStudent($classId, $materiId)
    {
        $data["listStudent"] = $this->studentModel->getList(array("classId" => $classId));
        $data["materi"] = $this->materiModel->get(array("id" => $materiId));

        $listSoal = $this->soalModel->getList(array("materiId" => $materiId));
        for ($i = 0; $i < count($data["listStudent"]); $i++) {
            $data["listStudent"][$i]->listSoal = array();
            foreach ($listSoal as $value) {
                $answer = $this->answerModel->get(array("soalId" => $value->id, "studentId" => $data["listStudent"][$i]->id));

                if ($answer == null) {
                    $answer = "";
                } else {
                    $answer = $answer->answer;
                }

                $soal = array(
                    "question" => $value->question,
                    "answer" => $answer,
                );

                array_push($data["listStudent"][$i]->listSoal, $soal);
            }
        }

        $this->load->view("teacher/resultStudent", $data);
        return;
    }

    public function saveScores()
    {
        $requestBody = $this->input->post();
        for ($i = 0; $i < $requestBody["studentLength"]; $i++) {
            $score = array(
                "materiId" => $requestBody["materiId"],
                "studentId" => $requestBody["studentId" . $i],
                "value" => $requestBody["studentScore" . $i]
            );

            $result = $this->scoresModel->insert($score);
            if ($result == null) {
                var_dump("error saat menyimpan nilai");
                return;
            }
        }

        redirect(base_url() . "teacher/home");
        return;
    }


    public function viewResultSubtema($classId)
    {
        $data["listSubtema"] = $this->subtemaModel->getList();
        $data["classId"] = $classId;
        $this->load->view("teacher/viewResultSubtema", $data);
        return;
    }

    public function viewResultMateri($classId, $subtemaId)
    {
        $data["listMateri"] = $this->materiModel->getList(array("classId" => $classId, "subtemaId" => $subtemaId));
        $this->load->view("teacher/viewResultMateri", $data);
        return;
    }


    public function viewResultStudent($classId, $materiId)
    {
        $data["listStudent"] = $this->studentModel->getList(array("classId" => $classId));
        $data["materi"] = $this->materiModel->get(array("id" => $materiId));

        $listSoal = $this->soalModel->getList(array("materiId" => $materiId));
        for ($i = 0; $i < count($data["listStudent"]); $i++) {
            // added list soal/question of materi
            $data["listStudent"][$i]->listSoal = array();
            foreach ($listSoal as $value) {
                $answer = $this->answerModel->get(array("soalId" => $value->id, "studentId" => $data["listStudent"][$i]->id));

                if ($answer == null) {
                    $answer = "";
                } else {
                    $answer = $answer->answer;
                }

                $soal = array(
                    "question" => $value->question,
                    "answer" => $answer,
                );

                array_push($data["listStudent"][$i]->listSoal, $soal);
            }

            // added scores
            $data["listStudent"][$i]->score = 0;
            $score = $this->scoresModel->get(array("materiId" => $data["materi"]->id, "studentId" => $data["listStudent"][$i]->id));
            if (!($score == null)) {
                $data["listStudent"][$i]->score = $score->value;
            }
        }

        $this->load->view("teacher/viewResultStudent", $data);
        return;
    }
}
