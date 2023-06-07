<?php

class AnswerModel extends CI_Model
{
    private static $TABLE = 'answer';
    public function insert($answer, $id = "")
    {
        if ($id == "") {
            $id = $this->random->generateUUID();
        }

        $answer['id'] = $id;
        return $this->db
            ->insert(AnswerModel::$TABLE, $answer);
    }

    // result is list of object
    public function getList($answer = array())
    {
        $result = $this->db
            ->where($answer)
            ->get(AnswerModel::$TABLE);
        return $result->result_object();
    }

    // result is one object
    public function get($answer = array())
    {
        $result = $this->db
            ->where($answer)
            ->get(AnswerModel::$TABLE);
        return $result->row_object();
    }
}
