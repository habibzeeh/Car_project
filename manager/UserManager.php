<?php

class UserManager
{

    protected $db;
    private $table;
    private static $instance = null;

    public function __construct(){
        $this->table = "users";
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new UserManager();
        return self::$instance;
    }

    public function getUserByEmail($email){
        $where = ["email" => $email];
        $data = $this->db->getSingleRecord($this->table,$where);
        if(isset($data)) return User::setArray($data);
        return null;
    }

    public function getUserById($id){
        $where = ["id" => $id];
        $data = $this->db->getSingleRecord($this->table,$where);
        return User::setArray($data);
    }

    public function getUserPictureLink($user){
        $path = "assets/img/avatars/" . $user->id . ".png";
        if(file_exists($path))
            return $path;
        else
            return "assets/img/avatars/user.png";
    }

    public function saveUser($name,$email,$password){
        $data =  ["name" => $name , "email" => $email, "password" => md5($password)];
        return $this->db->addRecord($this->table,$data);
    }

    public function getAllUsers(){
        $result = $this->db->getAllRecords($this->table,null);
        $users = array();
        foreach ($result as $data){
            array_push($users,User::setArray($data));
        }
        return $users;
    }

    public function count($where = null){
        return $this->db->countRecords($this->table,$where);
    }

    public function getVerifiedUsers(){
        $where = ["status" => 1];
        $result = $this->db->getAllRecords($this->table,$where);
        $users = array();
        foreach ($result as $data){
            array_push($users,User::setArray($data));
        }
        return $users;
    }

    public function getNonVerifiedUsers(){
        $where = ["status" => 0];
        $result = $this->db->getAllRecords($this->table,$where);
        $users = array();
        foreach ($result as $data){
            array_push($users,User::setArray($data));
        }
        return $users;
    }

    public function verifyUser($user){
        $where = ["id" => $user->id];
        $data = ["status" => 1];
        return $this->db->updateRecord($this->table,$data,$where);
    }

    public function updateName($user, $name){
        $result["success"] = false;
        if(strlen($name) < 3) {
            $result["msg"] = "Enter a valid name";
        }
        else{
            $where = ["id" => $user->id];
            $data = ["name" => $name];
            $this->db->updateRecord($this->table,$data,$where);
            $result["success"] = true;
            $result["msg"] = "Name updated.";
        }
        return $result;
    }

    public function updatePassword($user,$password){
        $where = ["id" => $user->id];
        $data = ["password" => md5($password)];
        return $this->db->updateRecord($this->table,$data,$where);
    }

    public function updatePicture(){

    }


    public function updateUser($user){
        $where = ["id" => $user->id];
        $data = [
            "email" => $user->email,
            "name" => $user->name,
            "status" => $user->staus,
        ];
        return $this->db->updateRecord($this->table,$data,$where);
    }

}