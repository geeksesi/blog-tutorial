<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Views\View;

class HomeController
{
    public function __invoke()
    {
        $posts = PostModel::getAll();

        return View::mainPage($posts);
    }
}
