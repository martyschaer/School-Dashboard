<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The model representation of a task.
 *
 * @package App
 * @author Severin Kaderli
 */
class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'is_done', 'due_at'
    ];

    /**
     * All attributes that should be represented as a Carbon instance.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'due_at'];

    /**
     * Creates a relation between tasks and user models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
