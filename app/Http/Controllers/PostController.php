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
                    'is_admin' => Auth::user()->is_admin
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

            return redirect()->back()->with('error',$decodedPosts);
        }
              
        return redirect('posts/list');
    }

    public function view(Request $request)
    {
        try
        {
            $post = $this->client->request('GET', env('MICRO_SERVICE_URL').'posts/view/'.$request->id,[
                'headers' => [
                    'Accept' => 'application/json',
                    'token' => [Auth::user()->api_token]
                ]
            ]);

            if($post->getStatusCode()=="200")
            {
                $decodedPost = json_decode($post->getBody(),true);
            }
        }
        catch(\Exception $e)
        {
            $decodedPost = $e->getMessage();
        }

        return view('posts.view')->with('post',$decodedPost);
    }

    public function edit(Request $request)
    {
        try{
            $post = $this->client->request('GET', env('MICRO_SERVICE_URL').'posts/view/'.$request->id, [
                'headers' => [
                    'Accept' => 'application/json',
                    'token' => [Auth::user()->api_token]
                ]
            ]);

            if($post->getStatusCode()=="200")
            {
                $decodedPost = json_decode($post->getBody(),true);
            }
        }
        catch(\Exception $e)
        {
            $decodedPost = $e->getMessage();
        }

        return view('posts.edit')->with('post',$decodedPost);
    }

    public function update(Request $request)
    {
     
        try{

            $posts = $this->client->request('PUT', env('MICRO_SERVICE_URL').'posts/edit/'.$request->id, [
                'headers' => [
                    'Accept' => 'application/json',
                    'token' => [Auth::user()->api_token],
                    'is_admin' => Auth::user()->is_admin
                ],
                'form_params' => [
                    'title' => $request->title,
                    'body' => $request->body,
                    'views' => 1
                ]
            ]);

            $decodedPosts = json_decode($posts->getBody(),true);


        }
        catch(\Exception $e)
        {
            $decodedPosts = $e->getMessage();
            return redirect()->back()->with('error', $decodedPosts);
        }
       
        return redirect('posts/view/'.$request->id);
    }
}
