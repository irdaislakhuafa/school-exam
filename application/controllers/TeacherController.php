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
        if ($this->form_validation->run() == FALSE) {
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

    // TODO: added function to check login teacher and redirect to home if true

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

    public function newClass()
    {
        $this->load->view("teacher/newClass");
    }

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
        if ($this->form_validation->run() == FALSE) {
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
    public function editClass()
    {
        $classData = $this->input->post();
        // TODO: get class by class code and send to view
        $this->load->view("teacher/editClass");
    }

    public function selectSubtema()
    {
        $data['listSubtema'] = $this->subtemaModel->getList();
        $this->load->view("teacher/selectSubtema", $data);
    }
    public function newSubtema($subtemaId, $questionNumber = 1)
    {
        $data['subtema'] = $this->subtemaModel->get(array('id' => $subtemaId));
        $data['questionNumber'] = $questionNumber;

        if ($questionNumber <= 5) {
            $this->load->view("teacher/newSubtema", $data);
        } else {
            redirect(base_url() . '/teacher/home');
        }
    }

    public function createSubtema()
    {
        // $subtema = $this->input->post();
    }
}
