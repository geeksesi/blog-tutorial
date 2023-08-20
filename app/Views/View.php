<?php

namespace App\Views;

class View
{

    public static function mainPage(array $posts)
    {
        include __DIR__ . "/template/index.php";
    }
}
