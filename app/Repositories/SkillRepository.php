<?php

namespace App\Repositories;

use App\User;
use DB;
class SkillRepository
{
    /**
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->skills()
                    ->select('users.name as username','skills.*', 'domains.name as namedomain', 'levels.name as namelevel')
                    ->join('domains', 'skills.domain_id', '=', 'domains.id')
                    ->join('levels', 'skills.level_id', '=', 'levels.id')  
                    ->join('users', 'skills.user_id', '=', 'users.id')  
                    ->where('skills.enabled', 1)                
                    ->orderBy('skills.created_at', 'asc')
                    ->get();
        
//        return  DB::table('skills')
//                    ->select('skills.*', 'domains.name as namedomain', 'levels.name as namelevel')
//                    ->join('domains', 'skills.domain_id', '=', 'domains.id')
//                    ->join('levels', 'skills.level_id', '=', 'levels.id')  
//                    ->where('skills.enabled', 1)                
//                    ->orderBy('skills.created_at', 'asc')
//                    ->get();
    }
    //, $domainid
    public function forUserAndDomain(User $user)
    {
        return $user->skills()
                    ->select('users.name as username','skills.*', 'domains.name as namedomain', 'levels.name as namelevel')
                    ->join('domains', 'skills.domain_id', '=', 'domains.id')
                    ->join('levels', 'skills.level_id', '=', 'levels.id')  
                    ->join('users', 'skills.user_id', '=', 'users.id')  
                    ->where('skills.enabled', 1)   
                    ->orderBy('skills.domain_id', "asc")  
                    ->orderBy('skills.date_recorded', 'asc')
                    ->get();
        

    }
    
    public function searchSkillset($startDate, $endDate, $domain, $level)
    {
        return  DB::table('skills')
                    ->select('users.name as username', 'skills.*', 'domains.name as namedomain', 'levels.name as namelevel')
                    ->join('domains', 'skills.domain_id', '=', 'domains.id')
                    ->join('levels', 'skills.level_id', '=', 'levels.id')  
                    ->join('users', 'skills.user_id', '=', 'users.id') 
                    ->where('skills.enabled', 1)  
                    ->whereBetween('skills.date_recorded', [$startDate, $endDate])
                    ->where('skills.domain_id', $domain) 
                    ->where('skills.level_id', $level) 
                    ->orderBy('skills.date_recorded', 'asc')
                    ->get();
    }
    
}