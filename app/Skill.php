<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';


public function genuine()
{
    return $this->belongsTo('App\Model\Genuine');
}

}