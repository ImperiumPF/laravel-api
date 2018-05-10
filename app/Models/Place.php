<?php

namespace Imperium\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','price','schedule','visitationTime','coordinates','points','rating','images'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'places';
}
