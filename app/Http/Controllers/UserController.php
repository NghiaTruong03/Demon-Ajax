<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    }
    public function store(Request $request)
    {
        $createUser = User::create($request->all());
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function update(Request $request)
    {
        User::where('id', $request->update_id)->update([
            'name' => $request->update_name,
            'age' => $request->update_age,
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function delete(Request $request)
    {
        $user= User::find($request->id);
        $delete = $user->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
