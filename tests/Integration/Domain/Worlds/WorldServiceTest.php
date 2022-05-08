<?php

namespace Tests\Integration\Domain\Worlds;

use Substratum\Domain\Server\Properties\PropertyEnum;
use Substratum\Domain\Server\Properties\PropertyService;
use Substratum\Domain\Worlds\CreateOptionEnum;
use Substratum\Domain\Worlds\WorldService;
use Tests\TestCase;

class WorldServiceTest extends TestCase
{
    private WorldService $worldService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->worldService = resolve(WorldService::class);

        (resolve(PropertyService::class))->setupDefaults();
    }

    public function test_can_create_a_fresh_world()
    {
        $world = $this->worldService->create(CreateOptionEnum::Fresh, [
            'name' => 'My cool level',
            'path' => '/some/path',
        ]);

        $this->assertEquals('My cool level', $world->name);
        $this->assertEquals('/some/path', $world->path);

        $this->assertDatabaseHas('properties', [
            'key' => PropertyEnum::LevelName,
            'value' => 'My cool level',
        ]);
    }
    
    public function test_can_create_an_existing_world()
    {
        $this->markTestIncomplete('TODO, make this test');
    }

    public function test_can_delete_a_world()
    {
        $world = $this->worldService->create(CreateOptionEnum::Fresh, [
            'name' => 'My cool level',
            'path' => '/some/path',
        ]);

        $this->worldService->delete($world);

        $this->assertDatabaseMissing('worlds', [
            'id' => $world->id,
        ]);
    }
}