<?php

namespace App\GraphQL\Queries;

use App\Models\Post;

final class PopularPosts
{
    /**
     * 
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $posts = Post::where("views", ">", 5000)->orWhere("likes", ">", 50)->get();
        return $posts;
    }
}
