<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function indexAction()
    {

        return view('users.index', 
                [
                    //"users" => \App\User::all(),
                    "users" => DB::table('users')->paginate(5),
                ]);
    }
    
    public function newAction()
    {
        return view('users.new');
    }

    public function createAction(Request $request)
    {    
       $validator = Validator::make($request->all(), [
                        'name'=>'required',
                        'email'=> 'required|email',
                        'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('users/new')
                        ->withErrors($validator)
                        ->withInput();
        }      
        
        $user = new \App\User([
                            'name' => $request->get('name'),
                            'email'=> $request->get('email'),
                            'password'=> bcrypt($request->get('password'))
                         ]);   
        
        try{

           $user->save();
        }
        catch(\Illuminate\Database\QueryException $qe){
           return redirect('users/new')->with('error', "Integrity constraint violation");
        }

        return redirect('users')->with('success', 'User has been added');
    }  
    
    
    public function editAction($id)
    {
        $user = \App\User::find($id);

        return view('users.edit', compact('user'));
    }
    
    
    public function updateAction(Request $request, \App\User $user)
    {
        
       $validator = Validator::make($request->all(), [
                        'name'=>'required',
                        'email'=> 'required|email',
                        'password' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect()->route('users.edit', $user->id)
                             ->withErrors($validator)
                             ->withInput();           
        }      

      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->password = bcrypt($request->get('password'));
      
       try{
           $user->save();
        }
        catch(\Illuminate\Database\QueryException $qe){
           return redirect()->route('users.edit', $user->id)->with('error', "SQL error!");
        }

        return redirect('users')->with('success', 'User: '.$user->name.' has been updated!');
    }
    
    public function deleteAction( \App\User $user)
    {
        //echo "Soft delete user here:".$user->name;die();
        return redirect('users');
    }

}
