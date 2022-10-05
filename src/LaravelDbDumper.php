<?php

namespace Hydrat\LaravelDbDumper;

use \LogicException;
use Spatie\DbDumper\Databases\MySql as Dumper;

class LaravelDbDumper
{
    /**
     * Dump/Export as sql file to the given path.
     *
     * @param string $path
     * @return void
     */
    public function dumpTo(string $path, string $dbname)
    {
        Dumper::create()
            ->setDbName($dbname)
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile($path);
    }

    /**
     * Import sql file from the given path.
     *
     * @param string $path
     * @return void
     */
    public function importFrom(string $path)
    {
        DB::unprepared(file_get_contents($path));
    }

    /**
     * Determine the path to export the database to.
     *
     * @param  string  $dbname            Used to build the sql filename from.
     * @param  bool    $filenameRequired  Used to force the presence of the sql filename, when importing.
     *
     * @return string|false
     * @throws \LogicException
     */
    public function determinePath(string $dbname, bool $filenameRequired = false)
    {
        $base = base_path();
        $path = rtrim($this->argument('path') ?: $base, '/');

        $filename = $dbname . '_' . now()->format('Y-m-d_H-i-s') . '.sql';

        if (Str::endsWith($path, '.sql')) {
            $parts    = explode(DIRECTORY_SEPARATOR, $path);
            $filename = array_pop($parts);
            $path     = implode(DIRECTORY_SEPARATOR, $parts);
        }
        # Manage case when file name is expected
        elseif ($filenameRequired) {
            throw new LogicException('Please provide a path to the sql file.');
            return false;
        }

        $path = (file_exists($path) && $this->isAbsPath($path))
                    ? $path
                    : realpath($base . DIRECTORY_SEPARATOR . $path);

        if (!file_exists($path)) {
            throw new LogicException('The selected path does not exist.');
            return false;
        }

        return $path . DIRECTORY_SEPARATOR . $filename;
    }

    /**
     * Determine if the given path is absolute.
     *
     * @param string $path
     * @return bool
     */
    protected function isAbsPath(string $path)
    {
        return $path[0] === DIRECTORY_SEPARATOR || preg_match('~\A[A-Z]:(?![^/\\\\])~i', $path) > 0;
    }
}
