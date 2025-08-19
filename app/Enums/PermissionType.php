<?php

namespace App\Enums;

enum PermissionType: string
{
    case MODULE = 'module';
    case SUBMODULE = 'submodule';
    case ACTION = 'action';

    // Get all values (useful for validation)
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
