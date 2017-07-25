<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use GuzzleHttp\Client;
// require ‘\vendor\autoload.php’;
//use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Investment;
use Auth;
class InvestmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
  
      public function index()
    {
          if (Auth::guest()) {
           return redirect('/login');
          }
      $posts= Investment::where('user_id',auth()->id())->get();
       foreach ($posts as $p) {



         $client = new Client();
              $headers = [
                 "X-Mashape-Key" => "rt510bTGgOmsh5232VZUOzDR31cbp1oPYGFjsn3IHB1ZEuZ1OL",
                            "Content-Type" => "application/json",
                            "Accept" => "application/json"
            ];
         $keyword = $p->scheme_id;
        $GetOrder = [
                "scodes"=>[$keyword]
                 //"search"=>[$keyword]
                ];

       
        $res = $client->post('https://mutualfundsnav.p.mashape.com/', [
            'headers' => $headers, 
            'json' => $GetOrder,
        ]);
      
        $array = json_decode($res->getBody()->getContents(), true);
       //$fdate =$p->created_at;
      //$tdate =  new DateTime();
      //$datetime1 = new DateTime($fdate);
      //$datetime2 = new DateTime();
      ///$interval = $datetime1->diff($datetime2);
      //$days = $interval->format('%a');

       

  
         $p->current_nav= $array[0]['nav'];
         $p->current_value= $p->current_value*(1+(($p->current_nav - $p->buy_nav)/ $p->buy_nav) );
         $p->save();

             
            
             

        }
      return view('welcome',compact('posts'));
    
    }
    public function search()
    {
        $client = new Client();
        $headers = [
           "X-Mashape-Key" => "rt510bTGgOmsh5232VZUOzDR31cbp1oPYGFjsn3IHB1ZEuZ1OL",
                      "Content-Type" => "application/json",
                      "Accept" => "application/json"
      ];
        $keyword = request('keyword');
        $GetOrder = [
                //"scodes"=>[$keyword]
                 "search"=>[$keyword]
        ];

       
        $res = $client->post('https://mutualfundsnav.p.mashape.com/', [
            'headers' => $headers, 
            'json' => $GetOrder,
        ]);
      
       // $array = json_decode($res->getBody()->getContents(), true);
       // echo $array[0]['nav'];

              echo $res->getBody()->getcontents();
    }
    public function details_of_fund()
    {
        $client = new Client();
        $headers = [
           "X-Mashape-Key" => "rt510bTGgOmsh5232VZUOzDR31cbp1oPYGFjsn3IHB1ZEuZ1OL",
                      "Content-Type" => "application/json",
                      "Accept" => "application/json"
      ];
        $keyword = request('code');
        $GetOrder = [
                "scodes"=>[$keyword]
                 
        ];

       
        $res = $client->post('https://mutualfundsnav.p.mashape.com/', [
            'headers' => $headers, 
            'json' => $GetOrder,
        ]);
      
        $array = json_decode($res->getBody()->getContents(), true);
        echo $array[0]['nav'];

             // echo $res->getBody()->getcontents();
    }

      public function store()
    {

      Investment::create([
    'scheme_id' => request('code'),
      'buy_nav' => request('bnav'),
      'invest_amnt' => request('invest'),
      'current_value'=>request('invest'),
     'current_nav'=>request('bnav'),
    'user_id'=>auth()->id()
          ]);
      
         return back();
    }
}


