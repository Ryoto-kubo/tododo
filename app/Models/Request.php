<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'requests';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'body'
    ];

    // 親から子のデータを引っ張ってくる
    //「１対１」→ メソッド名は単数形
    public function comment()
    {
        // Profileモデルのデータを引っ張てくる
        return $this->hasOne('App\Models\Comment');
    }

}
