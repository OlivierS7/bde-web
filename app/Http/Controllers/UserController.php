<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8001/users";
        $response = $client->request('POST', $url, [
            'form_params' => [
                'mail' => $request->mail,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'campus' => $request->campus,
                'password' => $request->password,
            ]
        ]);
        return redirect('/');
    }
}
