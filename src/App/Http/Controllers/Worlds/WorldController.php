<?php

namespace Substratum\App\Http\Controllers\Worlds;

use Substratum\App\Http\Controllers\Controller;
use Substratum\App\Http\Requests\CreateWorldRequest;
use Substratum\Domain\Worlds\CreateOptionEnum;
use Substratum\Domain\Worlds\WorldService;

class WorldController extends Controller
{
    public function __construct(
        private WorldService $worldService
    ){}

    public function create(CreateWorldRequest $request)
    {
        $createOption = CreateOptionEnum::fromValue();

        $path = env('WORLD_PATH');

        if (! $path) {
            return redirect()->back()->with('error', 'Please ensure a WORLD_PATH has been specified in your .env file');
        }

        $this->worldService->create($createOption, [
            'name' => $request->input('name'),
            'path' => $path . '/' . str()->snake($request->input('name')),
            'file' => $request->file('file')->getRealPath(),
        ]);
    }
}