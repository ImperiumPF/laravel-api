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
    protected $fillable = ['name','description','price','schedule','visitationTime','coordinates','points','rating'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'places';

    /**
     * One Place has many Images
     */
    public function images()
    {
        return $this->hasMany('Imperium\Models\Images');
    }

    /**
     * Many places have many Categories
     */
    public function category()
    {
        return $this->belongsToMany('Imperium\Models\Category');
    }
}
