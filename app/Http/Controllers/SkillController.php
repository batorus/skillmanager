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
    
    public function indexAction(Request $request)
    {
        
        return view('skills.index', [
            'skills' => $this->skills->forUser($request->user()),
        ]);
    }
    
    public function storeAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        
        //dd($request->user());

        $request->user()->skills()->create([
               'name' => $request->name,
           ]);

        return redirect('/skills');
    }
    
}
