<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CateModel extends Model
{
    protected $primaryKey = 'cate_id';
    protected $table = 'cate';
    protected $guarded = [];
    public $timestamps = false;
}
