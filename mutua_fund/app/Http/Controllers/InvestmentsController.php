<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use GuzzleHttp\Client;

use GuzzleHttp\Exception\RequestException;
use App\Investment;
use App\history;
use Yajra\Datatables\Datatables;
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
            'curl'  => [
                  CURLOPT_PROXY => '192.168.1.107',
                  CURLOPT_PROXYPORT => 3128,
                  CURLOPT_PROXYUSERPWD => 'ipg_2015048:apple28',
             ],
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
             'curl'  => [
                  CURLOPT_PROXY => '192.168.1.107',
                  CURLOPT_PROXYPORT => 3128,
                  CURLOPT_PROXYUSERPWD => 'ipg_2015048:apple28',
             ],
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
            'curl'  => [
                  CURLOPT_PROXY => '192.168.1.107',
                  CURLOPT_PROXYPORT => 3128,
                  CURLOPT_PROXYUSERPWD => 'ipg_2015048:apple28',
             ],
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


     public function CloseInvestment($id)
    {
       
      $account = Investment::find($id);
      history::create([
    'scheme_id' =>  $account->scheme_id,
      'buy_nav' => $account->buy_nav,
      'invest_amnt' => $account->invest_amnt,
      'final_value'=>$account->current_value,
    'user_id'=>auth()->id()
          ]);
       
        $account->delete();
        return back();
    }
     public function history()
    {
          
      $funds= history::where('user_id',auth()->id())->get();
      return view('history',compact('funds'));
    }

}


