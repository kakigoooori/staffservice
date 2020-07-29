<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'login_id', 'name', 'comment','bord_id',
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

}