<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
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

    public function view(Request $request)
    {
        try{

            $user = $this->client->request('GET',env('MICRO_SERVICE_URL').'users/view/'.$request->id, [
                'headers' => [
                    'Accept' => 'application/json',
                    'token' => [Auth::user()->api_token]
                ]
            ]);

            if($user->getStatusCode()=="200")
            {
                $decodedUser = json_decode($user->getBody(),true);
            }

        }
        catch(\Exception $e)
        {
            $decodedUser = $e->getMessage();
        }

        return view('users.single')->with('user',$decodedUser);
    }

    
}
