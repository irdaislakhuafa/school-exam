<?php
class ImagesModel extends CI_Model
{
    private static $TABLE = 'images';
    public function insert($materi)
    {
        $materi['id'] = $this->random->generateUUID();
        return $this->db
            ->insert(ImagesModel::$TABLE, $materi);
    }

    // result is list of object
    public function getList($materi = array())
    {
        $result = $this->db
            ->where($materi)
            ->get(ImagesModel::$TABLE);
        return $result->result_object();
    }

    // result is one object
    public function get($materi = array())
    {
        $result = $this->db
            ->where($materi)
            ->get(ImagesModel::$TABLE);
        return $result->row_object();
    }
}
