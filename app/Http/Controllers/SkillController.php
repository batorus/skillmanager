<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\SkillRepository;

class SkillController extends Controller
{
    
    protected $skills;
    
     public function __construct(SkillRepository $skills)
    {
        $this->middleware('auth');
        $this->skills = $skills;
    }
    
    public function indexAction(Request $request, \App\User $user)
    {
        //dd($this->skills->forUser($user));
        return view('skills.index', 
                [
                    'skills' => $this->skills->forUser($user),
                    "levels" => \App\Level::all(),
                    "domains" =>  \App\Domain::all(),
                    "user"    => $user
                ]);
    }
    
    public function storeAction(Request $request, \App\User $user)
    {

        $this->validate($request, [
            'date_recorded' => 'required|max:255',
        ]);
        
        $user->skills()->create([
               'date_recorded' => new \DateTime($request->date_recorded),
               'domain_id' => $request->domain,
               'level_id' => $request->level,
               'enabled' =>1
           ]);

        return redirect('/skills/'.$user->id);
    }
    
    public function destroyAction(Request $request, \App\Skill $skill)
    {
        //$skill->update(['enabled' => 0]);
        //dd($skill);
        $skill->find(1)->update(['enabled' => 0]);
        
        
        return redirect('/skills');
    }
    
}
