<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreement';

    public function genuine()
{
    return $this->belongsTo('App\Model\Genuine');
}

}
