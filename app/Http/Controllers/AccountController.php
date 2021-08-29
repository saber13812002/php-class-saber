<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function register(Request $request): Response
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $token = Str::random(100);
        $user->token = hash('sha256', $token);
        $user->save();
//
        return response($user->toArray());
    }

    /**
     * @throws \ErrorException
     */
    public function login(Request $request)
    {
        new Hash($request->password);
        $item = \App\Models\User::query()
            ->where('name', $request->name)
            ->firstOrFail();
//        dd($item->name);
        if (!Hash::check($request->password, $item->password)) {
            throw new \ErrorException('Error user and password not found');
        }
//
        return response($item);
    }
}
