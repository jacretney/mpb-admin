<?php

namespace Tests\Integration\Domain\Server\Properties;

use Illuminate\Support\Collection;
use Substratum\Domain\Server\Properties\PropertyEnum;
use Substratum\Domain\Server\Properties\PropertyService;
use Tests\TestCase;

class PropertyServiceTest extends TestCase
{
    private PropertyService $propertyService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->propertyService = resolve(PropertyService::class);
    }

    public function test_can_setup_default_server_properties()
    {
        $this->assertDatabaseCount('properties', 0);

        $this->propertyService->setupDefaults();

        $this->assertDatabaseCount('properties', count(PropertyEnum::cases()));
    }

    public function test_can_update_server_properties()
    {
        $this->propertyService->setupDefaults();

        $this->propertyService->setProperties(Collection::wrap([
            [
                'key' => PropertyEnum::LevelName,
                'value' => 'My cool level',
            ],
        ]));

        $this->assertDatabaseHas('properties', [
            'key' => PropertyEnum::LevelName,
            'value' => 'My cool level',
        ]);
    }

    public function test_can_update_multiple_server_properties()
    {
        $this->propertyService->setupDefaults();

        $this->propertyService->setProperties(Collection::wrap([
            [
                'key' => PropertyEnum::LevelName,
                'value' => 'My cool level',
            ],
            [
                'key' => PropertyEnum::MaxPlayers,
                'value' => 100,
            ],
        ]));

        $this->assertDatabaseHas('properties', [
            'key' => PropertyEnum::LevelName,
            'value' => 'My cool level',
        ]);

        $this->assertDatabaseHas('properties', [
            'key' => PropertyEnum::MaxPlayers,
            'value' => 100,
        ]);
    }
}