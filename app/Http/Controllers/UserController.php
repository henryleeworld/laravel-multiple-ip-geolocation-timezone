<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get user time.
     *
     * @return void
     */
    public function getTime()
    {
        $users = User::whereIn('id', [1, 2])->get();
        foreach ($users as $user) {
            echo '使用者：' . $user->name . ' ，' . '建立時間：' . $user->created_at . '<br/>';
            // 只想要更新模型的時間戳
            $user->touch();
        }
    }
}
