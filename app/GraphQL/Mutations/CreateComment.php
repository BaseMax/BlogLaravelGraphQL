<?php

namespace App\GraphQL\Mutations;

use App\Models\Comment;
use Error;
use Illuminate\Support\Facades\Auth;

final class CreateComment
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $quard = Auth::guard("api");
        if (!$quard->user()) {
            throw new Error("Invalid credentials.");
        }
        $user = $quard->user();

        $comment = Comment::create([
            "content" => $args["content"],
            "author_id" => $user->id
        ]);
        return $comment;
    }
}
