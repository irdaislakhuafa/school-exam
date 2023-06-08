<?php
class StudentClassModel extends CI_Model
{
    private static $TABLE = 'studentClassData';

    public function get($student = array())
    {

        $result = $this->db
            ->where($student)
            ->get(StudentClassModel::$TABLE);
        return $result->row_object();
    }
    public function getList($student = array())
    {
        $result =  $this->db
            ->where($student)
            ->get(StudentClassModel::$TABLE);
        return $result->result_object();
    }

    public function update($condition = array(), $student = array())
    {
        return $this->db
            ->where($condition)
            ->update(StudentClassModel::$TABLE, $student);
    }
    public function delete($student = array())
    {
        return $this->db
            ->where($student)
            ->delete(StudentClassModel::$TABLE);
    }
    public function insert($student)
    {
        $student["id"] = $this->random->generateUUID();
        return $this->db
            ->insert(StudentClassModel::$TABLE, $student);
    }
}
