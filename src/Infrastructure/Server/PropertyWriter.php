<?php

namespace Substratum\Infrastructure\Server;

use DomainException;
use Illuminate\Support\Collection;
use Substratum\Domain\Server\Properties\Property;

class PropertyWriter
{
    private const FILE_NAME = 'server.properties';

    private ?string $path = null;

    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    public function write(): void
    {
        $properties = Property::all();

        if (! count($properties)) {
            throw new DomainException('Cannot write file: No properties to write');
        }

        $file = $this->path . '/' . self::FILE_NAME;

        file_put_contents($file, $this->buildFile($properties));
    }

    private function buildFile(Collection $properties) {
        $map = $properties->mapWithKeys(function (Property $property) {
            return [$property->key => $property->value];
        });

        return view('file-templates.server-properties', $map->toArray())->render();
    }
}