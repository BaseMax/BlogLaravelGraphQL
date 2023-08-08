<?php

namespace App\GraphQL\Mutations;

use App\Models\Post;
use Error;
use Illuminate\Support\Facades\Auth;

final class CreatePost
{
    /**
     * 
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $quard = Auth::guard("api");
        if (!$quard->user()) {
            throw new Error("Invalid credentials.");
        }
        $user = $quard->user();

        $post = Post::create([
            "title"        => $args["title"],
            "content"      => $args["content"],
            "category"     => $args["category"],
            "author"       => $user->id,
            "likes"        => 0,
            "views"        => 0,
            "isPublished"  => true
        ]);
        return $post;
    }
}
