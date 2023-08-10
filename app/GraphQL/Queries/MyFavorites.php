<?php

namespace App\GraphQL\Queries;

use Error;
use Illuminate\Support\Facades\Auth;

final class MyFavorites
{
    /**
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $quard = Auth::guard("api");
        if(!$quard->user()){
            throw new Error("Invalid credentials.");
        }
        $user = $quard->user();
        return $user->favorites;
    }
}
