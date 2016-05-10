<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $fillable = [
        'name', 'details'
    ];

    protected $dates = [
        'time_start', 'time_end', 'created_at', 'updated_at'
    ];

    /**
     * Creates relation between lesson and user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
