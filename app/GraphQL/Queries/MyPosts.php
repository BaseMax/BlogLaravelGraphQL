<?php

namespace App\GraphQL\Queries;

use App\Models\Post;
use GraphQL\Error\Error;
use Illuminate\Support\Facades\Auth;

final class MyPosts
{
    /**
     * 
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $quard = Auth::guard("api");
        if(!$quard->user()){
            throw new Error("Invalid credentials.");
        }
        $user = $quard->user();
        return $user->posts;
        // return $user->posts;

        // Auth::attempt($args);
    }
}
