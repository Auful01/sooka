<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $table = 'exchanges';
    protected $fillable = ['name', 'image', 'description', 'point'];
    protected $hidden = ['created_at', 'updated_at'];
}
