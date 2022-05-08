<?php

namespace Tests\Integration\Domain\Server\Properties;

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
}