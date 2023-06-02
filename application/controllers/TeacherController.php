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

    public function newSubtema()
    {
        $this->load->view("teacher/newSubtema");
    }
}
