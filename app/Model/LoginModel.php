<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'login_tel';
    protected $guarded = [];
    public $timestamps = false;
}
