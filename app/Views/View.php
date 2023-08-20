<?php

namespace App\Views;

use App\Models\PostModel;

class View
{

    public static function mainPage(array $posts)
    {
        include __DIR__ . "/template/index.php";
    }

    public static function singlePostPage(PostModel $post)
    {
        include __DIR__ . "/template/post.php";
    }
}
