<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\SkillRepository;


class ChartingController extends Controller
{
    protected $skills;
    
     public function __construct(SkillRepository $skills)
    {
        $this->middleware('auth');
        $this->skills = $skills;
    }
    
     public function indexAction(\App\User $user)
    {

        return view('charts.index', 
                [
                    'skills' => $this->skills->forUserAndDomain($user, 3),
                    'user' => $user
                ]);
    }
}
