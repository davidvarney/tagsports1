<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class AccountController extends Controller
{
    public function show($user_id)
    {
        $user = User::find($user_id);

        return view('frontend.user.account.show', array(
            'title' => 'User: Account',
            'user' => $user
        ));
    }
}
