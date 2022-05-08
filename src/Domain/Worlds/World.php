<?php

namespace Substratum\Domain\Worlds;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;

class World extends Model
{
    protected $fillable = [
        'name',
        'path',
    ];

    protected static function booted()
    {
        static::creating(function ($world) {
            $world->uuid = Uuid::uuid4();
        });
    }
}