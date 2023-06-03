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
        // TODO: added logic here
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
