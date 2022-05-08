<?php

namespace Substratum\App\Http\Controllers\Server;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Substratum\App\Http\Controllers\Controller;
use Substratum\Domain\Server\Properties\Property;
use Substratum\Domain\Server\Properties\PropertyEnum;
use Substratum\Domain\Server\Properties\PropertyService;

class ServerController extends Controller
{
    public function __construct(private PropertyService $propertyService){}

    public function show()
    {
        return Inertia::render('Server', [
            'serverProperties' => Property::all(),
        ]);
    }

    public function update(Request $request)
    {
        $this->propertyService->setProperties($this->transformProperties($request->all()));

        return redirect('dashboard');
    }

    private function transformProperties(array $properties): Collection
    {
        return Collection::wrap($properties)->map(function ($value, $key) {
            return [
                'key' => PropertyEnum::fromValue($key)->name,
                'value' => $value,
            ];
        })->values();
    }
}