<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExchange extends Model
{
    //

    protected $table = 'user_exchange';

    protected $fillable = ['user_id', 'exchange_id', 'status'];

    /**
     * Get the user that owns the UserExchange
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the exchange that owns the UserExchange
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exchange()
    {
        return $this->belongsTo(Exchange::class, 'exchange_id', 'id');
    }
}
