<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use GuzzleHttp\Client;
// require ‘\vendor\autoload.php’;
//use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class InvestmentsController extends Controller
{
 
    public function index()
    {
        $client = new Client();

        	
        $res = $client->request('POST', 'https://mutualfundsnav.p.mashape.com/',[
                       'headers' =>[
                "X-Mashape-Key" => "rt510bTGgOmsh5232VZUOzDR31cbp1oPYGFjsn3IHB1ZEuZ1OL",
                "Content-Type" => "application/json",
                "Accept" => "application/json"
              ],
              'timeout' => 2000,
                'http_errors' => false,
              "{\"scodes\":[119018,100520,119528,120503,118533]}"]);

          try {
              dd( $res);
               
            } catch (RequestException $e) {
                var_dump($e->getResponse()->getBody()->getContent());
            }
}
}
