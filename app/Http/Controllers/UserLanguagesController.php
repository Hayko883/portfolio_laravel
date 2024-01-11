<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\User;
use App\Models\UserLanguages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserLanguagesController extends Controller
{
	public function storePercent(Request $request)
	{
		$userLanguages = $request->get('percent');
		foreach ($userLanguages as &$language) {
			$language['user_id'] = auth()->id();
			$language['created_at'] = Carbon::now();
			$language['updated_at'] = Carbon::now();
		}
		
		UserLanguages::insert($userLanguages);
		return response()->json([
			'success' => true,
			'data' => $userLanguages,
		]);
	}
	
	public function updatePercent(Request $request)
	{
		$updateLanguages = UserLanguages::where('user_id', auth()->user()->id)->get();
		$ids = $updateLanguages->map(function ($item) {
			return $item->language_id;
		});
		foreach ($ids as $id) {
			$item = $updateLanguages->where('language_id', $id)->first();
			$item->update(['percent' => $request->percent[$id]]);
			$item->save();
		}
		return response()->json([
			'success' => true,
			'data' => $updateLanguages,
		]);
		
	}
	
	public function index()
	{
		$languages = Language::all();
		return response()->json(['languages' => $languages]);
	}
	
}
