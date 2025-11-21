<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [//WhiteList
        'title',
        'body',
    ];
    protected $guarded = [//BlackList
        'id',
    ];
    //
}
