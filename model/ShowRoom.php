<?php

class ShowRoom
{
    public $id; // System
    public $user_id;
    public $name;
    public $capacity; // total number of cars
    public $location;

    public static function setData($id, $user_id, $name, $capacity, $location)
    {
        $instance = new self();
        $instance->id = $id;
        $instance->user_id = $user_id;
        $instance->name = $name;
        $instance->capacity = $capacity;
        $instance->location = $location;
        return $instance;
    }

    public static function setArray($array)
    {
        $instance = new self();
        $instance->id = $array['id'];
        $instance->user_id = $array['user_id'];
        $instance->name = $array['name'];
        $instance->capacity = $array['capacity'];
        $instance->location = $array['location'];
        return $instance;
    }

}