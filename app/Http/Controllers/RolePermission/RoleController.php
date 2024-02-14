<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all()->pluck('name');
        return $roles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleCreateRequest $request)
    {
        $data=$request->validated();
        $roles=Role::create($data);
        return new RoleResource($roles);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::all()->find($id);
        if(!$roles){
            return response()->json(['message'=>'Role not found'],404);
        }
        return response()->json($roles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Role::all()->find($id);
        if(!$roles){
            return response()->json(['message'=>'Role not found'],404);
        }
        $roles->delete();
        return response()->json(['message'=>'Role deleted successfully'],200);
    }
}
