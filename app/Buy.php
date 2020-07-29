<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{

    protected $table = 'buy';

    protected $fillable = [
        'id','user_id','login_id', 'pool_id',
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function usersent()
    {
        return $this->hasMany('App\User','id','user_id');
    }

    public function poolsent()
    {
        return $this->hasMany('App\Model\Pool','id','pool_id');
    }

    public function userreceive()
    {
        return $this->hasMany('App\User','id','login_id');
    }


}