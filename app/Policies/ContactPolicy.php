<?php

namespace App\Policies;

use App\Contacts;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
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
    public function modify(User $user, Contacts $contact){
       if($user->id == $contact->user_id){
           return true;
       }else{
           return false;
       }

    }
}
