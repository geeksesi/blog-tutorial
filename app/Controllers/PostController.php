<?php

namespace App\Controllers;


class PostController
{
    public function __invoke(string $slug)
    {
        echo "HI IT's POST PAGE <br/>";
        echo $slug;
    }
}
