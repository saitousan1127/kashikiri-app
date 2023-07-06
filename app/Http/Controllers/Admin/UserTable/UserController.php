<?php

namespace App\Http\Controllers\Admin\UserTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::all();
        return view('admin.usertable.usertable', ['users' => $users]);
    }
}
