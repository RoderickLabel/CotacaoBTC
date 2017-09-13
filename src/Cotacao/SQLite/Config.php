<?php
 
namespace Cotacao\SQLite;

class Config {

    /**
     * abbreviation
     */
    const DS = DIRECTORY_SEPARATOR;

   /**
    * path to the sqlite file
    */
    public static function getPathToSQLiteFile() 
    {
        return '..' . self::DS . 'db' . self::DS . 'phpsqlite.db';
    }
 
}