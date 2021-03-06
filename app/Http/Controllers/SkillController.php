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
        return view('skills.index', [
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
            'domain' => 'required|not_in:0',
            'level' => 'required|not_in:0'
        ]);
        
        $user->skills()->create([
               'date_recorded' => new \DateTime($request->date_recorded),
               'domain_id' => $request->domain,
               'level_id' => $request->level,
               'enabled' =>1
           ]);

        return redirect('/skills/'.$user->id);
    }
    
    public function editAction(Request $request,\App\Skill $skill)
    {
           return view('skills.update', 
                [
                    'skill' =>  \App\Skill::where("id", $skill->id)->first(),
                    "levels" => \App\Level::all(),
                    "domains" =>  \App\Domain::all(),
                    //"user"    => $user
                ]);
    }
    
    public function updateAction(Request $request,\App\Skill $skill)
    {    
        \App\Skill::where("id", $skill->id)->update([
                                                    'date_recorded' => new \DateTime($request->date_recorded),
                                                    'domain_id' => $request->domain,
                                                    'level_id' => $request->level,
                                                   ]);
        
        return redirect('/skills/'.$skill->user_id);
    }
    
    public function destroyAction(Request $request, $idskill)
    {
   
        \App\Skill::where("id",$idskill)->update(['enabled' => 0]);

        return back()->withInput();
    }
    
}
