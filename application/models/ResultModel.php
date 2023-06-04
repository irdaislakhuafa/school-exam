<?php
class ResultModel extends CI_Model
{
    private static $TABLE = 'scores';

    public function get($result = array())
    {
        return $this->db
            ->where($result)
            ->get(ResultModel::$TABLE)
            ->row_object();
    }
    public function getList($result = array())
    {
        return $this->db
            ->where($result)
            ->get(ResultModel::$TABLE)
            ->result_object();
    }

    public function update($condition = array(), $result = array())
    {
        return $this->db
            ->where($condition)
            ->update(ResultModel::$TABLE, $result);
    }
    public function delete($result = array())
    {
        return $this->db
            ->where($result)
            ->delete(ResultModel::$TABLE);
    }
    public function insert($class)
    {
        $class["id"] = $this->random->generateUUID();
        return $this->db
            ->insert(ResultModel::$TABLE, $class);
    }
}
