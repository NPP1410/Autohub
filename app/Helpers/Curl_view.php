<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Curl_view
{
   
    function Setup()
    {
        
        curl_setopt($this->curl_view, CURLOPT_RETURNTRANSFER, true);
    }

    function Get($url, $referer = NULL)
    {
        $this->curl_view = curl_init($url);
        $this->setup();
        if ($referer)
            curl_setopt($this->curl_view, CURLOPT_REFERER, $referer);
        return $this->request();
    }

    function request()
    {
        return curl_exec($this->curl_view);
    }

    function request_close()
    {
        return curl_close($this->curl_view);
    }
}
