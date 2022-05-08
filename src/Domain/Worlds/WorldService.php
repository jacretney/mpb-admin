<?php

namespace Substratum\Domain\Worlds;

use Illuminate\Support\Collection;
use RuntimeException;
use Substratum\Domain\Server\Properties\PropertyEnum;
use Substratum\Domain\Server\Properties\PropertyService;
use ZipArchive;

class WorldService
{
    public function __construct(
        private PropertyService $propertyService
    ){}

    public function create(CreateOptionEnum $createOption, array $attributes): World
    {
        if ($createOption === CreateOptionEnum::Existing) {
            $zip = new ZipArchive();
            
            if ($zip->open($attributes['file']) === FALSE) {
                throw new RuntimeException('Could not open zip file.');
            }

            $zip->extractTo($attributes['path'], $attributes['file']);
            $zip->close();
        } else {
            $properties = Collection::wrap([
                [
                    'key' => PropertyEnum::LevelName,
                    'value' => $attributes['name'],
                ],
            ]);

            $this->propertyService->setProperties($properties);
        }

        $world = World::create($attributes);
        return $world;
    }

    public function delete(World $world): bool
    {
        return $world->delete();
    }
}