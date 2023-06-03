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
        $data = $this->input->post();
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');
        // if ($this->form_validation->run() == FALSE) {
        //     $this->session->set_flashdata('error', 'Invalid email/passowrd for login');
        //     redirect(base_url() . "teacher/");
        // }

        // // TODO: check email and password from database

        // $email = $data['email'];
        // $password = $data['password'];
        // $this->load->model('user_model');
        // $user = $this->user_model->getUserByEmail($email);
    }

    // TODO: added function to check login teacher and redirect to home if true

    public function home()
    {

        $this->load->view("teacher/home");
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
