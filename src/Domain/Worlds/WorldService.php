<?php

namespace Substratum\Domain\Worlds;

class WorldService
{
    public function create(CreateOptionEnum $createOption, array $attributes): World
    {
        // TODO: Move this to a repository
        $world = new World($attributes);
        $world->save();

        if ($createOption === CreateOptionEnum::Existing) {
            // Upload world data

            return $world;
        }

        // Set world data in server properties
        
        return $world;
    }

    public function delete(World $world): bool
    {
        return $world->delete();
    }
}