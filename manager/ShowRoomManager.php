<?php

class ShowRoomManager
{

    protected $db;
    private $table;
    private static $instance = null;

    public function __construct(){
        $this->table = "show_room";
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new ShowRoomManager();
        return self::$instance;
    }

    public function get($id){
        $where = ["id" => $id];
        $result = $this->db->getSingleRecord($this->table,$where);
        return ShowRoom::setArray($result);
    }

    public function getAll($user_id){
        $where = ["user_id" => $user_id];
        $result = $this->db->getAllRecords($this->table,$where);
        $objects = array();
        foreach ($result as $data){
            array_push($objects,ShowRoom::setArray($data));
        }
        return $objects;
    }

    public function add($show_room){
        $data = ["user_id" => $show_room->user_id , "name" => $show_room->name, "capacity" => $show_room->capacity, "location" => $show_room->location];
        return $this->db->addRecord($this->table,$data);
    }

    public function update($show_room){
        $where = ["id" => $show_room->id];
        $data = ["name" => $show_room->name, "capacity" => $show_room->capacity, "location" => $show_room->location];
        return $this->db->updateRecord($this->table,$data,$where);
    }

    public function delete($id){
        $where = ["id" => $id];
        return $this->db->delete($this->table,$where);
    }

}