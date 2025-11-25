<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;//v12で、Factoryを使用するための準備。make:model -fで自動追加される
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;//これでfactoryによるsail artisan db:seedが実行できる
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
