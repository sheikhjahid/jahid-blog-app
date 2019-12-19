<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;

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

    public function create()
    {
        return view('posts.add');
    }

    public function store(Request $request)
    {

        try
        {
            $posts = $this->client->request('POST',env('MICRO_SERVICE_URL')."posts/add",[
                'headers' => [
                    'Accept' => 'appication/json',
                    'token' => [Auth::user()->api_token],
                    'is_admin' => true
                ],
                'form_params' => [
                    'title' => $request->title,
                    'body' => $request->body,
                    'views' => 0
                ],
                'allow_redirects' => [
                    'on_redirect' => url('posts/list')
                ]
            ]);

            $decodedPosts = json_decode($posts->getBody(),true);
    
        }
        catch(\Exception $e)
        {
            $decodedPosts = $e->getMessage();
        }
       
       
       
        return redirect('posts/list');

       
    }
}
