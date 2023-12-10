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

class DoctorController extends Controller
{
    public function create(){
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
        return view('doctorbackend.form',['areas'=>$areas,'cases'=>$cases,'nationalities'=>$nationalities,'categories'=>$categories,
        'services'=>$services, 'child_categories'=>$child_categories,  'hospitals'=>$Hospitals, 'treatments'=>$treatments,'insurances'=>$insurances,'cities'=>$cities]);
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

}
