<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDispose extends Model
{
    //

    protected $table = 'user_dispose';

    protected $fillable = ['user_id', 'category_id', 'status', 'point'];

    /**
     * Get the user that owns the UserDispose
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the dispose that owns the UserDispose
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
