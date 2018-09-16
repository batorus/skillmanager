<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class ChartingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function indexAction(\App\User $user)
    {

        return view('charts.index', 
                [
                    'skills' => $this->skills->forUser($user),
                ]);
    }
}
