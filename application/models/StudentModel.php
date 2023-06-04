<?php
class StudentModel extends CI_Model
{
    private static $TABLE = 'student';

    public function getListByClassId($classId)
    {
        $result = $this->db->where(array("classId" => $classId))->get(StudentModel::$TABLE);
        return $result->result_array();
    }
}
