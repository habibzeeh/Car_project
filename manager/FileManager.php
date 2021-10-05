<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abdul Haseeb
 * Date: 4/18/2021
 * Time: 1:24 PM
 */

class FileManager
{

    private $base = 'files/';
    private static $instance = null;

    public function __construct(){
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new FileManager();
        return self::$instance;
    }

    public function makeUserDir($user_id){
        $path = $this->base . $user_id;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        return $path . "/";
    }

}