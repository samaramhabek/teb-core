<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Course;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;


class CoursesController extends Controller
{
    public function index()
    {
      //  $categories = Category::latest()->get();
        // $parent_categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
        $parent_categories = Category::all();
        $trainers = Doctor::where('is_trainer',1)->get();
        log::info($trainers);
        $child_categories = CategoryResource::collection(Category::whereNotNull('parent_id')->latest()->get());
        return view('backend.courses.index', compact('parent_categories', 'child_categories','trainers'));
    }

    public function courses_api(Request $request)
    {

        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'description',
            // 4 => 'category_id',
            // 5 => 'child_category_id',
            4 => 'category_text',
            5 => 'hours',
            6 => 'trainer_id',
        ];

        $search = $request->input('search.value');
        $categoryId = $request->input('category_id');



        $totalData = Course::count();

        $query = Course::with('trainer')
            ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name->ar', 'LIKE', "%{$search}%")
                    ->orWhere('name->en', 'LIKE', "%{$search}%")
                    ->orWhere('description->en', 'LIKE', "%{$search}%")
                    ->orWhere('description->en', 'LIKE', "%{$search}%") 
                    ->orWhere('category_text->en', 'LIKE', "%{$search}%") 
                    ->orWhere('category_text->en', 'LIKE', "%{$search}%") 
                    ->orWhere('hours', 'LIKE', "%{$search}%") 
                    // ->orWhereHas('category_parent', function ($query) use ($search) {
                    //     $query->where('name->ar', 'LIKE', "%{$search}%")
                    //         ->orWhere('name->en', 'LIKE', "%{$search}%");
                    // })
                    // ->orWhereHas('category_child', function ($query) use ($search) {
                    //     $query->where('name->ar', 'LIKE', "%{$search}%")
                    //         ->orWhere('name->en', 'LIKE', "%{$search}%");
                    // })
                    ->orWhereHas('trainer', function ($query) use ($search) {
                        $query->where('name->ar', 'LIKE', "%{$search}%")
                            ->orWhere('name->en', 'LIKE', "%{$search}%");
                    });
            });
        }

        // Filter by category if a category ID is provided
        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $totalFiltered = $query->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $courses = $query->skip($start)->take($limit)->get();

        $data = [];

        if (!empty($courses)) {
            $ids = $start;

            foreach ($courses as $course) {
                $nestedData['id'] = $course->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['name'] = $course->getTranslation('name', app()->getLocale(Config::get('app.locale')));
                $nestedData['description'] = $course->getTranslation('description', app()->getLocale(Config::get('app.locale')));
                $nestedData['category_text'] = $course->getTranslation('category_text', app()->getLocale(Config::get('app.locale')));
                $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
                // $nestedData['category'] = $course->category_parent ? $course->category_parent->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
                // $nestedData['sub_category'] = $course->category_child ? $course->category_child->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
                $nestedData['trainer'] = $course->trainer ? $course->trainer->getTranslation('first_name', app()->getLocale(Config::get('app.locale'))) : '';
                $nestedData['hours'] = $course->hours;
                $nestedData['online'] = $course->online;
                // $nestedData['created_at'] = $treatment->created_at->format('M Y');
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

        $courseId = $request->id;

        $request->validate([
            'name_ar' => 'required|unique:courses,name->ar,'. $courseId,
            'name_en' => 'required|unique:courses,name->en,'. $courseId,
            'category_id' => 'nullable|exists:categories,id',
            'child_category_id' => 'nullable|exists:categories,id',
            'trainer_id' => 'exists:doctors,id',
        ]);

        $data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];
        if($request->child_category_id)
        {
            $category=Category::whereId($request->child_category_id)->first()->name;
            $data['category_text'] = $category; 
        }
        elseif($request->category_id)
        {
            $category=Category::whereId($request->category_id)->first()->name;
            $data['category_text'] = $category; 
        }
        else
        {
            $data['category_text'] = ['en' => $request->category_text_en, 'ar' => $request->category_text_ar]; 
        }
        $data['hours'] =$request->hours; 
        $data['category_id'] = $request->category_id;
        $data['trainer_id'] = $request->trainer_id;
        $data['child_category_id'] = $request->child_category_id;
        $data['online']=0;
        if($request->is_online=='on')
        {
            $data['online']=1;
        }

        if ($courseId) {
            // update the value
            $course = Course::whereId($courseId)->firstOrFail();
            $course->update($data);

            // user updated
            return response()->json(__('cp.update'));
        } else {
            // create new one if email is unique
            $course = Course::where('id', $request->id)->first();

            if (empty($course)) {
                $course = Course::create($data);

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
        $course = Course::where('id', $id)->first();

        return response()->json($course);
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
    public function destroy(Course $course)
    {
        $course->delete();
        return 'course deleted';
    }
}
