<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shows', ['data' => [], 'segment1'=> 'show','search'=>'']);
    }

    public function search(Request $request)
    {
        $response = Http::get('http://api.tvmaze.com/search/shows?q=' . $request->search);
        $response = json_decode($response);
        
        return view('shows', ['data' => $response, 'segment1'=> 'show','search'=>$request->search]);
    }
}
