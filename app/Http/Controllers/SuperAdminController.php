<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
	public function index()
	{
		$users = User::all();
		return response()->json([
			'success' => true,
			'data' => $users
		]);
	}
	public  function userId($id)
	{
		$user = User::find($id);
		return response()->json([
			'success' => true,
			'data' => $user
		]);
	}
	public function update(UserStoreRequest $request, $id)
	{
		$user = User::findOrFail($id);
		$request -> validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|unique:users,email,' . $id,
			'age' => 'required|integer|min:18',
			'password' => 'nullable|string',
			'profession' => 'required|string|max:255',
			'address' => 'required|string|max:255',
		]);
		$user->update($request->all());
		return response()->json([
			'success' => 'User updated successfully',
			'data' => $user
		]);
	}
	public function deleteUser($id)
	{
		$user = User::find($id);
		
		if (!$user) {
			return response()->json(['error' => 'User not found.'], 404);
		}
		
		// Check if the authenticated user is an admin
		if (auth()->user()->role === 1) {
			$user->delete();
			
			return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
		} else {
			return response()->json(['error' => 'Unauthorized. Admins only.'], 403);
		}
	}
	public function createUser(UserStoreRequest $request)
	{
		if (auth()->user()->role === 1) {
			$user = User::create([
				'name' => $request->name,
				'password' => Hash::make($request->password),
				'email' => $request->email,
				'role' => $request->role,
				'address' => $request->address,
				'profession' => 'Developer',
				'age' => 25 ,
			]);
			return response()->json([
				'success' => true,
				'data' => $user,
			]);
		}else {
			return response()->json(['error' => 'Unauthorized. Admins only.'], 403);
		}
	}
}
