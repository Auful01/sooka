<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispose extends Model
{
    //

    protected $table = 'dispose';

    protected $fillable = ['date', 'user_id', 'category_id', 'point'];
}
