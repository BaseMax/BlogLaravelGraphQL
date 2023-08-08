<?php

namespace App\GraphQL\Queries;

use GraphQL\Error\Error;
use Illuminate\Support\Facades\Auth;

final class MyNotifications
{
    /**
     * 
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $quard = Auth::guard("api");
        if(!$quard->user()){
            throw new Error("Invalid credentials.");
        }
        $user = $quard->user();
        return $user->notifications;
    }
}
