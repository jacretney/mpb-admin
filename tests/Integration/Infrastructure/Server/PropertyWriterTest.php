<?php

namespace Tests\Integration\Infrastructure\Server;

use Substratum\Domain\Server\Properties\PropertyService;
use Substratum\Infrastructure\Server\PropertyWriter;
use Tests\TestCase;

class PropertyWriterTest extends TestCase
{
    private PropertyWriter $propertyWriter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->propertyWriter = new PropertyWriter();

        (resolve(PropertyService::class))->setupDefaults();
    }

    protected function tearDown(): void
    {
        unlink(public_path() . '/' . 'server.properties');
    }

    public function test_can_write_server_properties()
    {
        $this->propertyWriter->write();

        $writtenFile = file_get_contents(public_path() . '/' . 'server.properties');

        $this->assertNotNull($writtenFile);
    }
}