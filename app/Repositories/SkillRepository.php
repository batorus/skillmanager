<?php

namespace App\Repositories;

use App\User;

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
    
    public function forUserAndDomain(User $user, $domainid)
    {
        return $user->skills()
                    ->select('users.name as username','skills.*', 'domains.name as namedomain', 'levels.name as namelevel')
                    ->join('domains', 'skills.domain_id', '=', 'domains.id')
                    ->join('levels', 'skills.level_id', '=', 'levels.id')  
                    ->join('users', 'skills.user_id', '=', 'users.id')  
                    ->where('skills.enabled', 1)   
                    ->where('skills.domain_id', $domainid)  
                    ->orderBy('skills.created_at', 'asc')
                    ->get();
        

    }
    
}