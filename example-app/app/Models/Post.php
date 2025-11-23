<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [//WhiteList
        'title',
        'body',
        'user_id'
    ];
    protected $guarded = [//BlackList
        'id',
    ];
    //

    public function user() {
        return $this -> belongsTo(User::class);//belongsTo:一つの値
    }
}
