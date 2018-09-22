<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\SkillRepository;

class SkillsetController extends Controller
{
    protected $skills;
    
    public function __construct(SkillRepository $skills)
    {
        $this->middleware('auth');
        $this->skills = $skills;
    }
    
    public function indexAction()
    {
        return view('skillset.index', [
                                        //'skills' => $this->skills->forUser($user),
                                        "levels" => \App\Level::all(),
                                        "domains" =>  \App\Domain::all(),
                                        //"user"    => $user
                                    ]);
    }
    
    public function searchAction(Request $request)
    {
        
        $this->validate($request, [
            'startDate' => 'required|max:255',
            'endDate' => 'required|max:255',
            'domain' => 'required|not_in:0',
            'level' => 'required|not_in:0'
        ]);
        
        return view('skillset.results', [
                                        'skillset' => $this->skills->searchSkillset(new \DateTime($request->startDate), 
                                                                                    new \DateTime($request->endDate), 
                                                                                    $request->domain, 
                                                                                    $request->level),
                                        "levels" => \App\Level::all(),
                                        "domains" =>  \App\Domain::all(),
                                    ]);

    }
    
    
}
