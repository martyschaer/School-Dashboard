<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The model representation of a lesson.
 *
 * @package App
 * @author Marius Shcär
 */
class Lesson extends Model
{

    protected $fillable = [
        'name', 'details', 'time_start', 'time_end'
    ];

    protected $dates = [
        'time_start ', 'time_end', 'created_at', 'updated_at'
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
