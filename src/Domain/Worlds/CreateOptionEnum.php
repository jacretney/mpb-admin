<?php

namespace Substratum\Domain\Worlds;

enum CreateOptionEnum: string
{
    case Fresh = 'fresh';
    case Existing = 'existing';

    public static function fromValue(string $value): static
    {
        return match(true) {
            $value === CreateOptionEnum::Fresh->value => static::Fresh,
            $value === CreateOptionEnum::Existing->value => static::Existing,
        };
    }
}