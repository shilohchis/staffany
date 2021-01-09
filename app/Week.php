<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $fillable = [
        'title',
        'day',
        'week',
        'start_time',
        'end_time',
        'is_published',
        'user_id'
    ];

    public function scopeByUser($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
