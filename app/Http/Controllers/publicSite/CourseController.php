<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
// use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Cases;
use App\Models\Nationality;
use App\Models\Treatment;
use App\Models\Insurance;
use App\Models\Area;
use App\Models\City;
use App\Models\Hospital;
use App\Models\Service;
use App\Models\Course;
use App\Http\Resources\CategoryResource;
use Stevebauman\Location\Facades\Location;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::with('trainer')->get();
        $data = [];
        if (!empty($courses)) {
            foreach ($courses as $course) {
                $courseKeys = array_keys($course->getAttributes());
                foreach ($courseKeys as $attribute)
                {
                    if($attribute=='trainer')
                    {
                        $trainerKeys = array_keys($attribute->getAttributes());
                        foreach ($trainerKeys as $key)
                        {
                            $nestedData['trainer'][$key]=$course->trainer->$attribute;
                        }
                    }
                    else
                    {
                        $nestedData[$attribute]=$course->$attribute;
                    }
                }
                $data[] = $nestedData;
            }
        }
        // if ($data) {
            return response()->json([
                'code' => 200,
                'courses' => $data,
            ]);
        // } else {
        //     return response()->json([
        //         'message' => 'Internal Server Error',
        //         'code' => 500,
        //         'data' => [],
        //     ]);
        // }
    }
}

