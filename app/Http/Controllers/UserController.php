<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function indexAction(Request $request)
    {

        return view('users.index', 
                [
                    "users" => \App\User::all(),
                ]);
    }
}
