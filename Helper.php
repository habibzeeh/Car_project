<?php

class Helper
{
    private static $instance = null;

    public function __construct(){

    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Helper();
        }
        return self::$instance;
    }

    public function objectToArray($object){
        return json_decode(json_encode($object), true);
    }

    public function printArray($array){
        print "<pre>" ;
        print_r($array);
        print "</pre>";
    }

    public function printObject($object){
        $this->printArray($this->objectToArray($object));
    }

}