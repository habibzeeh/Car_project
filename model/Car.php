<?php

class Car
{
    public $id; // Id for our system
    public $user_id;
    public $container_id;
    public $showroom_id;
    public $name;
    public $model;
    public $make; // Vendor of the car
    public $chasis_no;
    public $buy; // USA Dollars Fixed
    public $tow;
    public $shipping;
    public $storage;
    public $custom;
    public $clearance;
    public $vat_tax;
    public $commission; // Other Costs
    public $purchase_date;

    public static function setData($id, $user_id, $container_id, $showroom_id, $name, $model, $make, $chasis_no, $buy, $tow, $shipping, $storage, $custom, $clearance, $vat_tax, $commission, $purchase_date)
    {
        $instance = new self();
        $instance->id = $id;
        $instance->user_id = $user_id;
        $instance->container_id = $container_id;
        $instance->showroom_id = $showroom_id;
        $instance->name = $name;
        $instance->model = $model;
        $instance->make = $make;
        $instance->chasis_no = $chasis_no;
        $instance->buy = $buy;
        $instance->tow = $tow;
        $instance->shipping = $shipping;
        $instance->storage = $storage;
        $instance->custom = $custom;
        $instance->clearance = $clearance;
        $instance->vat_tax = $vat_tax;
        $instance->commission = $commission;
        $instance->purchase_date = $purchase_date;
        return $instance;
    }

    public static function setArray($array)
    {
        $instance = new self();
        $instance->id = $array['id'];
        $instance->user_id = $array['user_id'];
        $instance->container_id = $array['container_id'];
        $instance->showroom_id = $array['showroom_id'];
        $instance->name = $array['name'];
        $instance->model = $array['model'];
        $instance->make = $array['make'];
        $instance->chasis_no = $array['chasis_no'];
        $instance->buy = $array['buy'];
        $instance->tow = $array['tow'];
        $instance->shipping = $array['shipping'];
        $instance->storage = $array['storage'];
        $instance->custom = $array['custom'];
        $instance->clearance = $array['clearance'];
        $instance->vat_tax = $array['vat_tax'];
        $instance->commission = $array['commission'];
        $instance->purchase_date = $array['purchase_date'];
        return $instance;
    }

    public function totalPrice(){
        return $this->buy + $this->tow + $this->shipping + $this->custom + $this->clearance + $this->vat_tax;
    }

    public function status(){
        if($this->container_id == "")
            return "To be Shipped";
        if($this->showroom_id == "")
            return "In Container";
        return "In Show Room";
    }

}