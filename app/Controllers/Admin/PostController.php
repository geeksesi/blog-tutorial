<?php

namespace App\Controllers\Admin;

use App\Models\PostModel;
use App\Views\View;
use Exception;

class PostController
{
    public function index()
    {
        $posts = PostModel::getAll();
        return View::adminPostIndexPage($posts);
    }

    public function create()
    {
        return View::adminPostCreatePage();
    }

    public function edit(int $id)
    {
        $post = PostModel::find($id);
        return View::adminPostEditPage($post);
    }

    public function store()
    {

        $data = [
            'title' => htmlspecialchars($_POST["title"]),
            'body' => htmlspecialchars($_POST["body"]),
            'thumbnail' => $this->handleThumbnail(),
            'slug' => $this->makeSlug(htmlspecialchars($_POST["title"])),
        ];


        PostModel::create($data);

        return header("Location: /admin/post");
    }

    public function update(int $id)
    {
        $post = PostModel::find($id);
        if (!$post) {
            throw new Exception('not found', 404);
        }
        $data = [
            'title' => htmlspecialchars($_POST["title"]),
            'body' => htmlspecialchars($_POST["body"]),
            'thumbnail' => $this->handleThumbnail($post),
            'slug' => $this->makeSlug(htmlspecialchars($_POST["title"]), $post),
        ];


        PostModel::update($data, $id);

        return header("Location: /admin/post");
    }

    public function delete(int $id)
    {
        PostModel::delete($id);

        return header("Location: /admin/post");
    }

    private function makeSlug(string $title, ?PostModel $post): string
    {
        if ($title == $post?->title) return $post->slug;

        $slug = $title;
        $slug .= sprintf(" %s", rand(1, 100));
        $slug = str_replace(' ', "-", $slug);
        return $slug;
    }

    private function handleThumbnail(PostModel $post = null): string
    {
        if (!isset($_FILES["thumbnail"]) || empty($_FILES["thumbnail"]["tmp_name"])) {
            return $post->thumbnail ?? null;
        }
        $target_file = sprintf("%s/%s", THUMBNAIL_PATH, basename($_FILES["thumbnail"]["name"]));
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
        if (!$check) {
            throw new Exception('image is not valid', 403);
        }
        if (!in_array($imageFileType, ["jpg", "png", "jpeg"])) {
            throw new Exception('image type is not valid', 403);
        }
        if ($_FILES["thumbnail"]["size"] > 5000000) {
            throw new Exception('image size is not valid', 403);
        }
        if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            throw new Exception('image upload cause error', 500);
        }
        return $target_file;
    }
}
