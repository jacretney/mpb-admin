<?php

namespace Substratum\Domain\Server\Properties;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'value',
    ];
}