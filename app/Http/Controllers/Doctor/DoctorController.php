<?php

namespace App\Http\Controllers\Doctor;

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
use App\Models\Doctor;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Composer;
use Stevebauman\Location\Facades\Location;

class DoctorController extends Controller
{
    // public function index(Request $request)

    // {

        /* $ip = $request->ip(); Dynamic IP address */

        // $ip = '162.159.24.227'; /* Static IP address */

        // $currentUserInfo = Location::get($ip);

          

        // return view('doctorbackend.form', compact('currentUserInfo'));

    // }
    public function create(){
        // $categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
        // $child_categories = CategoryResource::collection(Category::whereNotNull('parent_id')->latest()->get());
        $ip = '162.159.24.227'; /* Static IP address */
 $ip='212.47.230.124';
//  $ip = request()->ip();
//  dd($ip);
        $currentUserInfo = Location::get($ip);
        $cases=Cases::get();
        $nationalities=Nationality::get();
        $categories=Category::get();
        $treatments=Treatment::get();
        $insurances=Insurance::get();
        $areas=Area::get();
        $cities=City::get();
        $child_categories = Category::whereNotNull('parent_id')->get();
        $Hospitals=Hospital::get();
        $services=Service::get();
        return view('doctorbackend.form'
        ,[
            'currentUserInfo'=>$currentUserInfo,'areas'=>$areas,'cases'=>$cases,'nationalities'=>$nationalities,
        'services'=>$services, 'child_categories'=>$child_categories,  'hospitals'=>$Hospitals, 'treatments'=>$treatments,'insurances'=>$insurances,'cities'=>$cities]
    );
    }
    public function get_sub_categories(Category $category)
    {
       // dd($category);
        $items = CategoryResource::collection($category->children()->latest()->get());
        return response()->json($items);
    }
    public function create_api(){
        // $categories = CategoryResource::collection(Category::whereNull('parent_id')->latest()->get());
        // $child_categories = CategoryResource::collection(Category::whereNotNull('parent_id')->latest()->get());
        $cases=Cases::get();
        $nationalities=Nationality::get();
        $categories=Category::get();
        $treatments=Treatment::get();
        $insurances=Insurance::get();
        $areas=Area::get();
        $cities=City::get();
        $child_categories = Category::whereNotNull('parent_id')->get();
        $Hospitals=Hospital::get();
        $services=Service::get();
        return response()->json(['areas'=>$areas,'cases'=>$cases,'nationalities'=>$nationalities,'categories'=>$categories,
        'services'=>$services, 'child_categories'=>$child_categories,  'hospitals'=>$Hospitals, 'treatments'=>$treatments,'insurances'=>$insurances,'cities'=>$cities,"message"=>"success"]);     
      
    }
    public function store(Request $request)
    {  
      // dd($request->all());
       log::info($request->all());
        $doctorId = $request->id;
        $data['first_name'] = ['en' => $request->first_name_en, 'ar' => $request->first_name_ar];
        $data['last_name'] = ['en' => $request->last_name_en, 'ar' => $request->last_name_ar];
        $data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
        // $data['region'] = ['en' => $request->region_en, 'ar' => $request->region_ar];
        $data['address'] = ['en' => $request->address_en, 'ar' => $request->address_ar];
        $data['email'] = $request->email;
        $data['gender'] = $request->gender;
        $data['lat'] = (float) $request->lat;
        $data['lang'] = (float) $request->lang;
        $data['nationality_id'] = $request->nationality_id;
        // $data['hospital_id'] = $request->hospital_id;
        $data['area_id'] = $request->area_id;
        if($request->is_trainer){
         $data['is_trainer'] = 1;
        }
        $data['city_id'] = $request->city_id;
        $data['Phone'] = $request->Phone; 
        if($doctorId){      
            $doctor=Doctor::where('id',$request->id)->first();
            $doctor->update($data); 
        }else{

        $doctor = Doctor::create($data);
        log::info($doctor);      
        }
        $categories = $request->categories;
        $doctor->category_parent()->sync($categories);        
        $child_categories = $request->child_categories;
        $doctor->category_child()->sync($child_categories);
        $treatments =  $request->treatments;
        $doctor->treatments()->sync($treatments);
        // $hospitals = $request->hospitals;
        // $doctor->hospitals()->sync($hospitals);
        $cases = $request->cases;
        $doctor->cases()->sync($cases);
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
                }}
            $servicesData = [];
            foreach ($selectedServices as $index => $serviceId) {
                $price = $priceslist[$index];
                $servicesData[$serviceId] = ['value' => $price];
                }
                $doctor->service()->sync($servicesData);
        }

        return response()->json(["message"=>"success"]);     
    }
