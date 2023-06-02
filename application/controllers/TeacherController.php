<?php
class TeacherController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("teacher/login");
    }


    public function home()
    {
        $this->load->view("teacher/home");
    }

    public function newClass()
    {
        $this->load->view("teacher/newClass");
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
