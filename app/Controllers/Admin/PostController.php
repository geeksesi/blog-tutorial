<?php

namespace App\Controllers\Admin;

use App\Models\PostModel;
use App\Views\View;

class PostController
{
    public function index()
    {
        $posts = PostModel::getAll();

        return View::adminIndexPage($posts);
    }
}
