<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class SeedIfEmpty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:if-empty
        {--class=* : One or more seeder FQCNs (e.g. Database\\Seeders\\RolesSeeder)}
        {--force : Force in production (passed to db:seed)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $seeders = $this->option('class');

        if (empty($seeders)) {
            $seeders = $this->discoverSeeders();
        }

        foreach ($seeders as $class) {
            if (!class_exists($class)) {
                $this->warn("Missing class: {$class}");
                continue;
            }

            if (!is_subclass_of($class, Seeder::class)) {
                $this->warn("Not a Seeder: {$class}");
                continue;
            }

            if (!method_exists($class, 'targetTable')) {
                $this->warn("Seeder does not declare target table (missing targetTable): {$class}");
                continue;
            }

            $table = $class::targetTable();
            $connection = method_exists($class, 'targetConnection') ? $class::targetConnection() : null;

            $schema = $connection ? Schema::connection($connection) : Schema::getFacadeRoot();
            $db = $connection ? DB::connection($connection) : DB::getFacadeRoot();

            if (!$schema->hasTable($table)) {
                $this->warn("Table does not exist: {$table} (Seeder: {$class})");
                continue;
            }

            $hasRows = $db->table($table)->limit(1)->exists();

            if ($hasRows) {
                $this->line("SKIP  {$class} (table '{$table}' not empty)");
                continue;
            }

            $this->info("SEED  {$class} (table '{$table}' is empty)");
            $this->call('db:seed', [
                '--class' => $class,
                '--force' => (bool) $this->option('force'),
            ]);
        }

        return self::SUCCESS;
    }

    private function discoverSeeders(): array
    {
        $path = database_path('seeders');

        if (!is_dir($path)) {
            return [];
        }

        $classes = [];

        foreach (File::allFiles($path) as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $class = 'Database\\Seeders\\' . $file->getBasename('.php');

            if (class_exists($class)) {
                $classes[] = $class;
            }
        }

        return array_values(array_filter($classes, fn ($c) => method_exists($c, 'targetTable')));
    }
    
}