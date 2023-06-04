<?php
class StudentModel extends CI_Model
{
    private static $TABLE = 'student';

    public function getListByClassId($classId)
    {
        $result = $this->db->where(array("classId" => $classId))->get(StudentModel::$TABLE);
        return $result->result_array();
    }

    public function get($student = array())
    {

        $result = $this->db
            ->where($student)
            ->get(StudentModel::$TABLE);
        return $result->row_object();
    }
    public function getList($student = array())
    {
        $result =  $this->db
            ->where($student)
            ->get(StudentModel::$TABLE);
        return $result->result_object();
    }

    public function update($condition = array(), $student = array())
    {
        return $this->db
            ->where($condition)
            ->update(StudentModel::$TABLE, $student);
    }
    public function delete($student = array())
    {
        return $this->db
            ->where($student)
            ->delete(StudentModel::$TABLE);
    }
    public function insert($student)
    {
        $student["id"] = $this->random->generateUUID();
        return $this->db
            ->insert(StudentModel::$TABLE, $student);
    }
}
