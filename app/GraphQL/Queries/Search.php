<?php

namespace App\GraphQL\Queries;

use App\Models\Post;

final class Search
{
    /**
     * 
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $posts = Post::where("content", "like", "%" . $args["key"] . "%")->orWhere("title", "like", "%" . $args["key"] . "%")->get();
        return $posts;
    }
}
