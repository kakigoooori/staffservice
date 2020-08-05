<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $table = 'prototype';

    public function user()
    {
        return $this->hasMany('App\User','id','user_id');
    }

    public function userprofile()
    {
        return $this->belongsTo('App\User');
    }

    public function buy()
    {
        return $this->belongsToMany('App\Buy');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

   
}
