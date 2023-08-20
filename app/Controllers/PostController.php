<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Views\View;

class PostController
{
    public function __invoke(string $slug)
    {
        $post = PostModel::getBySlug($slug);

        return View::singlePostPage($post);
    }
}
