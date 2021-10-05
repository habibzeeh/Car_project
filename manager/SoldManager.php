<?php

class SoldManager
{

    protected $db;
    private $table;
    private static $instance = null;

    public function __construct(){
        $this->table = "sold";
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new SoldManager();
        return self::$instance;
    }

    public function get($id){
        $where = ["id" => $id];
        $result = $this->db->getSingleRecord($this->table,$where);
        return Sold::setArray($result);
    }

    public function getAll($user_id){
        $where = ["user_id" => $user_id];
        $result = $this->db->getAllRecords($this->table,$where);
        $objects = array();
        foreach ($result as $data){
            array_push($objects,Sold::setArray($data));
        }
        return $objects;
    }

    public function add($sold){
        $data = [
            "user_id" => $sold->user_id,
            "car_id" => $sold->car_id,
            "purchaser_name" => $sold->purchaser_name,
            "purchaser_phone" => $sold->purchaser_phone,
            "price" => $sold->price,
            "currency" => $sold->currency,
            "rate" => $sold->rate,
            "deposit" => $sold->deposit,
            "receipt" => $sold->receipt,
            "date" => $sold->date
        ];
        return $this->db->addRecord($this->table,$data);
    }

    public function update($sold){
        $where = ["id" => $sold->id];
        $data = [
            "car_id" => $sold->car_id,
            "purchaser_name" => $sold->purchaser_name,
            "purchaser_phone" => $sold->purchaser_phone,
            "price" => $sold->price,
            "currency" => $sold->currency,
            "rate" => $sold->rate,
            "deposit" => $sold->deposit,
            "receipt" => $sold->receipt,
            "date" => $sold->date
        ];
        return $this->db->updateRecord($this->table,$data,$where);
    }

    public function delete($id){
        $where = ["id" => $id];
        return $this->db->delete($this->table,$where);
    }

}