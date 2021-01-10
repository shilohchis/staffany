<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\CommonHelper;

class Week extends Model
{
    use CommonHelper;

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

    public function getStartTextAttribute()
    {
        return $this->formatDateTime($this->attributes['start_time'], 'd F Y H:i');
    }

    public function getEndTextAttribute()
    {
        return $this->formatDateTime($this->attributes['end_time'], 'd F Y H:i');
    }

    public function getDateChartAttribute()
    {
        return $this->formatDateTime($this->attributes['start_time'], 'd/m/Y');
    }

    public function getTimeChartAttribute()
    {
        $start = $this->formatDateTime($this->attributes['start_time'], 'H:i');
        $end = $this->formatDateTime($this->attributes['end_time'], 'H:i');

        return $start." ".$end;
    }

    public function getStartMinAttribute()
    {
        return $this->getMinutes('start', $this->attributes['start_time']);
    }

    public function getEndMinAttribute()
    {
        return $this->getMinutes('start', $this->attributes['end_time']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
