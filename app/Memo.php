<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $table = 'memo';

    public function genuine()
{
    return $this->belongsTo('App\Model\Genuine');
}

}
