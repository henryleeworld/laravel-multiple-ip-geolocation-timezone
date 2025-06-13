<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Get user time.
     */
    public function getTime()
    {
        $users = User::whereIn('id', [1, 2])->get();
        foreach ($users as $user) {
            echo __('User:') . $user->name . __(' is created on ') . $user->created_at . __('.') . '<br/>';
            $user->touch();
        }
    }
}
