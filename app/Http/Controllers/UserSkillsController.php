<?php

namespace App\Http\Controllers;

use App\Models\UserSkills;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserSkillsController extends Controller
{
	public function storePercent(Request $request): JsonResponse
	{
		$userSkill = $request->get('percent');
		$skillData = [];
		
		foreach ($userSkill as $key => &$skill) {
			$skillData[] = [
				'user_id' => auth()->id(),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
				'percent' => $skill,
				'skill_id' => $key
			];
		}
		
		UserSkills::insert($skillData);
		return response()->json([
			'success' => true,
			'data' => $userSkill,
		]);
	}
	
	public function updatePercent(Request $request)
	{
		$updateSkills = UserSkills::where('user_id', auth()->user()->id)->get();
		$ids = $updateSkills->map(function ($item) {
			return $item->skill_id;
		});
		foreach ($ids as $id) {
			$item = $updateSkills->where('skill_id', $id)->first();
			$item->update(['percent' => $request->percent[$id]]);
			$item->save();
		}
		return response()->json([
			'success' => true,
			'data' => $updateSkills,
		]);
	}
}
