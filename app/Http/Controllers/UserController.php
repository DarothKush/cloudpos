<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with(['role'])->paginate(10);
        // return UserResource::collection($users);
        $users = User::with('roles')->get();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $data=$request->validated();
        $users=User::create($data);
        return new UserResource($users);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::with('roles')->find($id);
        if(!$users){
            return response()->json(['message'=>'Product not found'],404);
        }
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        $users = User::find($id);
        if (!$users) {
            return response()->json(['message' => 'Product not found.'], 404);
        }
        $users->update($validatedData);

        // Return the updated product and a success response
        return response()->json([
            'message' => 'User successfully updated.',
            'product' => $users,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::fine($id);
        if(!$users){
            return response()->json(['message'=>'User not found'],404);
        }
        $users->delete();
        return response()->json(['message' => 'User successfully deleted.'], 200);
    }
}
