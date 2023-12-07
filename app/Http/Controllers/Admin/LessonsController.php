<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class LessonsController extends Controller
{
    public function index(Request $request)
    {
      //  $categories = Category::latest()->get();
        // $parent_categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
        $courses = Course::all();
        $course_id=0;
        if($request->has('course_id'))
        {
            $course_id=$request->course_id;
        }
        return view('backend.lessons.index', compact('courses','course_id'));
    }

    public function lessons_api(Request $request)
    {

        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'course_id',
            5 => 'created_at',
            5 => 'video_url',
            6 => 'file',
        ];

        $search = $request->input('search.value');
        $courseId = $request->course_id;
        log::info($request->all());


        $totalData = Lesson::count();

        $query = Lesson::with('course','media')
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
        if ($courseId!=0) {
            $query->where('course_id', $courseId);
        }

        $totalFiltered = $query->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $lessons = $query->skip($start)->take($limit)->get();
        $lessons->transform(function ($lesson) {
            $lesson->setRelation('file', $lesson->media->where('collection_name', 'lesson_upload1')->first());
            $lesson->unsetRelation('media');
            return $lesson;
        });
        log::info($lessons);

        $data = [];

        if (!empty($lessons)) {
            $ids = $start;

            foreach ($lessons as $lesson) {
                $nestedData['id'] = $lesson->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['name'] = $lesson->getTranslation('name', app()->getLocale(Config::get('app.locale')));
                $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
                $nestedData['course'] = $lesson->course ? $lesson->course->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
                $nestedData['course_id'] =$lesson->course_id;
                $nestedData['created_at'] = $lesson->created_at->format('M Y');
                $nestedData['video_url'] = $lesson->video_url;
                $nestedData['file'] = $lesson->file;
                $data[] = $nestedData;
            }
        }

        log::info($data);
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
        log::info($request->all());
        $lessonId = $request->id;

        $request->validate([
            'name_ar' => 'required|unique:lessons,name->ar,'. $lessonId,
            'name_en' => 'required|unique:lessons,name->en,'. $lessonId,
            'course_id' => 'required|exists:courses,id',
            'child_category_id' => 'nullable|exists:categories,id',
        ]);

        $data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $data['course_id'] = $request->course_id;
        $data['video_url'] = $request->video_url;

        if ($lessonId) {
            // update the value
            $lesson = Lesson::whereId($lessonId)->firstOrFail();
            $lesson->update($data);

            if ($request->hasFile('upload1')) {
                $lesson->clearMediaCollection('lesson_upload1');
                $lesson->addMedia($request->file('upload1'))->toMediaCollection('lesson_upload1');
            }
            // user updated
            return response()->json(__('cp.update'));
        } 
        else {
            // create new one if email is unique
            $lesson = Lesson::where('id', $request->id)->first();

            if (empty($lesson)) {
                $lesson = Lesson::create($data);
                if ($request->hasFile('upload1')) {
                    $lesson->addMedia($request->file('upload1'))->toMediaCollection('lesson_upload1');
                }
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
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lesson = Lesson::with('media')->where('id', $id)->first();
        log::info($lesson);
        return response()->json($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lesson)
    {
        Lesson::where('id',$lesson)->delete();
        return 'Lesson deleted';
    }
}
