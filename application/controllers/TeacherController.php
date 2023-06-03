<?php
class TeacherController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // TODO: handle this
        $this->session->set_userdata(array(
            "name" => $this->input->post("email"),
        ));
        $this->load->view("teacher/login");
    }

    public function login()
    {
        // retrieve login data (email, password)
        $formLogin = $this->input->post();
        $this->load->library('form_validation');
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
        // get list class by teacher id
        $currentUser = $this->session->get_userdata();
        $listClass = $this->classModel->getListByTeacherId($currentUser["userId"]);

        for ($i = 0; $i < count($listClass); $i++) {
            // TODO: get list student by class id
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
        $classData = $this->input->post();
        // TODO: added logic here
        redirect(base_url() . "teacher/class/subtema/select");
    }
    public function editClass()
    {
        $classData = $this->input->post();
        // TODO: get class by class code and send to view
        $this->load->view("teacher/editClass");
    }

    public function selectSubtema()
    {
        $this->load->view("teacher/selectSubtema");
    }
    public function newSubtema($subtemaCode)
    {
        $data['subtemaNumber'] = $subtemaCode;
        $this->load->view("teacher/newSubtema", $data);
    }
}
