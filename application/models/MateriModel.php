<?php

class MateriModel extends CI_Model
{
    private static $TABLE = 'materi';
    public function insert($materi, $id = $this->random->generateUUID())
    {
        $materi['id'] = $id;
        return $this->db
            ->insert(MateriModel::$TABLE, $materi);
    }

    // result is list of object
    public function getList($materi = array())
    {
        $result = $this->db
            ->where($materi)
            ->get(MateriModel::$TABLE);
        return $result->result_object();
    }

    // result is one object
    public function get($materi = array())
    {
        $result = $this->db
            ->where($materi)
            ->get(MateriModel::$TABLE);
        return $result->row_object();
    }
}
