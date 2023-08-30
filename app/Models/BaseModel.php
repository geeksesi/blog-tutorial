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

    public static function create(array $parameter)
    {
        $table = static::$table;
        $db = self::connection();

        $keys = "";
        $bind_keys = "";
        $bind_params = [];
        foreach ($parameter as $key => $value) {
            if (in_array($key, array_keys(static::$fields), true)) {
                $keys .= $key . ",";
                $bind_keys .= ":" . $key . ",";
                $bind_params[$key] = $value;
            }
        }
        $keys = rtrim($keys, ",");
        $bind_keys = rtrim($bind_keys, ",");

        $query = $db->prepare("INSERT INTO {$table} ({$keys}) VALUES ({$bind_keys})");
        if (!$query->execute($bind_params)) {
            throw new \Exception("Cannot Store model : " . get_class(), 1);
        }
        return true;
    }

    public static function delete(int $_id)
    {
        $table = static::$table;
        $db = self::connection();

        $query = $db->prepare("DELETE FROM {$table} WHERE id=:id LIMIT 1");

        return $query->execute(["id" => $_id]);
    }


    public static function find(int $id)
    {
        $table = static::$table;
        $db = self::connection();

        $query = $db->prepare("SELECT * from {$table} WHERE id=:id LIMIT 1");

        if (!$query->execute(["id" => $id])) {
            return false;
        }
        $query->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $query->fetch(PDO::FETCH_CLASS);
    }


    public static function update(array $parameter, int $_id): bool
    {
        $table = static::$table;
        $db = self::connection();

        $states = [];
        $bind_params = [];
        foreach ($parameter as $key => $value) {
            if (in_array($key, array_keys(static::$fields), true)) {
                $states[] = $key . "=:" . $key;
                $bind_params[$key] = ['value' => $value, 'type' => static::$fields[$key]];
            }
        }
        $states = implode(", ", $states);

        $query = $db->prepare("UPDATE {$table} SET {$states} WHERE id=:id ");
        $query->bindParam(":id", $_id, PDO::PARAM_INT);
        foreach ($bind_params as $key => $value) {
            $query->bindParam($key, $value["value"], $value["type"]);
        }
        if (!$query->execute()) {
            throw new \Exception("Cannot Store model : " . get_class(), 1);
        }
        return true;
    }
}
