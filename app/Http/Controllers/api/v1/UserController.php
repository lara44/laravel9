<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\api\UserRequest;

class UserController extends Controller
{
    public function index(Request $request) {
        try {
            $users = User::paginate(10);
            return response()->json(['users'=> $users], 201);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 501);
        }
    }

    public function store(UserRequest $request) {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Hash::make($request->password);
            $user->save();
            return response()->json(['user'=> $user], 201);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 501);
        }
    }

    public function update(UserRequest $request) {
        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Hash::make($request->password);
            $user->save();
            return response()->json(['user'=> $user], 201);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 501);
        }
    }
}
