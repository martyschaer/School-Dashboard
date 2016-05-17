<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model representation of a lesson.
 *
 * @package App
 * @author Marius Schär
 */
class Lesson extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'details', 'time_start', 'time_end'
    ];

    /**
     * Fields that should be represented by a Carbon-Object.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'time_start', 'time_end'
    ];

    /**
     * Creates relation between lesson and user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
