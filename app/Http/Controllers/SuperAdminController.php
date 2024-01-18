<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
