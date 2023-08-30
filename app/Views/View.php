<?php

namespace App\Views;

use App\Models\PostModel;

class View
{

    public static array $adminSideBar = [
        'dashboard' => [
            'url' => '/admin',
            'selected' => false,
            'icon' => 'fas fa-tachometer-alt',
            'text' => 'Dashboard'
        ],
        'post' => [
            'url' => '/admin/post',
            'selected' => false,
            'icon' => 'fab fa-wpforms',
            'text' => 'Posts'
        ]
    ];

    public static function mainPage(array $posts)
    {
        include __DIR__ . "/template/index.php";
    }

    public static function singlePostPage(PostModel $post)
    {
        include __DIR__ . "/template/post.php";
    }

    public static function adminIndexPage()
    {
        $sidebar = self::$adminSideBar;
        $sidebar['dashboard']['selected'] = true;
        include __DIR__ . "/template/admin/index.php";
    }

    public static function adminPostIndexPage($posts)
    {
        $sidebar = self::$adminSideBar;
        $sidebar['post']['selected'] = true;
        include __DIR__ . "/template/admin/post-index.php";
    }

    public static function adminPostCreatePage()
    {
        $action = '/admin/post/';
        $sidebar = self::$adminSideBar;
        $sidebar['post']['selected'] = true;
        include __DIR__ . "/template/admin/post-create.php";
    }

    public static function adminPostEditPage(PostModel $post)
    {
        $action = sprintf('/admin/post/update/%d', $post->id);
        $extraMethod = '<input type="hidden" name="_method" value="PUT">';
        $sidebar = self::$adminSideBar;
        $sidebar['post']['selected'] = true;
        include __DIR__ . "/template/admin/post-create.php";
    }
}
