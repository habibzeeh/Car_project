<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abdul Haseeb
 * Date: 4/24/2021
 * Time: 2:55 PM
 */

class Visitor
{
    public $ip;
    public $name;
    public $version;
    public $platform;
    public $first;
    public $date;

    public static function setData($ip, $name, $version, $platform, $first, $date)
    {
        $instance = new self();
        $instance->ip = $ip;
        $instance->name = $name;
        $instance->version = $version;
        $instance->platform = $platform;
        $instance->first = $first;
        $instance->date = $date;
        return $instance;
    }

    public static function setArray($array)
    {
        $instance = new self();
        $instance->ip = $array['ip'];
        $instance->name = $array['name'];
        $instance->version = $array['version'];
        $instance->platform = $array['platform'];
        $instance->first = $array['first'];
        $instance->date = $array['date'];
        return $instance;
    }


}