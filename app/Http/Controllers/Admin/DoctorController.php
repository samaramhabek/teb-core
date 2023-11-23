<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Cases;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\DoctorInsurance;
use App\Models\DoctorService;
use App\Models\Insurance;
use App\Models\Hospital;
use App\Models\Nationality;
use App\Models\Service;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


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
            12=>'lat',
            13=>'lang',
            // 12 => 'created_at',
        ];

        $search = $request->input('search.value');
        $categoryId = $request->input('category_id');



        $totalData = Doctor::count();

        $query = Doctor::with('service','insurances','treatments','cases','city')
            ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));

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
                $nestedData['lat'] = $doctor->lat;
                $nestedData['lang'] = $doctor->lang;
                // $nestedData['city_id'] = $doctor->city->name;
                $nestedData['city_id'] = $doctor->city ? $doctor->city->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
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
    }

    /**
     * Show the form for creating a new resource.
     */
    
     public function create(Request $request)
     {

 
         $cases=Cases::get();
         $nationalities=Nationality::get();
         $categories=Category::get();
         $treatments=Treatment::get();
         $insurances=Insurance::get();
         $cities=City::get();
         $child_categories = Category::whereNotNull('parent_id')->get();
         $Hospitals=Hospital::get();
         $services=Service::get();
         $doctors[] = null;

         // $lang = app()->getLocale(Config::get('app.locale'));
         if($request->has('id'))
         {
             $doctors=Doctor::with('media')->whereId($request->id)->get();
             $doctors->transform(function ($doctor) {
                // $doctor->setRelation('images', $doctor->media->where('collection_name', 'doctor_images'));
                $doctor->setRelation('image', $doctor->media->where('collection_name', 'Doctor_image')->first());
                $doctor->unsetRelation('media');
                $doctor->setRelation('upload1', $doctor->media->where('collection_name', 'Doctor_upload1')->first());
                $doctor->unsetRelation('media');
                $doctor->setRelation('upload2', $doctor->media->where('collection_name', 'Doctor_upload2')->first());
                $doctor->unsetRelation('media');
                $doctor->setRelation('upload3', $doctor->media->where('collection_name', 'Doctor_upload3')->first());
                $doctor->unsetRelation('media');
                return $doctor;
            });

            //  log::info($doctors->first_name);
            //  log::info($doctors->first_name);
             // return view('backend.doctors.form',['doctor'=>$doctor,'cases'=>$cases,'nationalities'=>$nationalities,'categories'=>$categories,
             // 'treatments'=>$treatments,'insurances'=>$insurances,'cities'=>$cities]);
 
         }

         return view('backend.doctors.form',[ 'doctor'=>$doctors[0],'cases'=>$cases,'nationalities'=>$nationalities,'categories'=>$categories,
      'services'=>$services, 'child_categories'=>$child_categories,  'Hospitals'=>$Hospitals, 'treatments'=>$treatments,'insurances'=>$insurances,'cities'=>$cities]);
     }
 
   

    public function store(Request $request)
    {  
      // dd($request->all());
       // log::info($request->all());
        $doctorId = $request->id;
        if($doctorId){
            $data['first_name'] = ['en' => $request->first_name_en, 'ar' => $request->first_name_ar];
            $data['last_name'] = ['en' => $request->last_name_en, 'ar' => $request->last_name_ar];
            $data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $data['region'] = ['en' => $request->region_en, 'ar' => $request->region_ar];
            $data['address'] = ['en' => $request->address_en, 'ar' => $request->address_ar];
             $data['email'] = "ss@dd.com";
             $data['gender'] = $request->gender;
             $data['lat'] = (float) $request->lat;
             $data['lang'] = (float) $request->lang;
             $data['nationality_id'] = $request->nationality_id;
            //  $data['treatment_id'] = $request->treatment_id;
            //  $data['case_id'] = $request->case_id;
            //  $data['service_id'] = $request->service_id;
            if($request->is_trainer){
             $data['is_trainer'] = 1;
            }
            $data['city_id'] = $request->city_id;
             $data['Phone'] = $request->Phone;
          
        
             $doctor=Doctor::where('id',$request->id)->first();
                           
               
                    $doctor->update($data);
                   
                    $categories = $request->categories;
                    $doctor->category_parent()->attach($categories);
                       
                    $child_categories = $request->child_categories;
                    $doctor->category_child()->attach($child_categories);
                    
        
                  
                
                    $treatments =  $request->treatments;
         
                  $doctor->treatments()->attach($treatments);
        
        
        
                  
                
                  $hospitals = $request->hospitals;
                $doctor->hospitals()->attach($hospitals);
        
        
        
                   
        
                  $cases = $request->cases;
                  $doctor->cases()->attach($cases);
            
                  
                //   // Attach new cases
                
        
                
            
                    $insurances =  $request->insurances;
                  $doctor->insurances()->attach($insurances);
             
                    if ($request->hasFile('image')) {
                        $doctor->addMedia($request->file('image'))->toMediaCollection('Doctor_image');
                    }
                    if ($request->hasFile('upload1')) {
                        $doctor->addMedia($request->file('upload1'))->toMediaCollection('Doctor_upload1');
                    }
                    if ($request->hasFile('upload2')) {
                        $doctor->addMedia($request->file('upload2'))->toMediaCollection('Doctor_upload2');
                    }
                    if ($request->hasFile('upload3')) {
                        $doctor->addMedia($request->file('upload3'))->toMediaCollection('Doctor_upload3');
                    }
                 
                    if($request->services){
                        $selectedServices = $request->input('services');
                        $prices = $request->input('prices');
                        $priceslist=[];
                        foreach ($prices as $price) {
                            if($price!=null){
                                $priceslist[]=$price;
        
                            # code...
                        }}
              
                        $servicesData = [];
                        foreach ($selectedServices as $index => $serviceId) {
                            $price = $priceslist[$index];
                          
                            
                            $servicesData[$serviceId] = ['value' => $price];
                          
                      }
                     $doctor->service()->attach($servicesData);
        
                    }
            
        }else{


        $data['first_name'] = ['en' => $request->first_name_en, 'ar' => $request->first_name_ar];
        $data['last_name'] = ['en' => $request->last_name_en, 'ar' => $request->last_name_ar];
        $data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $data['region'] = ['en' => $request->region_en, 'ar' => $request->region_ar];
        $data['address'] = ['en' => $request->address_en, 'ar' => $request->address_ar];
         $data['email'] = "ss@dd.com";
         $data['gender'] = $request->gender;
         $data['lat'] = (float) $request->lat;
         $data['lang'] = (float) $request->lang;
         $data['nationality_id'] = $request->nationality_id;
        //  $data['treatment_id'] = $request->treatment_id;
        //  $data['case_id'] = $request->case_id;
        //  $data['service_id'] = $request->service_id;
        if($request->is_trainer){
         $data['is_trainer'] = 1;
        }
        $data['city_id'] = $request->city_id;
         $data['Phone'] = $request->Phone;
      

   
                       
           
                $doctor = Doctor::create($data);
               
                $categories = $request->categories;
                $doctor->category_parent()->sync($categories);
                   
                $child_categories = $request->child_categories;
                $doctor->category_child()->sync($child_categories);
                

              
            
                $treatments =  $request->treatments;
     
              $doctor->treatments()->sync($treatments);



              
            
              $hospitals = $request->hospitals;
            $doctor->hospitals()->sync($hospitals);



               

              $cases = $request->cases;
              $doctor->cases()->sync($cases);
        
              
            //   // Attach new cases
            

            
        
                $insurances =  $request->insurances;
              $doctor->insurances()->sync($insurances);
         
                if ($request->hasFile('image')) {
                    $doctor->addMedia($request->file('image'))->toMediaCollection('Doctor_image');
                }
                if ($request->hasFile('upload1')) {
                    $doctor->addMedia($request->file('upload1'))->toMediaCollection('Doctor_upload1');
                }
                if ($request->hasFile('upload2')) {
                    $doctor->addMedia($request->file('upload2'))->toMediaCollection('Doctor_upload2');
                }
                if ($request->hasFile('upload3')) {
                    $doctor->addMedia($request->file('upload3'))->toMediaCollection('Doctor_upload3');
                }

                if($request->services){
                    $selectedServices = $request->input('services');
                    $prices = $request->input('prices');
                    $priceslist=[];
                    foreach ($prices as $price) {
                        if($price!=null){
                            $priceslist[]=$price;

                        # code...
                    }}

                    // Sync services to the doctor with prices
                    $servicesData = [];
                    foreach ($selectedServices as $index => $serviceId) {
                        $price = $priceslist[$index];

                        
                        $servicesData[$serviceId] = ['value' => $price];

                }
                $doctor->service()->sync($servicesData);

            }
        }
                // $url='http://localhost:8000/en/admin/doctors/index';
                // return redirect($url);
                return response()->json(["message"=>"success"
      
            ]);

        
                
     
    }

    /**
     * Display the specified resource.
     */
    public function showdoctor($id)
    {
       // dd($id);

     $doctors=Doctor::with('media')->where('id',$id)->get();
             $doctors->transform(function ($doctor) {
            $doctor->setRelation('image', $doctor->media->where('collection_name', 'doctor_image')->first());
            $doctor->unsetRelation('media');
            return $doctor;
        });
        return response()->json(["doctor"=>$doctors[0]]);


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
