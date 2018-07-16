<?php

namespace App\Policies;

use App\Ad;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(User $user){

        foreach ($user->roles as $role) {

            if ($role->name == 'Admin') {
                return true;
            }
        }
        return FALSE;
    }

    public function update(User $user, Ad $ad ){

        foreach($user->roles as $role){

            if($role->name == 'Admin'){
               // if($user->id == $ad->user_id ) { // все авторизированные могут редактировать         ??? может редактировать только тот Admin, кто создавал.
                    return TRUE;
                //}
            }
        }
        return FALSE;
    }

    public function delete(User $user, Ad $ad ){
        foreach($user->roles as $role){
            if($role->name == 'Admin'){
                if($user->id == $ad->user_id ) { //может удалять только тот Admin, кто создавал.
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    public function before(User $user){
        foreach ($user->roles as $role) {

            if ($role->name == 'Admin') {
                return true;
            }
        }
        return FALSE;
    }

}
