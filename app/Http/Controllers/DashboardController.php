<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
class DashboardController extends Controller
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function dashboard()
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



        try{
            $users = $this->client->request("GET", env("MICRO_SERVICE_URL")."users/list", [
                'headers' => [
                    'Accept' => 'application/json',
                    'token' => [Auth::user()->api_token]
                ]
            ]);

            if($users->getStatusCode()=="200")
            {
                $decodedUsers = json_decode($users->getBody(),true);
            }
        }
        catch(\Exception $e)
        {
            $decodedUsers = $e->getMessage();
        }

        return view('dashboard')->with([
            'posts' => $decodedPosts,
            'users' => $decodedUsers
        ]);
    }
}
