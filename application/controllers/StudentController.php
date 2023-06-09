<?php
class StudentController extends CI_Controller
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
                if ($this->studentModel->get(array('id' => $currentUser["userId"]))) {
                    return;
                }
            }
        }
        redirect(base_url() . "student/");
    }

    public function index()
    {
        $this->load->view("student/login");
    }

    public function register()
    {
        $this->load->view("student/register");
        return;
    }

    public function saveRegister()
    {
        $requestBody = $this->input->post();
        $class = $this->classModel->get(array("code" => $requestBody["classCode"]));
        if ($class == null) {
            $this->session->set_flashdata('error', "Kelas dengan kode " . $requestBody["classCode"] . " tidak ada!");
            redirect(base_url() . "student/register");
            return;
        }

        $student = $this->studentModel->insert(array(
            "name" => $requestBody["name"],
            "noAbsen" => $requestBody["absenCode"],
            "classId" => $class->id,
        ));

        if ($student == null) {
            $this->session->set_flashdata('error', "Gagal mendaftar sebagai siswa!");
            redirect(base_url() . "student/register");
            return;
        }

        redirect(base_url() . "student/");
    }

    public function login()
    {
        // TODO: change relation student to use many to many

        $class = $this->classModel->get(array("code" => $this->input->post("classCode")));
        if ($class == null) {
            $this->session->set_flashdata('error', "Kelas dengan kode " . $this->input->post("classCode") . " tidak ada!");
            redirect(base_url() . "student/");
            return;
        }

        $student = $this->studentModel->get(array(
            "name" => $this->input->post("name"),
            "noAbsen" => $this->input->post("absenCode"),
            "classId" => $class->id,
        ));
        if ($student == null) {
            $this->session->set_flashdata('error', "Siswa tidak terdaftar");
            // var_dump($student);
            redirect(base_url() . "student/");
            return;
        }

        $this->session->set_userdata(array(
            "userId" => $student->id,
            "userName" => $student->name,
            "classId" => $class->id
        ));
        redirect(base_url() . "student/maps");
    }

    public function maps($position = 1)
    {
        $this->auth();

        $student = $this->studentModel->get(array("id" => $this->session->get_userdata()["userId"]));
        $data["student"] = $student;
        $data["listSubtema"] = $this->subtemaModel->getList();
        $data["position"] = $position;
        $this->load->view("student/maps", $data);
    }

    public function checkAlreadyAnswer($subtemaId)
    {
        $this->auth();

        $currentUser = $this->session->get_userdata();
        $subtema = $this->subtemaModel->get(array("id" => $subtemaId));
        var_dump($this->session->get_userdata()["classId"]);
        $listMateri = $this->materiModel->getList(array('subtemaId' => $subtemaId, "classId" => $this->session->get_userdata()["classId"]));
        if ($listMateri == null) {
            $this->session->set_flashdata('error', "Materi kosong");
            redirect(base_url() . "student/maps/" . $subtema->name);
            return;
        }

        // TODO: check if already answered
        // foreach ($listMateri as $im => $materi) {
        //     $listSoal = $this->soalModel->getList(array("materiId" => $materi->id));
        //     foreach ($listSoal as $is => $soal) {
        //         $totalAnswered = $this->answerModel->get(array("studentId" => $currentUser["userId"], "soalId" => $soal->id));
        //         // if already answered
        //         if ($totalAnswered != null) {
        //             $this->session->set_flashdata("error", "Subtema sudah di kerjakan");
        //             redirect(base_url() . "student/maps");
        //             return;
        //         }
        //     }
        // }

        redirect(base_url() . "student/materi/" . $subtemaId);
    }

    public function materi($subtemaId, $number = 1)
    {
        $this->auth();


        if ($number >= 6) {
            redirect(base_url() . "student/maps");
            return;
        }

        $data["subtema"] = $this->subtemaModel->get(array("id" => $subtemaId));
        if (!$data["subtema"]) {
            echo "Subtema tidak ada";
            return;
        }

        $data["materi"] = $this->materiModel->get(array("subtemaId" => $subtemaId, "number" => $number, "classId" => $this->session->get_userdata()["classId"]));
        if (!$data["materi"]) {
            echo "Materi tidak ada";
            return;
        }

        $data["images"] = $this->imagesModel->getList(array("materiId" => $data["materi"]->id));

        $this->load->view("student/materi", $data);
    }

    public function saveAnswer($subtemaId, $number)
    {
        $this->auth();

        // redirect to maps if number of materi => 6
        if ($number >= 6) {
            redirect(base_url() . "student/maps");
            return;
        }

        // TODO: get materi by id
        $requestBody = $this->input->post();
        $currentUser = $this->session->get_userdata();


        for ($i = 1; $i <= 2; $i++) {
            $answer = array(
                "studentId" => $currentUser["userId"],
                "soalId" => $requestBody["soalId" . $i],
                "answer" => $requestBody["answer" . $i],
            );

            // save answer
            $result = $this->answerModel->insert($answer);
            if ($result == null) {
                var_dump($result);
                return;
            }
        }

        // redirect to next materi/subtema
        redirect(base_url() . 'student/materi/' . $subtemaId . "/" . $number);
        return;
    }

    public function soal($materiId, $materiNumber = 1)
    {
        $this->auth();

        // TODO: get list soal by materi id
        $listSoal = $this->soalModel->getList(array("materiId" => $materiId));
        if (!$listSoal) {
            var_dump("gagal mengambil list soal");
            return;
        }

        $materi = $this->materiModel->get(array("id" => $materiId, "number" => $materiNumber));
        if (!$listSoal || $listSoal == null || count($listSoal) == 0) {
            var_dump("gagal mengambil materi " . $materiId);
            return;
        }

        $data["listSoal"] = $listSoal;
        $data["materi"] = $materi;
        $this->load->view("student/soal", $data);
    }
    public function nilai($id)
    {
        $this->auth();

        // TODO: $id is student id

        $data["scores"] = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($data["scores"], array(
                "name" => "Subtema " . ($i + 1),
                "score" => rand(0, 100)
            ));
        }
        $this->load->view("student/nilai", $data);
    }
    public function viewScoreSubtema($classId)
    {
        $this->auth();
        $data["classId"] = $classId;;
        $data["listSubtema"] = $this->subtemaModel->getList();
        $this->load->view("student/viewScoreSubtema", $data);
    }
    public function viewScoreMateri($classId, $subtemaId)
    {
        $this->auth();
        $data["classId"] = $classId;
        $data["listScore"] = array();

        $listMateri = $this->materiModel->getList(array(
            "classId" => $classId,
            "subtemaId" => $subtemaId
        ));

        foreach ($listMateri as $i => $materi) {
            $score = $this->scoresModel->get(array(
                "materiId" => $materi->id,
                "studentId" => $this->session->get_userdata()["userId"]
            ));

            if ($score != null) {
                $listMateri[$i]->score = $score->value;
            } else {
                $listMateri[$i]->score = 0;
            }
        }


        $data["listMateri"] = $listMateri;
        $data["student"] = $this->studentModel->get(array("id" => $this->session->get_userdata()["userId"]));
        // $data["listMateri"] = $this->materiModel->getList(array("classId" => $classId, "subtemaId" => $subtemaId));
        // for ($i = 0; $i < count($data["listMateri"]); $i++) {
        //     $data["listMateri"][$i]->score = 0;
        //     $score = $this->scoresModel->get(array(
        //         "studentId" => $data["student"]->id,
        //         "classId" => $data["student"]->classId,
        //         "materiId" => $data["listMateri"][$i]->id,
        //     ));
        //     if ($score != null) {
        //         $data["listMateri"][$i]->score = $score->value;
        //     }
        // }

        // $listSoal = $this->soalModel->getList(array("materiId" => $materiId));
        // for ($i = 0; $i < count($data["listStudent"]); $i++) {
        //     // added list soal/question of materi
        //     $data["student"]->listSoal = array();
        //     foreach ($listSoal as $value) {
        //         $answer = $this->answerModel->get(array("soalId" => $value->id, "studentId" => $data["student"]->id));

        //         if ($answer == null) {
        //             $answer = "";
        //         } else {
        //             $answer = $answer->answer;
        //         }

        //         $soal = array(
        //             "question" => $value->question,
        //             "answer" => $answer,
        //         );

        //         array_push($data["student"]->listSoal, $soal);
        //     }

        //     // added scores
        //     $data["student"]->score = 0;
        //     $score = $this->scoresModel->get(array("materiId" => $data["materi"]->id, "studentId" => $data["student"]->id, "classId" => $classId));
        //     if (!($score == null)) {
        //         $data["student"]->score = $score->value;
        //     }
        // }

        $this->load->view("student/viewScoreMateri", $data);
    }
}
