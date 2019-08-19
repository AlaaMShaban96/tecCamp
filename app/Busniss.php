<?php

namespace App;

use App\Notifications\Busniss\BusnissResetPassword;
use App\Notifications\Busniss\BusnissVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Busniss extends Authenticatable
{
    use Notifiable;

    public function labs()
    {
        return $this->hasMany('App\Labs');
    }

    public function pharmcy()
    {
        return $this->hasMany('App\Pharmcy');
    }

    public function hosptal()
    {
        return $this->hasMany('App\Hosptal');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new BusnissResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new BusnissVerifyEmail);
    }

}
