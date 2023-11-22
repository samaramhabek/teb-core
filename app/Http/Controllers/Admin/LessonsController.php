<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class LessonsController extends Controller
{
    public function index()
    {
      //  $categories = Category::latest()->get();
        // $parent_categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
        $courses = Course::all();
        return view('backend.lessons.index', compact('courses'));
    }

    public function treatments_api(Request $request)
    {

        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'course_id',
            5 => 'created_at',
        ];

        $search = $request->input('search.value');
        $courseId = $request->input('course_id');



        $totalData = Lesson::count();

        $query = Lesson::with('course')
            ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name->ar', 'LIKE', "%{$search}%")
                    ->orWhere('name->en', 'LIKE', "%{$search}%")
                    ->orWhereHas('course', function ($query) use ($search) {
                        $query->where('name->ar', 'LIKE', "%{$search}%")
                            ->orWhere('name->en', 'LIKE', "%{$search}%");
                    });
            });
        }

        // Filter by category if a category ID is provided
        if (!empty($courseId)) {
            $query->where('course_id', $courseId);
        }

        $totalFiltered = $query->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $lessons = $query->skip($start)->take($limit)->get();

        $data = [];

        if (!empty($lessons)) {
            $ids = $start;

            foreach ($lessons as $lesson) {
                $nestedData['id'] = $lesson->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['name'] = $lesson->getTranslation('name', app()->getLocale(Config::get('app.locale')));
                $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
                $nestedData['course'] = $lesson->course ? $lesson->course->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
                $nestedData['created_at'] = $lesson->created_at->format('M Y');
                $data[] = $nestedData;
            }
        }

        if ($data) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => intval($totalData),
                'recordsFiltered' => intval($totalFiltered),
                'code' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],
            ]);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lessonId = $request->id;

        $request->validate([
            'name_ar' => 'required|unique:lessons,name->ar,'. $lessonId,
            'name_en' => 'required|unique:lessons,name->en,'. $lessonId,
            'course_id' => 'required|exists:courses,id',
            'child_category_id' => 'nullable|exists:categories,id',
        ]);

        $data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $data['course_id'] = $request->course_id;

        if ($lessonId) {
            // update the value
            $lesson = Lesson::whereId($lessonId)->firstOrFail();
            $lesson->update($data);

            // user updated
            return response()->json(__('cp.update'));
        } else {
            // create new one if email is unique
            $lesson = Lesson::where('id', $request->id)->first();

            if (empty($lesson)) {
                $lesson = Lesson::create($data);

                // category created
                return response()->json(__('cp.create'));
            } else {
                // category already exist
                return response()->json(['message' => "already exits"], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lesson = Lesson::where('id', $id)->first();

        return response()->json($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Treatment $treatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return 'Lesson deleted';
    }
}