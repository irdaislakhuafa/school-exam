<?php

class SoalModel extends CI_Model
{
    private static $TABLE = 'soal';
    public function insert($soal, $id = $this->random->generateUUID())
    {
        $soal['id'] = $id;
        return $this->db
            ->insert(SoalModel::$TABLE, $soal);
    }

    // result is list of object
    public function getList($soal = array())
    {
        $result = $this->db
            ->where($soal)
            ->get(SoalModel::$TABLE);
        return $result->result_object();
    }

    // result is one object
    public function get($soal = array())
    {
        $result = $this->db
            ->where($soal)
            ->get(SoalModel::$TABLE);
        return $result->row_object();
    }
}
