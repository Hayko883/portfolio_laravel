<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request)
    {
		$startDate = $request->input('dateValue.startDate');
		$endDate = $request->input('dateValue.endDate');
		
		$education = Education::create([
			'user_id' => auth()->user()->id,
			'certificate' => $request->certificate,
			'startDate' =>$startDate,
			'endDate' => $endDate
		]);
	   return response()->json([
		   'success'=> true,
		   'data' => $education
	   ]);
	   
    }
}
