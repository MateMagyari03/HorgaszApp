<?php

namespace Database\Seeders\Concerns;

trait SeedsTable
{
    // In your seeder set: protected static string $table = 'users';
    // Optional: protected static ?string $connection = null;

    public static function targetTable(): string
    {
        return static::$table;
    }

    public static function targetConnection(): ?string
    {
        return property_exists(static::class, 'connection') ? static::$connection : null;
    }
}
