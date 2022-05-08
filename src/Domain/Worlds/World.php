<?php

namespace Substratum\Domain\Worlds;

use Illuminate\Database\Eloquent\Model;

class World extends Model
{
    protected $fillable = [
        'name',
        'path',
    ];
}