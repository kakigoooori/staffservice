<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'Client';


    public function clientworks()
    {
return $this->hasMany('App\Clientworks','client_id','id');

    }
}
