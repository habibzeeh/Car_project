<?php

//Libraries
require 'vendor/autoload.php';

//Models
require 'model/User.php';
require 'model/Car.php';
require 'model/ShowRoom.php';
require 'model/Container.php';
require 'model/Sold.php';
require 'model/Visitor.php';

//Managers
require 'manager/UserManager.php';
require 'manager/LoginManager.php';
require 'manager/CarManager.php';
require 'manager/ShowRoomManager.php';
require 'manager/ContainerManager.php';
require 'manager/SoldManager.php';
require 'manager/FileManager.php';
require 'manager/WebManager.php';
require 'manager/VisitorManager.php';

//Others
require 'Database.php';
require 'Helper.php';

class Manager{

    public $db; // DateBase Handler
    public $hp; // Helper Function
    public $lm; // Login Manager
    public $um; // User Manager
    public $sr; // Show Room Manager
    public $cr; // Car Manager
    public $cm; // Container Manager
    public $sm; // sold Manager
    public $fm; // File Manager
    public $wm; // Web Manager
    public $vm; // Visitor Manager
    private static $instance = null;

    public function __construct(){
        $this->db = Database::getInstance();
        $this->hp = Helper::getInstance();
        $this->lm = LoginManager::getInstance();
        $this->um = UserManager::getInstance();
        $this->cr = CarManager::getInstance();
        $this->sr = ShowRoomManager::getInstance();
        $this->cm = ContainerManager::getInstance();
        $this->sm = SoldManager::getInstance();
        $this->fm = FileManager::getInstance();
        $this->wm = WebManager::getInstance();
        $this->vm = VisitorManager::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Manager();
        }

        return self::$instance;
    }

}