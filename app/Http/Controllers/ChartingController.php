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

         
         $data = $this->skills->forUserAndDomain($user);
         
         $datas = [];
         foreach($data as $d){
           $yr = date("Y", strtotime($d->date_recorded)) ; 
           $mon = date("m", strtotime($d->date_recorded)); 
           $day = date("d", strtotime($d->date_recorded)); 
           
           $datas[$d->namedomain][] = ['year'=>$yr,
                                       'month'=>$mon,
                                       'day'=>$day,
                                       'level' => $d->level_id
                                      ];
         }

        return view('charts.index', 
                [
                    'skills' => $this->skills->forUserAndDomain($user),
                    'datas'  => json_encode($datas),
                    'user' => $user
                ]);
        
    }
}
