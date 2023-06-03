<?php
class ClassModel extends CI_Model
{
    private static $TABLE = "classData";
    public function getListByTeacherId($teacherId)
    {
        $result = $this->db->where("teacherId", $teacherId)->get(ClassModel::$TABLE);
        return $result->result_array();
    }
}
