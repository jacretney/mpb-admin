<?php

namespace Substratum\Domain\Server\Properties;

use DomainException;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Collection;
use Substratum\Infrastructure\Server\PropertyWriter;

class PropertyService
{
    public function __construct(
        private PropertyWriter $propertyWriter,
        private Dispatcher $dispatcher
    ){}

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

        $this->writeServerProperties();
    }

    private function writeServerProperties(): void
    {
        $this->propertyWriter
            ->setPath(env('MC_SERVER_PATH', public_path()))
            ->write();
    }
}