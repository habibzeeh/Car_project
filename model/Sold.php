<?php

class Sold
{

    public $id;
    public $user_id;
    public $car_id;
    public $purchaser_name;
    public $purchaser_phone;
    public $price;
    public $currency; // Default UAE
    public $rate; // Current rate of the selling currency
    public $deposit;
    public $receipt;
    public $date;

    public static function setData($id, $user_id, $car_id, $purchaser_name, $purchaser_phone, $price, $currency, $rate, $deposit, $receipt, $date)
    {
        $instance = new self();
        $instance->id = $id;
        $instance->user_id = $user_id;
        $instance->car_id = $car_id;
        $instance->purchaser_name = $purchaser_name;
        $instance->purchaser_phone = $purchaser_phone;
        $instance->price = $price;
        $instance->currency = $currency;
        $instance->rate = $rate;
        $instance->deposit = $deposit;
        $instance->receipt = $receipt;
        $instance->date = $date;
        return $instance;
    }

    public static function setArray($array)
    {
        $instance = new self();
        $instance->id = $array['id'];
        $instance->user_id = $array['user_id'];
        $instance->car_id = $array['car_id'];
        $instance->purchaser_name = $array['purchaser_name'];
        $instance->purchaser_phone = $array['purchaser_phone'];
        $instance->price = $array['price'];
        $instance->currency = $array['currency'];
        $instance->rate = $array['rate'];
        $instance->deposit = $array['deposit'];
        $instance->receipt = $array['receipt'];
        $instance->date = $array['date'];
        return $instance;
    }

}