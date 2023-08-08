<?php

namespace App\GraphQL\Mutations;

use App\Models\Post;

final class PopularPosts
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $posts = Post::where("views", ">", 5000)->orWhere("likes", ">", 50)->all();
        return $posts;
    }
}
