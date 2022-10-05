<?php

namespace Hydrat\LaravelDbDumper\Commands;

use Hydrat\LaravelDbDumper\Commands\Concerns\ManagesPaths;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DbImportCommand extends DbExportCommand
{
    use ManagesPaths;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import database from file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dbname = config('database.connections.mysql.database');

        if (!($path = $this->determinePath($dbname, true))) {
            return 1;
        }

        $this->info("Importing database from {$path}");

        DB::unprepared(file_get_contents($path));

        $this->info('Database imported successfully.');

        return 0;
    }
}
