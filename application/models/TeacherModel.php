<?php
class TeacherModel extends CI_Model
{

    private static $TABLE = "teacher";

    public function getByEmail($email)
    {
        $result = $this->db->where("email", $email)->limit(1)->get(TeacherModel::$TABLE);
        return ($result->num_rows() >= 1) ? $result->row() : null;
    }
}
