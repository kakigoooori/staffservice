<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientWorks extends Model
{
    protected $table = 'clientWorks';


    public function client()
    {
return $this->belongsTo('App\Client');

    }
}
