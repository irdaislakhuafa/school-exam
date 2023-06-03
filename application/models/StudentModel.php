<?php
class StudentModel extends CI_Model
{
    private static $TABLE = 'student';

    public function getListByClassId($classId)
    {
        $result = $this->db->where(array("classId" => $classId))->get(StudentModel::$TABLE);
        // var_dump($this->db->last_query());
        return $result->result_array();
    }
}
