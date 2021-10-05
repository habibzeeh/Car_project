<?php

class LoginManager
{

    protected $db;
    private $um;
    private static $instance = null;

    public function __construct(){
        session_start();
        $this->um = UserManager::getInstance();
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new LoginManager();
        return self::$instance;
    }

    public function checkLogin(){
        if(isset($_SESSION["isLogin"]))
            return true;
        else
            $this->openLoginPage();
    }

    public function openLoginPage(){
        header("Location: login.php");
    }

    public function login($email,$password){
    $user = $this->um->getUserByEmail($email);
    $result["success"] = false;
    if($user == null) {
        $result["msg"] = "Invalid Email";
    }
    elseif ($user->password != md5($password) ) {
        $result["msg"] = "Invalid Password";
    }
    elseif ($user->status == 0) {
        $result["msg"] = "Account need verification!";
    }
    else{
        $result["success"] = true;
        $result["msg"] = "Login Success";
        $_SESSION["isLogin"] = true;
        $_SESSION["user"] = $user;
    }
    return $result;
}

    public function refreshUser($user){
        $user = $this->um->getUserById($user->id);
        $_SESSION["user"] = null;
        $_SESSION["user"] = $user;
    }

    public function register($name,$email,$password){
        $user = $this->um->getUserByEmail($email);
        $result["success"] = false;
        if($user != null) {
            $result["msg"] = "Email Already Used";
        }
        elseif (strlen($password) < 8 ) {
            $result["msg"] = "Password too short";
        }
        elseif (strlen($name) < 4) {
            $result["msg"] = "InValid Name";
        }
        else{
            $this->um->saveUser($name,$email,$password);
            $result["success"] = true;
            $result["msg"] = "Register Success";
        }
        return $result;
    }

    public function logout(){
        if (isset($_SESSION)) {
            unset($_SESSION);
            session_unset();
            session_destroy();
        }
        $this->openLoginPage();
    }

}