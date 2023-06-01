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

    public function soal($subtema)
    {
        echo $subtema;
        $this->load->view("student/soal");
    }
    public function nilai($id)
    {
        echo $id;
        $data["scores"] = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($data["scores"], array(
                "name" => "Subtema " . ($i + 1),
                "score" => rand(0, 100)
            ));
        }
        $this->load->view("student/nilai", $data);
    }
}
