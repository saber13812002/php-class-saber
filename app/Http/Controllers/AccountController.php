<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function register(Request $request): \Illuminate\Http\Response
    {
        $item = new \App\Models\User;
        $item->fill($request->all());
        $item->password = Hash::make($request->password);
        $item->save();
        return response($item->toArray());
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