public function singledoctor(){
    return view('doctorbackend.singledoctor');
}
public function index(){
   $treatments= Treatment::get();
   $categories=Category::get();
   $Areas=Area::get();
   $services=Service::get();
   $insurances=Insurance::get();
    return view('doctorbackend.index',['categories'=>$categories,'treatments'=>$treatments,'Areas'=>$Areas,'services'=>$services,'insurances'=>$insurances]);
}
public function search(Request $request){
//dd($request->all());


    // Start with a base query
    $query = Doctor::query()->with('service', 'insurances', 'treatments');
    //$query = Doctor::with('service', 'insurances', 'treatments');
    
//dd($query);
    // Filter by country (assuming you have a column named 'country_id' in Doctor model)
    // if ($request->has('country')) {
    //     $query->where('country_id', $request->input('country'));
    // }

    // Filter by treatments
    if ($request->has('treatments')) {
        $query->whereHas('treatments', function ($q) use ($request) {
            $q->where('treatment_id', $request->input('treatments'));
        });
    }
    if ($request->has('categories')) {
        $query->whereHas('category_parent', function ($q) use ($request) {
            $q->where('category_id', $request->input('categories'));
        });
    }

    // Filter by areas
    if ($request->has('Areas')) {
        $query->where('area_id', $request->input('Areas'));
    }

    // Filter by insurances
    if ($request->has('insurances')) {
        $query->whereHas('insurances', function ($q) use ($request) {
            $q->where('insurance_id', $request->input('insurances'));
        });
    }

    // Filter by services
    if ($request->has('services')) {
        $query->whereHas('service', function ($q) use ($request) {
            $q->where('service_id', $request->input('services'));
        });
    }

    // Filter by name (assuming you're looking for a match in the 'first_name' or 'last_name' fields)
    if ($request->has('name')) {
        $name = $request->input('name');
        $query->where(function ($q) use ($name) {
            $q->where('first_name', 'like', '%' . $name . '%')
              ->orWhere('last_name', 'like', '%' . $name . '%');
        });
    }

    // Fetch the doctors based on the constructed query
    try {
        $data = [];
        
        $doctors = $query->get();
//dd($doctors->first()->service, $doctors->first()->insurances);

    //  dd($doctors);

        foreach ($doctors as $doctor) {
            $doc['id'] = $doctor->id;
            $doc['first_name'] = $doctor->getTranslation('first_name', app()->getLocale());
            $doc['last_name'] = $doctor->getTranslation('last_name', app()->getLocale());
            $doc['title'] = $doctor->getTranslation('title', app()->getLocale());
            $doc['email'] = $doctor->email;
            $doc['gender'] = $doctor->gender;
            $doc['Phone'] = $doctor->Phone;
            $doc['description'] = $doctor->getTranslation('description', app()->getLocale());
            $doc['is_trainer'] = $doctor->is_trainer;
            $doc['area_id'] = $doctor->area ? $doctor->area->getTranslation('name', app()->getLocale()) : '';
            $doc['lat'] = $doctor->lat;
            $doc['lang'] = $doctor->lang;
            $doc['city_id'] = $doctor->city ? $doctor->city->getTranslation('name', app()->getLocale()) : '';
            $data[] = $doc;

        }
        // dd($doctors);
        //return $data;
        return response()->json(['doctors'=>$data]);

       // return $data;
    } catch (\Exception $e) {
        dd($e->getMessage());
    }

   // return view('your_view_name', ['doctors' => $doctors]);
}


}

