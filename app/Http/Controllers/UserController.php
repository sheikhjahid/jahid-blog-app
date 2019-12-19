<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
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
      
       return view('users.list')->with('users', $decodedUsers);
    }
}
