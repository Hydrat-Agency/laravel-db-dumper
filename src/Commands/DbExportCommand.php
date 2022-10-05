<?php

namespace Hydrat\LaravelDbDumper\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql as Dumper;
use Hydrat\LaravelDbDumper\Commands\Concerns\ManagesPaths;

class DbExportCommand extends Command
{
    use ManagesPaths;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:export {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export database to file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dbname = config('database.connections.mysql.database');

        if (!($path = $this->determinePath($dbname))) {
            return 1;
        }

        $this->info("Exporting database to {$path}");

        Dumper::create()
            ->setDbName($dbname)
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile($path);

        $this->info('Database exported successfully.');

        return 0;
    }
}
