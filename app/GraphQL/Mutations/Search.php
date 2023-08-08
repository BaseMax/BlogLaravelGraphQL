<?php

namespace App\GraphQL\Mutations;

use App\Models\Post;

final class Search
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $posts = Post::where("content", "like", "%" . $args["key"] . "%")->orWhere("title", "like", "%" . $args["key"] . "%")->all();
        return $posts;
    }
}
