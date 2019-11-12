<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as HTTPRequest;
use Session;

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
                'password' => \Hash::make($request->password),
            ]
        ]);
        return redirect('/');
    }

    public function connectUser(Request $request){
        request()->validate([
            'mail' => 'required|email|max:64',
            'password' => 'required'
        ]);
        $user_mail = request('mail');
        $user_password = request('password');

        $formParams = [
            'mail' => $request->mail,
            ];

        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8001/connect";
        $response = $client->request('GET', $url, [
            'form_params' => [
                'mail' => $request->mail,
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        if(\Hash::check($request->password, $result[0]->user_password)){
            session()->put('mail', $result[0]->user_mail);
            session()->put('id', $result[0]->user_id);
            session()->put('firstname', $result[0]->user_firstname);
            session()->put('lastname', $result[0]->user_lastname);
            return redirect('/home');
        } else {
            return back()->with('error','Mail et / ou mot de passe incorrect(s).');
        }
    }

    public function disconnectUser(){
        Session::flush();
        return redirect('/')->with('success','Déconnection effectuée');
    }
}
