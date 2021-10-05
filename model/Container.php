<?php

class Container
{

    public $id; // System
    public $user_id;
    public $name;
    public $number;
    public $booked_date;
    public $ship_date;
    public $receive_date;

    public static function setData($id, $user_id, $name, $number,$booked_date, $ship_date, $receive_date)
    {
        $instance = new self();
        $instance->id = $id;
        $instance->user_id = $user_id;
        $instance->name = $name;
        $instance->number = $number;
        $instance->booked_date = $booked_date;
        $instance->ship_date = $ship_date;
        $instance->receive_date = $receive_date;
        return $instance;
    }

    public static function setArray($array){
        $instance = new self();
        $instance->id = $array['id'];
        $instance->user_id = $array['user_id'];
        $instance->name = $array['name'];
        $instance->number = $array['number'];
        $instance->booked_date = $array['booked_date'];
        $instance->ship_date = $array['ship_date'];
        $instance->receive_date = $array['receive_date'];
        return $instance;
    }

}