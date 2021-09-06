<?php

namespace App\Models;


class Post
{
   private static $blog_posts = [
        [
            "title"     => "Judul Post Pertama",
            "slug"      => "judul-post-pertama",
            "author"    => "Ardian Ja'far",
            "body"      => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores ea aliquid repudiandae quisquam suscipit quas? Eaque ad quaerat veniam mollitia, optio aspernatur sapiente error quasi consequatur rerum accusamus provident qui. Dolorum voluptate vel consectetur, qui ipsam optio numquam deleniti facilis beatae ad voluptates cum dignissimos quae repudiandae cupiditate nemo assumenda autem excepturi sequi pariatur perspiciatis! Unde laudantium deserunt, repellendus magnam in aliquid laboriosam nesciunt, accusantium perferendis possimus vitae? Sed aliquid dolores delectus modi dolore optio eligendi tenetur ducimus quia totam."
        ],
        [
            "title"     => "Judul Post Kedua",
            "slug"      => "judul-post-kedua",
            "author"    => "Manyan",
            "body"      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. At, ullam ipsum veniam voluptatibus minus dicta! Animi quo voluptatem, repellat nemo laudantium illo est minus, accusamus commodi similique ab ratione! Ut maxime corporis nam nihil temporibus dolores ipsa vitae amet, omnis commodi obcaecati illum? Facere dolores voluptatem repellat illo possimus consequatur doloremque quod, suscipit velit alias porro nulla, doloribus, quae natus perspiciatis dolorem animi rerum eveniet corporis enim. Modi ipsam placeat repellat eveniet totam voluptate consequatur, illo fugit. Eius, expedita nisi. Dignissimos libero maiores repellat doloremque nemo consectetur pariatur dicta voluptatem beatae alias. Odit omnis ipsum dolor quam voluptatem iusto commodi."
        ],
        ];
    public static function all()
    {
        return collect(self::$blog_posts);
    }
    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
