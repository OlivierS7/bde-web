<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as HTTPRequest;
use Session;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    private $token;

    public function __construct(){
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8001/token";
        $username = "eZa25Ft$";
        $password = "pdjG4q$*dqzGI8";
        $response = $client->request('GET', $url, ['form_params' => [
            'username' => $username,
            'password' => $password,
        ]
    ]);
    $result = (json_decode($response->getBody()->getContents()));
    $this->token = $result->token;
    
    }

    public function addUser(Request $request)
    {
        request()->validate([
            'mail' => 'required|email|max:64',
            'password' => 'required|min:8|max:32|regex:^(?=.*[A-Z])(?=.*\d).+$^',
            'passwordVerif' => 'required|same:password' ,
            'checkbox' => 'accepted',
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
            ,'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ]);

        $url = "http://localhost:8001/connect";
        $response = $client->request('GET', $url, [
            'form_params' => [
                'mail' => $request->mail,
            ],
            'headers' => [
                'Authorization' => 'Bearer '.$this->token
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        if(\Hash::check($request->password, $result[0]->user_password)){
            session()->put('mail', $result[0]->user_mail);
            session()->put('id', $result[0]->user_id);
            session()->put('firstname', $result[0]->user_firstname);
            session()->put('lastname', $result[0]->user_lastname);
            session()->put('status', $result[0]->status_name);
            session()->put('campus', $result[0]->campus_name);
            return redirect('/home');
        }
        return redirect('/');
    }

    public function connectUser(Request $request){
        request()->validate([
            'mail' => 'required|email|max:64',
            'password' => 'required'
        ]);
        $user_mail = request('mail');
        $user_password = request('password');

        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8001/connect";
        $response = ($client->request('GET', $url,  [
            'form_params' => [
                'mail' => $request->mail,
            ], 
            'headers' => [
                'Authorization' => 'Bearer '.$this->token
            ]
        ]));
        $result = (json_decode($response->getBody()->getContents()));
        if(\Hash::check($request->password, $result[0]->user_password)){
            session()->put('mail', $result[0]->user_mail);
            session()->put('id', $result[0]->user_id);
            session()->put('firstname', $result[0]->user_firstname);
            session()->put('lastname', $result[0]->user_lastname);
            session()->put('status', $result[0]->status_name);
            session()->put('campus', $result[0]->campus_name);
            session()->put('campus_id', $result[0]->campus_id);
            session()->put('status_id', $result[0]->status_id);
            return redirect('/home');
        } else {
            return back()->with('error','Mail et / ou mot de passe incorrect(s).');
        }
    }

    public function disconnectUser(){
        Session::flush();

        return redirect('/')->withCookie(Cookie::forget('panier'))->with('success','Déconnection effectuée');
    }

    public function updatePasswordUser(Request $request){
        request()->validate([
            'password' => 'required',
            'newPassword' =>'required|min:8|max:32|regex:^(?=.*[A-Z])(?=.*\d).+$^',
        ]);
        $user_password = request('password');
        $user_mail = session('mail');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8001/connect";
        $response = $client->request('GET', $url, [
            'form_params' => [
                'mail' => $user_mail,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ]);
        $result = json_decode($response->getBody()->getContents());
        if(\Hash::check($request->password, $result[0]->user_password)){
            $user_id = $result[0]->user_id;
            $url = "http://localhost:8001/users/".$user_id;
            $response = $client->request('PUT', $url, [
                'form_params' => [
                    'mail' => $result[0]->user_mail,
                    'firstname' => $result[0]->user_firstname,
                    'lastname' => $result[0]->user_lastname,
                    'password' => \Hash::make($request->newPassword),
                    'campus' => $result[0]->campus_id,
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                ],
            ]);
            return redirect('/home');
        } else {
            return back()->with('error','Mot de passe incorrect(s).');
        }
    }
}
