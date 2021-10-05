<?php

class ContainerManager
{
    protected $db;
    private $table;
    private static $instance = null;

    public function __construct(){
        $this->table = "container";
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new ContainerManager();
        return self::$instance;
    }

    public function add($container){
        $data =
            [
                "user_id" => $container->user_id,
                "name" => $container->name,
                "number" => $container->number,
                "booked_date" => $container->booked_date,
                "ship_date" => $container->ship_date,
                "receive_date" => $container->receive_date
            ];
        return $this->db->addRecord($this->table,$data);
    }

    public function update($container){
        $where = ["id" => $container->id];
        $data =
            [
                "name" => $container->name,
                "number" => $container->number,
                "booked_date" => $container->booked_date,
                "ship_date" => $container->ship_date,
                "receive_date" => $container->receive_date
            ];
        return $this->db->updateRecord($this->table,$data,$where);
    }

    public function get($id){
        $where = ["id" => $id];
        $result = $this->db->getSingleRecord($this->table,$where);
        return Container::setArray($result);
    }

    public function getAll($user_id){
        $where = ["user_id" => $user_id];
        $result = $this->db->getAllRecords($this->table,$where);
        $objects = array();
        foreach ($result as $data){
            array_push($objects,Container::setArray($data));
        }
        return $objects;
    }

    public function delete($id){
        $where = ["id" => $id];
        return $this->db->delete($this->table,$where);
    }
}