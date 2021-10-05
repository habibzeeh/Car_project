<?php

use Medoo\Medoo;

class Database
{
    protected $db;
    private static $instance = null;

    public function __construct()
    {
        $this->db = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'usauctio_car',
            'server' => 's19.hosterpk.com',
            'username' => 'usauctio_user',
            'password' => 'UX=x{[&KkY&&'
        ]);
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function addRecord($table,$data){
        return $this->db->insert($table,$data);
    }

    public function updateRecord($table,$valuesArray,$where){
        return $this->db->update($table,$valuesArray,$where);
    }

    public function delete($table,$where){
        return $this->db->delete($table,$where);
    }

    public function getSingleRecord($table,$where){
        return $this->db->get($table,$columns='*',$where);
    }

    public function getAllRecords($table,$where){
        return $this->db->select($table,$columns='*',$where);
    }

    public function countRecords($table,$where){
        return $this->db->count($table,$where);
    }

    public function isLocalhost($whitelist = ['127.0.0.1', '::1']) {
        return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
    }

    public function addLog($type,$message){
        $data = ["type" => $type,"message" => $message];
        return $this->db->insert("logs",$data);
    }

}