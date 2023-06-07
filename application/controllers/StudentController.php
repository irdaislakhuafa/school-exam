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

        $student = $this->studentModel->get(array("id" => $this->session->get_userdata()["userId"]));
        $data["student"] = $student;
        $data["listSubtema"] = $this->subtemaModel->getList();
        $this->load->view("student/maps", $data);
    }

    public function subtema($subtemaId, $number = 1)
    {

        if ($number >= 6) {
            redirect(base_url() . "student/maps");
            return;
        }

        $data["subtema"] = $this->subtemaModel->get(array("id" => $subtemaId));
        if (!$data["subtema"]) {
            echo "Subtema tidak ada";
            return;
        }

        $data["materi"] = $this->materiModel->get(array("subtemaId" => $subtemaId, "number" => $number));
        if (!$data["materi"]) {
            echo "Materi tidak ada";
            return;
        }

        $data["images"] = $this->imagesModel->getList(array("materiId" => $data["materi"]->id));

        $this->load->view("student/subtema", $data);
    }

    public function saveAnswer($subtemaId, $number)
    {
        // TODO: get materi by id
        $requestBody = $this->input->post();
        var_dump($requestBody);
        // TODO: save answer
        // TODO: redirect to next materi/subtema
        // TODO: redirect to maps if number of materi > 5
    }

    public function soal($materiId, $materiNumber = 1)
    {
        // TODO: get list soal by materi id
        $listSoal = $this->soalModel->getList(array("materiId" => $materiId));
        if (!$listSoal) {
            var_dump("gagal mengambil list soal");
            return;
        }

        $materi = $this->materiModel->get(array("id" => $materiId, "number" => $materiNumber));
        if (!$listSoal || $listSoal == null || count($listSoal) == 0) {
            var_dump("gagal mengambil materi " . $materiId);
            return;
        }

        $data["listSoal"] = $listSoal;
        $data["materi"] = $materi;
        $this->load->view("student/soal", $data);
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
