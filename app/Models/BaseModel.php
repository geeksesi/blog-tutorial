<?php

namespace App\Models;

use PDO;

abstract class BaseModel
{
    protected static PDO $db;
    protected static $table;
    protected static $fields;

    public static function connection()
    {
        if (isset(self::$db)) {
            return self::$db;
        }
        self::$db = new \PDO(
            "mysql:host={$_ENV["MYSQL_HOST"]}:{$_ENV["MYSQL_PORT"]};dbname={$_ENV["MYSQL_DB"]}",
            $_ENV["MYSQL_USERNAME"],
            $_ENV["MYSQL_PASSWORD"],
            [
                "charset" => "utf8mb4",
                "collation" => "utf8_unicode_ci",
            ]
        );

        return self::$db;
    }
}
