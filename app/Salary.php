<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salary';

    public function genuine()
{
    return $this->belongsTo('App\Model\Genuine');
}

}
