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
        request()->validate([
            'mail' => 'required|email|max:64',
            'password' => 'required|min:8|max:32|regex:^(?=.*[A-Z])(?=.*\d).+$^',
            'passwordVerif' => 'required|same:password' 
        ]);
        $user_mail = request('mail');
        $user_password = request('password');

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
