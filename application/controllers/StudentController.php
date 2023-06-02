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
        // TODO: check student absen code and class code
        $student = array(
            "name" => $this->input->post("name"),
            "absenCode" => $this->input->post("absenCode"),
            "classCode" => $this->input->post("classCode"),
        );

        $data["student"] = $student;
        $this->load->view("student/maps", $data);
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
}
