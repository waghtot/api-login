<?php
class API_model extends Controller
{
    public function doAPI($data)
    {

        $api = PREFIX.self::getApi($data).DNS;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       
        $res = curl_exec($ch);
        if(isset($res)){
            return $res; 
        }
    }

    public function getApi($input)
    {
        $api = new stdClass(); 
        $api = json_decode($input->request);
        return $api->api;
    }
}