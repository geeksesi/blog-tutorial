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
        'created_at' => PDO::PARAM_STR,
        'thumbnail' => PDO::PARAM_STR,
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

    public function createdAtHumanFormat(): string
    {
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return $date->format('dS F, Y');
    }

    public function summery(): string
    {
        if (strlen($input) <= $length)
            return $input;

        $parts = explode(" ", $input);

        while (strlen(implode(" ", $parts)) > $length)
            array_pop($parts);

        return sprintf("%s...", $summery);
    }

    public function url(): string
    {
        return sprintf("/post/%s", $this->slug);
    }
}
