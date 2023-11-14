<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

use App\Models\Country;
use App\Models\Doctor;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index2()
    {
        $parent_categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
        $child_categories = CategoryResource::collection(Category::whereNotNull('parent_id')->latest()->get());
         // dd($parent_categories);
        return view('.backend.doctors.final',compact(['parent_categories', 'child_categories']));
    }

    public function doctors_api(Request $request)
    {
        $parent_categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
        $columns = [
            1 => 'id',
            2 => 'first_name',
            3=>'last_name',
            4=>'description',
            5=>'gender',
            6 => 'email',
            7 => 'phone',
            8=>'is_trainer',
            9=>'city_id',
            10=>'region',
            11=>'title',
            // 12 => 'created_at',
        ];

        $search = $request->input('search.value');
        $categoryId = $request->input('category_id');



        $totalData = Doctor::count();

        $query = Doctor::with('service','insurances','treatments','cases','city')
            ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));

        // if (!empty($search)) {
        //     $query->where(function ($query) use ($search) {
        //         $query->where('id', 'LIKE', "%{$search}%")
        //             ->orWhere('first_name->ar', 'LIKE', "%{$search}%")
        //             ->orWhere('first_name->en', 'LIKE', "%{$search}%")
        //             ->orWhere('last_name->en', 'LIKE', "%{$search}%")
        //             ->orWhere('last_name->ar', 'LIKE', "%{$search}%")
        //             ->orWhere('title->ar', 'LIKE', "%{$search}%")
        //             ->orWhere('title->en', 'LIKE', "%{$search}%")
        //             ->orWhereHas('category_parent', function ($query) use ($search) {
        //                 $query->where('name->ar', 'LIKE', "%{$search}%")
        //                     ->orWhere('name->en', 'LIKE', "%{$search}%");
        //             })
        //             ->orWhereHas('category_child', function ($query) use ($search) {
        //                 $query->where('name->ar', 'LIKE', "%{$search}%")
        //                     ->orWhere('name->en', 'LIKE', "%{$search}%");
        //             })
        //             ->orWhereHas('treatments', function ($query) use ($search) {
        //                 $query->where('name->ar', 'LIKE', "%{$search}%")
        //                     ->orWhere('name->en', 'LIKE', "%{$search}%");
        //             })
        //             ->orWhereHas('cases', function ($query) use ($search) {
        //                 $query->where('name->ar', 'LIKE', "%{$search}%")
        //                     ->orWhere('name->en', 'LIKE', "%{$search}%");
        //             })
        //             ->orWhereHas('services', function ($query) use ($search) {
        //                 $query->where('name->ar', 'LIKE', "%{$search}%")
        //                     ->orWhere('name->en', 'LIKE', "%{$search}%");
        //             });
        //     });
        // }

        // Filter by category if a category ID is provided
        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $totalFiltered = $query->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $doctors= $query->skip($start)->take($limit)->get();

        $data = [];

        if (!empty($doctors)) {
            $ids = $start;

            log::info($doctors);
            foreach ($doctors as $doctor) {
                $nestedData['id'] = $doctor->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
                $nestedData['first_name'] = $doctor->first_name;
                $nestedData['last_name'] = $doctor->getTranslation('last_name', app()->getLocale(Config::get('app.locale')));
                $nestedData['title'] = $doctor->getTranslation('title', app()->getLocale(Config::get('app.locale')));
                $nestedData['email'] = $doctor->email;
                $nestedData['gender'] = $doctor->gender;
                $nestedData['Phone'] = $doctor->Phone;
                $nestedData['description'] = $doctor->description;
                $nestedData['is_trainer'] = $doctor->is_trainer;
                $nestedData['region'] = $doctor->region;
                // $nestedData['city_id'] = $doctor->city->name;
                $nestedData['city_id'] = $doctor->city ? $doctor->city->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
             // dd( $nestedData['city_id']);
                // $nestedData['nationality_id'] = $doctor->nationality_id;
                // $nestedData['category'] = $doctor->category_parent ? $doctor->category_parent->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
                // $nestedData['sub_category'] = $doctor->category_child ? $doctor->category_child->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
                // $nestedData['created_at'] = $doctor->created_at->format('M Y');
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
                'parent_categories'=>$parent_categories,
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],
            ]);
        }
    }
    public function index()
    {
        return view('tables');
    //     $countries = Country::latest()->get();

    //     return view('backend.categories.index', compact('countries'));
    // }

    // public function categories_api(Request $request)
    // {
    //     $columns = [
    //         1 => 'id',
    //         2 => 'name',
    //         3 => 'slug',
    //         4 => 'created_at',
    //     ];

    //     $search = [];

    //     $totalData = Category::whereNull('parent_id')->count();

    //     $totalFiltered = $totalData;

    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $order = $columns[$request->input('order.0.column')];
    //     $dir = $request->input('order.0.dir');

    //     $categoriesQuery = Category::whereNull('parent_id');

    //     if (empty($request->input('search.value'))) {
    //         $categories = $categoriesQuery
    //             ->offset($start)
    //             ->limit($limit)
    //             ->orderBy($order, $dir)
    //             ->get();
    //     } else {
    //         $search = $request->input('search.value');

    //         $categories = $categoriesQuery
    //             ->where(function ($query) use ($search) {
    //                 $query->where('id', 'LIKE', "%{$search}%")
    //                     ->orWhere('name->ar', 'LIKE', "%{$search}%")
    //                     ->orWhere('name->en', 'LIKE', "%{$search}%");
    //             })
    //             ->offset($start)
    //             ->limit($limit)
    //             ->orderBy($order, $dir)
    //             ->get();

    //         $totalFiltered = $categoriesQuery
    //             ->where(function ($query) use ($search) {
    //                 $query->where('id', 'LIKE', "%{$search}%")
    //                     ->orWhere('name->ar', 'LIKE', "%{$search}%")
    //                     ->orWhere('name->en', 'LIKE', "%{$search}%");
    //             })
    //             ->count();
    //     }

    //     $data = [];

    //     if (!empty($categories)) {
    //         // providing a dummy id instead of database ids
    //         $ids = $start;

    //         foreach ($categories as $category) {
    //             $nestedData['id'] = $category->id;
    //             $nestedData['fake_id'] = ++$ids;
    //             $nestedData['name'] = $category->getTranslation('name', app()->getLocale(Config::get('app.locale')));
    //             $nestedData['slug'] = $category->slug;
    //             //   $nestedData['image'] = asset('storage/'.$category->image);
    //             $nestedData['created_at'] = $category->created_at->format('M Y');

    //             $data[] = $nestedData;
    //         }
    //     }

    //     if ($data) {
    //         return response()->json([
    //             'draw' => intval($request->input('draw')),
    //             'recordsTotal' => intval($totalData),
    //             'recordsFiltered' => intval($totalFiltered),
    //             'code' => 200,
    //             'data' => $data,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => 'Internal Server Error',
    //             'code' => 500,
    //             'data' => [],
    //         ]);
    //     }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalities=Nationality::get();
        return view('backend.doctors.form',['nationalities'=>$nationalities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $categoryId = $request->id;
    //     $existingCategory = Category::find($categoryId);
    //     $request->validate([
    //         'name_ar' => 'required|unique:categories,name->ar,' . $categoryId,
    //         'name_en' => 'required|unique:categories,name->en,' . $categoryId,
    //         'country_id' => 'required|array',
    //         //     'image' => 'required',
    //         'country_id.*' => 'exists:countries,id',
    //     ], [
    //         'name_ar.required' => __('validation.required'),
    //         'name_en.required' => __('validation.required'),
    //         'name_ar.unique' => __('validation.unique'),
    //         'name_en.unique' => __('validation.unique'),
    //         'country_id.exists' => __('validation.exists'),
    //     ]);


  

    //     $data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
    //     if ($categoryId) {
    //         // update the value
    //         $category = Category::whereId($categoryId)->firstOrFail();

    //         $category->update($data);
    //         if ($request->country_id) {
    //             $category->countries()->sync($request->country_id);
    //         }
    //         // user updated
    //         return response()->json(__('cp.update'));
    //     } else {
    //         // create new one if email is unique
    //         $category = Category::where('id', $request->id)->first();

    //         if (empty($category)) {
    //             $category = Category::create($data);
    //             if ($request->country_id) {
    //                 $category->countries()->attach($request->country_id);
    //             }
    //             return response()->json(__('cp.create'));
    //         } else {
    //             // category Already exist
    //             return response()->json(['message' => "Already exits"], 422);
    //         }
    //     }
    // }

    public function store(Request $request)
    {
        log::info($request->all());
        $doctorId = $request->id;
//  dd($request->all());
        // $request->validate([
        //     'name_ar' => 'required|unique:treatments,name->ar,'. $treatmentId,
        //     'name_en' => 'required|unique:treatments,name->en,'. $treatmentId,
        //     'category_id' => 'required|exists:categories,id',
        //     'child_category_id' => 'nullable|exists:categories,id',
        // ]);

        $data['first_name'] = ['en' => $request->first_name_en, 'ar' => $request->first_name_ar];
        $data['last_name'] = ['en' => $request->last_name_en, 'ar' => $request->last_name_ar];
        $data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $data['region'] = ['en' => $request->region_en, 'ar' => $request->region_ar];
        $data['address'] = ['en' => $request->address_en, 'ar' => $request->address_ar];
        // $data['email'] = "ss@dd.com";
        // $data['gender'] = $request->gender;
        // $data['nationality_id'] = $request->nationality_id;
        // $data['is_trainer'] = $request->is_trainer;
        // $data['city_id'] = $request->city_id;
        // $data['Phone'] = $request->Phone;
      

        // if ($doctorId) {
            // update the value
            // $doctor = Doctor::whereId($doctorId)->firstOrFail();
            // if($request->images){
            //     $doctor->clearMediaCollection('room_images');
            //     foreach($request->images as $image ){
                
    
            //      $doctor->addMedia($image)->toMediaCollection('room_images');
            //     }
    
            //  }
            //  if($request->image ){
            //     $doctor->clearMediaCollection('doctor_image');
    
            //     $doctor->addMedia($request->file('image'))->toMediaCollection('doctor_image');
    
            //  }
            // $doctor->update($data);

            // user updated
            // return response()->json(__('cp.update'));
        // } else {
            // create new one if email is unique
            // $doctor = Doctor::where('id', $request->id)->first();

            // if (empty($doctor)) {
                $doctor = Doctor::create($data);

                // if($request->images){

                //     foreach($request->images as $image ){
                //      $doctor->addMedia($image)->toMediaCollection('room_images');
                //     }
        
                //  }
                if ($request->hasFile('image')) {
                    $doctor->addMedia($request->file('image'))->toMediaCollection('Doctor_image');
                }
                // category created
                return response()->json(__('cp.create'));
            // }
        //      else {
        //         // category already exist
        //         return response()->json(['message' => "already exits"], 422);
        //     }
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category->load('countries');
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletedoctor($id)

    {  
        // dd($id);
          Doctor::where('id', $id)->delete();
       
        return 'Doctor deleted';
    }
}
