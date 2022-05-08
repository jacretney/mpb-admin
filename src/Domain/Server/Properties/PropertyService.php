<?php

namespace Substratum\Domain\Server\Properties;

use DomainException;
use Illuminate\Support\Collection;

class PropertyService
{
    public function setupDefaults(): void
    {
        if (Property::all()->count()) {
            throw new DomainException('Cannot create default properties when they already exist.');
        }

        Collection::wrap(PropertyEnum::cases())
            ->each(function (PropertyEnum $property) {
                Property::create([
                    'name' => $property->name,
                    'value' => $property->value,
                ]);     
            });
    }
}