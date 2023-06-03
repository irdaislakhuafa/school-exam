<?php
class SubtemaModel extends CI_Model
{
    private static $TABLE = 'subtema';

    public function getList($condition = array())
    {
        $result = $this->db
            ->where($condition)
            ->get(SubtemaModel::$TABLE)
            ->result_object();
        return $result;
    }
    public function get($condition = array())
    {
        $result = $this->db
            ->where($condition)
            ->get(SubtemaModel::$TABLE)
            ->row_object();
        return $result;
    }
}
