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

         
         $data = $this->skills->forUserAndDomain($user, 3);
         
         $datas = [];
         foreach($data as $d){
           $yr = date("Y", strtotime($d->date_recorded)) ; 
           $mon = date("m", strtotime($d->date_recorded)); 
           $day = date("d", strtotime($d->date_recorded)); 
           
           $datas[] = array('year'=>$yr,
                            'month'=>$mon,
                            'day'=>$day,
                            'level' => $d->level_id
                           );
         }
         //dd(json_encode($datas));
        // strtotime("11-09-2018");
//          $php_date = getdate(strtotime("11-09-2018"));
//          // or if you want to output a date in year/month/day format:
//         $date = date("Y/m/d", strtotime("11-09-2018")); 
//         
//         $yr = date("Y", strtotime("11-09-2018")) ; 
//        $mon = date("m", strtotime("11-09-2018")); 
//        $date = date("d", strtotime("11-09-2018")); 
//        $dateFormat = 'm-d-Y';
//        $stringDate = '2000-11-29';
//        $date = DateTime::createFromFormat($dateFormat, $stringDate);   
//        dd($mon);
        return view('charts.index', 
                [
                    'skills' => $this->skills->forUserAndDomain($user, 3),
                    'datas'  => json_encode($datas),
                    'user' => $user
                ]);
        
        //return response()->json($this->skills->forUserAndDomain($user, 3));
    }
}
