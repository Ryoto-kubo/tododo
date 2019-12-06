<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'comments';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'body'
    ];

    // 子から親のデータを引っ張ってくる
    //「１対１」→ メソッド名は単数形
    Public function request()
    {
        return $this->belongsTo('App\Models\Request');
    }

}
