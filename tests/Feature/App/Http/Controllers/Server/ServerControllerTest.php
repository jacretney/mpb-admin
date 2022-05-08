<?php

namespace Tests\Feature\App\Http\Controllers\Server;

use Illuminate\Auth\Middleware\Authenticate;
use Substratum\Domain\Server\Properties\PropertyEnum;
use Substratum\Domain\Server\Properties\PropertyService;
use Tests\TestCase;

class ServerControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setup();

        (resolve(PropertyService::class))->setupDefaults();

        $this->withoutMiddleware(Authenticate::class);
    }

    public function test_can_update_server_settings()
    {
        $this->post(route('api.server.update'), [
            PropertyEnum::AllowCheats => true,
        ]);

        $this->assertDatabaseHas('properties', [
            'key' => PropertyEnum::AllowCheats->value,
            'value' => true,
        ]);
    }
}