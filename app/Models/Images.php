<?php

namespace Imperium\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['filename'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    public function place()
    {
        return $this->belongsTo('Imperium\Models\Place');
    }
}