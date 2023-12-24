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
                $nestedData['id'] = $course->id;
                $nestedData['name'] = $course->getTranslation('name', app()->getLocale());
                $nestedData['description'] = $course->getTranslation('description', app()->getLocale());
                $nestedData['category_text'] = $course->getTranslation('category_text', app()->getLocale());
                // $nestedData['category'] = $course->category_parent ? $course->category_parent->getTranslation('name', app()->getLocale()) : '';
                // $nestedData['sub_category'] = $course->category_child ? $course->category_child->getTranslation('name', app()->getLocale()) : '';
                $nestedData['trainer'] = $course->trainer ? $course->trainer->getTranslation('first_name', app()->getLocale()) : '';
                $nestedData['hours'] = $course->hours;
                $nestedData['online'] = $course->online;
                // $nestedData['created_at'] = $treatment->created_at->format('M Y');
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

