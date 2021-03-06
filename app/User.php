<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'email',
        'password',
        'is_subscribed',
        'is_admin',
        'status_id',
        'is_terms_accepted'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function updateUser($user, Request $request)
    {

        $request->is_admin === 'on' ? $isAdmin = true : $isAdmin = false;
        $request->is_subscribed === 'on' ? $isSubscribed = true : $isSubscribed = false;

        return  $user->update([
                               'email' => $request->email,
                               'is_subscribed' => $isSubscribed,
                               'is_admin' => $isAdmin,
                               'status_id' => $request->status_id,

        ]);


    }


    public function isAdmin()
    {

        return Auth::user()->is_admin == 1;
    }

    public function isActiveStatus()
    {

        return Auth::user()->status_id == 10;
    }

    public function isSubscribed()
    {

        return Auth::user()->is_subscribed == 1;
    }

    public function isUserAdmin($user)
    {

        return $user->is_admin == 1;


    }

    public function isUserSubscribed($user)
    {

        return $user->is_subscribed == 1;


    }

    public function isUserActive($user)
    {

        return $user->status_id == 10;


    }

    public function socialProviders()
    {

        return $this->hasMany('App\SocialProvider');

    }

    public function showAdminStatusOf($user)
    {

        return $user->is_admin ? 'Yes' : 'No';

    }

    public function showNewsletterStatusOf($user)
    {

        return $user->is_subscribed == 1 ? 'Yes' : 'No';

    }

    public function showStatusName($status)
    {

        return $status === 10 ?  'Active' : 'Inactive';


    }
}
