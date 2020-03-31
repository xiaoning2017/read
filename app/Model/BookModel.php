<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $primaryKey = 'book_id';
    protected $table = 'book';
    protected $guarded = [];
    public $timestamps = false;
}
