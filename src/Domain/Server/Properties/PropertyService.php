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
                    'key' => $property->value,
                    'value' => $property->getDefault(),
                ]);     
            });
    }

    public function setProperties(Collection $properties): void
    {       
        $properties->each(function (array $property) {
            Property::where('key', $property['key'])
                ->update([
                    'value' => $property['value'],
                ]);
        });
    }
}