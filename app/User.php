<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;
use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 
        'lname', 
        'email', 
        'password',
        'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function address (){
        return $this->hasOne('App\Models\Address');
    }

    public function membership (){
        return $this->hasMany('App\Models\Membership');
    }
    /**
     * Returns true if user if verfied
     * @return boolean
     */

     public function verified(){
        return $this->token == null;
     }

     /**
      * Sends the user a verification email.
      *
      *@return void
      */

      public function sendVerificationEmail(){
          $this->notify(new VerifyEmail($this));
          return true;
      }
}
