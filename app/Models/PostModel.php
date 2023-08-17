<?php

namespace App\Models;

use PDO;

final class PostModel extends BaseModel
{
    protected static $table = 'posts';
    protected static $fields = [
        'id' => PDO::PARAM_INT,
        'title' => PDO::PARAM_STR,
        'slug' => PDO::PARAM_STR,
        'body' => PDO::PARAM_STR,
    ];

    public static function getAll()
    {
        $table = static::$table;
        $db = self::connection();

        $query = $db->prepare("SELECT * from {$table}");

        if (!$query->execute()) {
            return false;
        }
        return $query->fetchAll(PDO::FETCH_CLASS, static::class);
    }
}
