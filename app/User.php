<?php

namespace App;

use App\Model\Pool;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordResetNotification;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area', 'number', 'password', 'name', 'authority', 'team', 'post', 'tel', 'email','post', 'note', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pool()
    {
        return $this->belongsTo('App\Model\Pool');
    }

    public function poolprofile()
    {
        return $this->hasMany('App\Model\Pool');
    }

    //掲示板

    public function messages(){
        $this->hasMany('App\Model\Message');
    }

    public function boards(){
        $this->hasMany('App\Model\Board');
    }

    //買う機能

    public function buy()
    {
        return $this->belongsTo('App\Buy');
    }


    //いいね機能

    public function favorites()
    {
        return $this->belongsToMany('App\Model\Pool')->withTimestamps();
    }



    /**
     * パスワードリセット通知の送信をオーバーライド
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new PasswordResetNotification($token));
    }




}
