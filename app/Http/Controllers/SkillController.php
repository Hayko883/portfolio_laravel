<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
	public function index()
	{
		$skill = Skill::all();
		return response()->json(['skill' => $skill]);
	}
	
}
