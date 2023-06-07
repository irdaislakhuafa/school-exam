<?php

class ScoresModel extends CI_Model
{
    private static $TABLE = 'scores';
    public function insert($answer, $id = "")
    {
        if ($id == "") {
            $id = $this->random->generateUUID();
        }

        $answer['id'] = $id;
        return $this->db
            ->insert(ScoresModel::$TABLE, $answer);
    }

    // result is list of object
    public function getList($answer = array())
    {
        $result = $this->db
            ->where($answer)
            ->get(ScoresModel::$TABLE);
        return $result->result_object();
    }

    // result is one object
    public function get($answer = array())
    {
        $result = $this->db
            ->where($answer)
            ->get(ScoresModel::$TABLE);
        return $result->row_object();
    }
}
