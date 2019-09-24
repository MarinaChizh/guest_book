<?php

namespace App\Model\DataStorage;

use App\Core\Config;
use mysqli;

class MysqlStorage implements StorageInterface
{

    private $db_entity;

    function __construct($fileName)
    {

        $link = $this->parsePath($fileName);

        $this->db_entity = new DB_entity(
            new mysqli(
                $link['host'],
                $link['user'],
                $link['password'],
                $link['db']
            ),
            $link['table']
        );

    }

    private function parsePath($fileName)
    {
        $array = explode('.', $fileName);
        $result_array = [];

        foreach ($array as $value) {
            $buf_array = explode(':', $value);
            $result_array[$buf_array[0]] = $buf_array[1];
        }
        unset($result_array['mysql']);
        return $result_array;
    }

    public function get()
    {
        $res = [];
        foreach ($this->db_entity->query() as $value) {
            $res[$value['id']] = json_decode($value['data']);
        }
        return $res;
    }

    public function del(int $id)
    {
        $this->db_entity->delete($id);
    }

    public function edit(int $id, array $array)
    {
        $this->db_entity->edit($id, ['data' => json_encode($array)]);
    }

    public function add(array $array)
    {
        $this->db_entity->add(['data' => json_encode($array)]);
    }
}
