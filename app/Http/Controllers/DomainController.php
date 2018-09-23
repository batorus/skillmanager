<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use DB;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function indexAction()
    {

        return view('domains.index', 
                [
                    //"users" => \App\User::all(),
                    "domains" => DB::table('domains')->paginate(10),
                ]);
    }
    
    public function newAction()
    {
        return view('domains.new');
    }

    public function createAction(Request $request)
    {    
       $validator = Validator::make($request->all(), [
                        'name'=>'required',
                    ]);

        if ($validator->fails()) {
            return redirect('domains/new')
                        ->withErrors($validator)
                        ->withInput();
        }      
        
        $domain = new \App\Domain([
                            'name' => $request->get('name'),
                         ]);   
        
        try{
           $domain->save();
        }
        catch(\Illuminate\Database\QueryException $qe){
           return redirect('domains/new')->with('error', "SQL error!");
        }

        return redirect('domains')->with('success', 'Domain has been added');
    }  
    
    
    public function editAction($id)
    {
        $domain = \App\Domain::find($id);

        return view('domains.edit', compact('domain'));
    }
    
    
    public function updateAction(Request $request, \App\Domain $domain)
    {
        
       $validator = Validator::make($request->all(), [
                        'name'=>'required',
                    ]);

        if ($validator->fails()) {
            return redirect()->route('domains.edit', $domain->id)
                             ->withErrors($validator)
                             ->withInput();           
        }      

       $domain->name = $request->get('name');
      
       try{
           $domain->save();
        }
        catch(\Illuminate\Database\QueryException $qe){
           return redirect()->route('domains.edit', $domain->id)->with('error', "SQL error!");
        }

        return redirect('domains')->with('success', 'Domain: '.$domain->name.' has been updated!');
    }
    
    public function deleteAction( \App\Domain $domain)
    {
        //todo: implement soft delete
        return redirect('domains');
    }

}

