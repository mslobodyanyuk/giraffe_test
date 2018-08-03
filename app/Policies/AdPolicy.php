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

    /**
     * @param User $user
     * @return bool
     */
    public function add(User $user){

        foreach ($user->roles as $role) {

            if ($role->name == 'Admin') {
                return true;
            }
        }
        return FALSE;
    }

    /**
     * @param User $user
     * @param Ad $ad
     * @return bool
     */
    public function update(User $user, Ad $ad ){

        foreach($user->roles as $role){

            if($role->name == 'Admin'){
               // if($user->id == $ad->user_id ) { //all authorized can edit ??? can edit only the Admin who created.
                    return TRUE;
                //}
            }
        }
        return FALSE;
    }

    /**
     * @param User $user
     * @param Ad $ad
     * @return bool
     */
    public function delete(User $user, Ad $ad ){
        foreach($user->roles as $role){
            if($role->name == 'Admin'){
                if($user->id == $ad->user_id ) { //can only delete the Admin who created.
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function before(User $user){
        foreach ($user->roles as $role) {

            if ($role->name == 'Admin') {
                return true;
            }
        }
        return FALSE;
    }

}
