<?php

class ClassModel extends CI_Model
{
    private static $TABLE = "classData";
    public function getListByTeacherId($teacherId)
    {
        $result = $this->db
            ->where("teacherId", $teacherId)
            ->get(ClassModel::$TABLE);
        return $result->result_array();
    }

    public function insert($class)
    {
        $class["id"] = $this->random->generateUUID();
        return $this->db
            ->insert(ClassModel::$TABLE, $class);
    }

    public function getByCodeAndTeacherId($code, $teacherId)
    {
        $result =  $this->db
            ->where(array(
                "code" => $code,
                "teacherId" => $teacherId,
            ))
            ->get(ClassModel::$TABLE)
            ->row_object();
        return $result;
    }
}
