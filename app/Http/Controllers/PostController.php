<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller
{
    protected $client; 
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        try{
            $posts = $this->client->request("GET",env("MICRO_SERVICE_URL")."posts/list",[
                'headers' => [
                    'Accept' => 'application/json',
                    'token' => [Auth::user()->api_token]
                ]
            ]);
    
            if($posts->getStatusCode()=="200")
            {
                $decodedPosts = json_decode($posts->getBody(),true);
            }
        }
        catch(\Exception $e)
        {
            $decodedPosts = $e->getMessage();
        }
        
        return view('posts.list')->with('posts',$decodedPosts);
    }
}
