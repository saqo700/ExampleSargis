<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['welcome' => 'this stupid world']);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $user->save();

        return response()->json($user);
    }

    public function show() {

        $user = User::all();

        return response()->json($user);

    }

    public function update(CreateUserRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user()->update($data);

        return response()->json($user);

    }

    public function destroy()
    {
        $user = Auth::user()->delete();

        return response()->json(['success' => 'User Successfully Deleted']);
    }
}
