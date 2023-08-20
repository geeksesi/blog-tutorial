<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Views\View;

class AdminController
{
    public function __invoke()
    {
        $posts = PostModel::getAll();

        return View::adminIndexPage($posts);
    }
}
