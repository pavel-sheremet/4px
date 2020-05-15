<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App
 * @mixin Eloquent
 */
class Role extends Model
{
    protected $fillable = ['slug'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
