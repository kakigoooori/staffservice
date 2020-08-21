<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Genuine extends Model
{
    protected $table = 'genuine';

    public function skill()
    {
        return $this->hasMany('App\Skill','genuine_id','id');
    }

    public function salary()
    {
        return $this->hasMany('App\Salary','genuine_id','id');
    }

    public function family()
    {
        return $this->hasMany('App\Family','genuine_id','id');
    }

    public function hope()
    {
        return $this->hasMany('App\Hope','genuine_id','id');
    }

    public function agreement()
    {
        return $this->hasMany('App\Agreement','genuine_id','id');
    }

    public function memo()
    {
        return $this->hasMany('App\Memo','genuine_id','id');
    }


}