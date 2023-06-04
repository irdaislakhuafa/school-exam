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
                if ($this->teacherModel->get(array('id' => $currentUser["userId"]))) {
                    return;
                }
            }
        }
        // redirect(base_url() . "student/");
    }

    public function index()
    {
        $this->load->view("student/login");
    }
    public function login()
    {

        $class = $this->classModel->get(array("code" => $this->input->post("classCode")));
        if ($class == null) {
            // var_dump($this->input->post("name"));
            $this->session->set_flashdata('error', "Kelas dengan kode " . $this->input->post("classCode") . " tidak ada!");
            // redirect(base_url() . "student/");
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

    public function maps($placeCode = "")
    {
        $this->auth();

        // TODO: check student absen code and class code
        $student = $this->studentModel->get(array("id" => $this->session->get_userdata()["userId"]));

        // handle current place
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
