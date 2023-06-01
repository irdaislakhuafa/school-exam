<?php
class StudentController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("student/login");
    }

    public function maps()
    {
        $this->load->view("student/maps");
    }

    public function subtema($subtema)
    {
        $data["subtema_number"] = $subtema;
        $this->load->view("student/subtema", $data);
    }
}
