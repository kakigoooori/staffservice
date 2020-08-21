<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hope extends Model
{
    protected $table = 'hope';

    public function genuine()
{
    return $this->belongsTo('App\Model\Genuine');
}
}
