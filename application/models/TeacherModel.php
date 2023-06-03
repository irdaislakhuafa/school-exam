<?php
class TeacherModel extends CI_Model
{
    public function getByEmail($email)
    {
        $result = $this->db->where("email", $email)->limit(1)->get("teacher");
        return ($result->num_rows() >= 1) ? $result->row() : null;
    }
}
