<?php
class CarManager
{
    protected $db;
    private $table;
    private static $instance = null;

    public function __construct(){
        $this->table = "car";
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new CarManager();
        return self::$instance;
    }

    public function add($car){
        $data =
            [
                "user_id" => $car->user_id,
                "container_id" => $car->container_id,
                "showroom_id" => $car->showroom_id,
                "name" => $car->name,
                "model" => $car->model,
                "make" => $car->make,
                "chasis_no" => $car->chasis_no,
                "buy" => $car->buy,
                "tow" => $car->tow,
                "shipping" => $car->shipping,
                "storage" => $car->storage,
                "custom" => $car->custom,
                "clearance" => $car->clearance,
                "vat_tax" => $car->vat_tax,
                "commission" => $car->commission,
                "purchase_date" => $car->purchase_date,
            ];
        return $this->db->addRecord($this->table,$data);
    }

    public function update($car){
        $where = ["id" => $car->id];
        $data =
            [
                "container_id" => $car->container_id,
                "showroom_id" => $car->showroom_id,
                "name" => $car->name,
                "model" => $car->model,
                "make" => $car->make,
                "chasis_no" => $car->chasis_no,
                "buy" => $car->buy,
                "tow" => $car->tow,
                "shipping" => $car->shipping,
                "storage" => $car->storage,
                "custom" => $car->custom,
                "clearance" => $car->clearance,
                "vat_tax" => $car->vat_tax,
                "commission" => $car->commission,
                "purchase_date" => $car->purchase_date,
            ];
        return $this->db->updateRecord($this->table,$data,$where);
    }

    public function get($id){
        $where = ["id" => $id];
        $result = $this->db->getSingleRecord($this->table,$where);
        return Car::setArray($result);
    }

    public function getAll($user_id){
        $where = ["user_id" => $user_id];
        $result = $this->db->getAllRecords($this->table,$where);
        $objects = array();
        foreach ($result as $data){
            array_push($objects,Car::setArray($data));
        }
        return $objects;
    }

    public function getAllContainer($container_id){
        $where = ["container_id" => $container_id];
        $result = $this->db->getAllRecords($this->table,$where);
        $objects = array();
        foreach ($result as $data){
            array_push($objects,Car::setArray($data));
        }
        return $objects;
    }

    public function getAllShowRoom($showroom_id){
        $where = ["showroom_id" => $showroom_id];
        $result = $this->db->getAllRecords($this->table,$where);
        $objects = array();
        foreach ($result as $data){
            array_push($objects,Car::setArray($data));
        }
        return $objects;
    }

    public function delete($id){
        $where = ["id" => $id];
        return $this->db->delete($this->table,$where);
    }

}