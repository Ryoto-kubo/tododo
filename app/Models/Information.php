<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{   
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'informations';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'body'
    ];
}
