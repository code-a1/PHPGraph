<?php


namespace codea1\PHPGraph;


use Exception;
use codea1\Telegraph;

class Utils
{
    /**
     * @throws Exception
     */
    public static function curl($url, $data){
        /*if(!isset(Client::class->access_token)){
            throw new Exception("No token declared or account created");
        }*/
        $curl = curl_init($url);

        $settings = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 10
        ];

        if(!empty($data)){
            $settings += [
                CURLOPT_POSTFIELDS => http_build_query($data)
            ];
        }

        curl_setopt_array($curl, $settings);

        $result = curl_exec($curl);

        if(!empty(curl_error($curl))){
            throw new Exception(curl_error($curl));
        }

        curl_close($curl);

        return $result;
    }
}