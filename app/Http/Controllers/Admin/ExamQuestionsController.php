<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamQuestion;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ExamQuestionsController extends Controller
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
        return view('backend.examquestions.index', compact('courses','course_id'));
    }

    public function exam_questions_api(Request $request)
    {

        $columns = [
            1 => 'id',
            2 => 'text',
            3 => 'course_id',
            5 => 'created_at',
            6 => 'answer1',
            7 => 'answer2',
            8 => 'answer3',
            9 => 'answer4',
        ];

        $search = $request->input('search.value');
        $courseId = $request->course_id;
        log::info('$request->course_id');
        log::info($request->course_id);



        $totalData = ExamQuestion::count();

        $query = ExamQuestion::with('Course')
            ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('text->ar', 'LIKE', "%{$search}%")
                    ->orWhere('text->en', 'LIKE', "%{$search}%")
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
        $questions = $query->skip($start)->take($limit)->get();
        log::info($questions);

        $data = [];

        if (!empty($questions)) {
            $ids = $start;

            foreach ($questions as $question) {
                $nestedData['id'] = $question->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['text'] = $question->getTranslation('text', app()->getLocale(Config::get('app.locale')));
                $nestedData['answer1'] = $question->getTranslation('answer1', app()->getLocale(Config::get('app.locale')));
                $nestedData['answer2'] = $question->getTranslation('answer2', app()->getLocale(Config::get('app.locale')));
                $nestedData['answer3'] = $question->getTranslation('answer3', app()->getLocale(Config::get('app.locale')));
                $nestedData['answer4'] = $question->getTranslation('answer4', app()->getLocale(Config::get('app.locale')));
                $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
                $nestedData['course'] = $question->course ? $question->course->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
                $nestedData['created_at'] = $question->created_at->format('M Y');
                $nestedData['correct'] = $question->correct;
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
        $questionId = $request->id;

        $request->validate([
            'text_ar' => 'required',
            'text_en' => 'required',
            'answer1_ar' => 'required',
            'answer1_en' => 'required',
            'answer2_ar' => 'required',
            'answer2_en' => 'required',
            'answer3_ar' => 'required',
            'answer3_en' => 'required',
            'answer4_ar' => 'required',
            'answer4_en' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        $data['text'] = ['en' => $request->text_en, 'ar' => $request->text_ar];
        $data['answer1'] = ['en' => $request->answer1_en, 'ar' => $request->answer1_ar];
        $data['answer2'] = ['en' => $request->answer2_en, 'ar' => $request->answer2_ar];
        $data['answer3'] = ['en' => $request->answer3_en, 'ar' => $request->answer3_ar];
        $data['answer4'] = ['en' => $request->answer4_en, 'ar' => $request->answer4_ar];
        $data['course_id'] = $request->course_id;
        $data['correct'] = $request->correct;

        if ($questionId) {
            // update the value
            $question = ExamQuestion::whereId($questionId)->firstOrFail();
            $question->update($data);
            // user updated
            return response()->json(__('cp.update'));
        } 
        else {
            // create new one if email is unique
            $question = ExamQuestion::where('id', $request->id)->first();

            if (empty($question)) {
                $question = ExamQuestion::create($data);
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
        $question = ExamQuestion::where('id', $id)->first();

        return response()->json($question);
    }

    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($question)
    {
        ExamQuestion::where('id',$question)->delete();
        return 'question deleted';
    }
}
