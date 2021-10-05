<?php
/**
 * Created by IntelliJ IDEA.
 * User: Abdul Haseeb
 * Date: 4/18/2021
 * Time: 3:36 PM
 */

use Goutte\Client;

class WebManager
{
    private $client;
    private $url_base;
    private $url_login;
    private static $instance = null;

    public function __construct()
    {
        $this->url_login = "https://www.copart.com/login/";
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new WebManager();
        }

        return self::$instance;
    }

    public function getFile($user, $pass){
        $this->client = new Client( [
            'base_uri' => 'https://www.copart.com',
            'cookies' => true,
            'headers' =>  [
                'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Encoding' => 'zip, deflate, sdch',
                'Accept-Language' => 'en-US,en;q=0.8',
                'Cache-Control'   => 'max-age=0',
                'User-Agent'      => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0'
            ]
        ]);
        try {
            $crawler = $this->client->request('GET',$this->url_login);
            $form = $crawler->filter('#search_form')->first()->form();

            echo "<pre>";
             print_r($form);
             echo "</pre>";
        } catch (\GuzzleHttp\Exception\GuzzleException $e){
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }


    }

}
