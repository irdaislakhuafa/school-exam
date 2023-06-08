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

    public function insert($class, $id = "")
    {
        $class["id"] = $id;
        if ($id == "") {
            $class["id"] = $this->random->generateUUID();
        }
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

    // result is list of object
    public function getList($class = array())
    {
        $result = $this->db
            ->where($class)
            ->get(ClassModel::$TABLE);
        return $result->result_object();
    }

    // result is one object
    public function get($class = array())
    {
        $result = $this->db
            ->where($class)
            ->get(ClassModel::$TABLE);
        return $result->row_object();
    }

    public function update($condition = array(), $class = array())
    {
        return $this->db
            ->where($condition)
            ->update(ClassModel::$TABLE, $class);
    }
}
