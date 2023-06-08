<?php
class TeacherModel extends CI_Model
{

    private static $TABLE = "teacher";

    public function getByEmail($email)
    {
        $result = $this->db->where("email", $email)->limit(1)->get(TeacherModel::$TABLE);
        return ($result->num_rows() >= 1) ? $result->row() : null;
    }

    public function getList($data = array())
    {
        return $this->db
            ->where($data)
            ->get(TeacherModel::$TABLE)
            ->result_object()();
    }

    public function get($data = array())
    {
        return $this->db
            ->where($data)
            ->get(TeacherModel::$TABLE)
            ->row_object();
    }
    public function insert($class)
    {
        $class["id"] = $this->random->generateUUID();
        return $this->db
            ->insert(TeacherModel::$TABLE, $class);
    }
}
