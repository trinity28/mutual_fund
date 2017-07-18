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
  $headers = [
     "X-Mashape-Key" => "rt510bTGgOmsh5232VZUOzDR31cbp1oPYGFjsn3IHB1ZEuZ1OL",
                "Content-Type" => "application/json",
                "Accept" => "application/json"
];

$GetOrder = [
   
       
        //"scodes"=>[119018,100520,119528,120503,118533]
         "search"=>["franklin india bluechip"]
    

];

$client = new client();
$res = $client->post('https://mutualfundsnav.p.mashape.com/', [
    'headers' => $headers, 
    'json' => $GetOrder,
]);
        	
      





          echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
}
}
