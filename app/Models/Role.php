<?php

namespace Imperium\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Many-to-many relationship with User
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
