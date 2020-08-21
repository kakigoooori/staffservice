<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'family';

    public function genuine()
{
    return $this->belongsTo('App\Model\Genuine');
}

}
