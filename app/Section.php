<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class Section
 * @package App
 * @mixin Eloquent
 */
class Section extends Model
{
    protected $fillable = ['name', 'description', 'logo'];
}
