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

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function scopeByUser($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeWeek($query, $number)
    {
        return $query->where('week', $number);
    }

    public function scopeDay($query, $day)
    {
        return $query->where('day', $day);
    }

    public function scopeBetweenDate($query, $start, $end)
    {
        return $query->whereDate('start_time', '>=', $start)
                     ->whereDate('end_time', '<=', $end);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
