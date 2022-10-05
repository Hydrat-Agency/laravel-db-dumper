<?php

namespace Hydrat\LaravelDbDumper\Commands\Concerns;

use LogicException;
use Hydrat\LaravelDbDumper\Facades\LaravelDbDumper;

trait ManagesPaths
{
    /**
     * Determine the path to export the database to.
     *
     * @param  string  $dbname            Used to build the sql filename from
     * @param  bool    $filenameRequired  Used to force the presence of the sql filename, when importing
     *
     * @return string|false
     */
    protected function determinePath(string $dbname, bool $filenameRequired = false)
    {
        try {
            return LaravelDbDumper::determinePath($dbname, $filenameRequired);
        }
        # Log an error.
        catch (LogicException $e) {
            $this->error($e->getMessage());
            return false;
        }
    }
}
