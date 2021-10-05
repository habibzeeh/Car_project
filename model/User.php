<?php

class User
{

    public $id;
    public $email;
    public $name;
    public $type;
    public $password;
    public $status;

    public static function setData($id, $email, $name, $type, $password, $status)
    {
        $instance = new self();
        $instance->id = $id;
        $instance->email = $email;
        $instance->name = $name;
        $instance->type = $type;
        $instance->password = $password;
        $instance->status = $status;
        return $instance;
    }

    public static function setArray($array)
    {
        $instance = new self();
        $instance->id = $array['id'];
        $instance->email = $array['email'];
        $instance->name = $array['name'];
        $instance->type = $array['type'];
        $instance->password = $array['password'];
        $instance->status = $array['status'];
        return $instance;
    }

    public function isAdmin(){
        return $this->type == "admin";
    }


    public function isUser(){
        return $this->type == "user";
    }



}