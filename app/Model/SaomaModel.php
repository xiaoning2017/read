<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaomaModel extends Model
{
    protected $primaryKey = 'code_id';
    protected $table = 'login_saoma';
    protected $guarded = [];
    public $timestamps = false;
}