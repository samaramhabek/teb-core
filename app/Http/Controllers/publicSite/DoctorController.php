<?php

namespace App\Http\Controllers\publicSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Country;
use App\Models\City;
use App\Models\Cases;
use App\Models\Nationality;
use App\Models\Category;
use App\Models\Treatment;
use App\Models\Insurance;
use App\Models\Area;
use App\Models\Hospital;
use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class DoctorController extends Controller
{
  public function create(){
    $cases=Cases::get();
    $data = [];

    if (!empty($cases)) {
      

        foreach ($cases as $case) {
            $nestedData['id'] = $case->id;
        
            $nestedData['name'] = $case->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
            $nestedData['category'] = $case->category_parent ? $case->category_parent->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
            $nestedData['sub_category'] = $case->category_child ? $case->category_child->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
            $nestedData['created_at'] = $case->created_at->format('M Y');
            $data[] = $nestedData;
        }
    }
    $nationalities=Nationality::get();
    $data1 = [];

    if (!empty($nationalities)) {
        

        foreach ($nationalities as $nationaly) {
            $nestedData['id'] = $nationaly->id;

            $nestedData['name'] = $nationaly->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['created_at'] = $nationaly->created_at->format('M Y');
            $data1[] = $nestedData;
        }
    }

    $categories=Category::get();
    $data2 = [];

    if (!empty($categories)) {
        // providing a dummy id instead of database ids
       
        foreach ($categories as $category) {
            $nestedData['id'] = $category->id;
         
            $nestedData['name'] = $category->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['slug'] = $category->slug;
            //   $nestedData['image'] = asset('storage/'.$category->image);
            $nestedData['created_at'] = $category->created_at->format('M Y');

            $data2[] = $nestedData;
        }
    }

    $treatments=Treatment::get();
    $data3 = [];

    if (!empty($treatments)) {
       
        foreach ($treatments as $treatment) {
            $nestedData['id'] = $treatment->id;
        
            $nestedData['name'] = $treatment->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
            $nestedData['category'] = $treatment->category_parent ? $treatment->category_parent->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
            $nestedData['sub_category'] = $treatment->category_child ? $treatment->category_child->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
            // $nestedData['created_at'] = $treatment->created_at->format('M Y');
            $data3[] = $nestedData;
        }
    }
    $insurances=Insurance::get();
    $data4 = [];

    if (!empty($insurances)) {
       
        foreach ($insurances as $insurance) {
            $nestedData['id'] = $insurance->id;
        
            $nestedData['name'] = $insurance->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['created_at'] = $insurance->created_at->format('M Y');
            $data4[] = $nestedData;
        }
    }
    $areas=Area::get();
    $data5 = [];

    if (!empty($areas)) {
       

        foreach ($areas as $area) {
            $nestedData['id'] = $area->id;
           
            $nestedData['name'] = $area->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
            $nestedData['slug'] = $area->slug;
            $nestedData['city'] = $area->city ? $area->city->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
            $nestedData['created_at'] = $area->created_at->format('M Y');
            $data5[] = $nestedData;
        }
    }
    $cities=City::get();
    $data6 = [];

    if (!empty($cities)) {
       

        foreach ($cities as $city) {
            $nestedData['id'] = $city->id;
          
            $nestedData['name'] = $city->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
            $nestedData['slug'] = $city->slug;
            $nestedData['country'] = $city->country ? $city->country->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
            $nestedData['created_at'] = $city->created_at->format('M Y');
            $data6[] = $nestedData;
        }
    }
    $child_categories = Category::whereNotNull('parent_id')->get();
    $data = [];

    if (!empty($child_categories)) {
      

        foreach ($child_categories as $category) {
            $nestedData['id'] = $category->id;
          
            $nestedData['name'] = $category->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
            $nestedData['slug'] = $category->slug;
            $nestedData['main_category'] = $category->parent ? $category->parent->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
            $nestedData['created_at'] = $category->created_at->format('M Y');
            $data[] = $nestedData;
        }
    }

    $hospitals=Hospital::get();
    
    $data7 = [];
    
    if (!empty($hospitals)) {
       

        foreach ($hospitals as $hospital) {
            $nestedData['id'] = $hospital->id;
         
            $nestedData['name'] = $hospital->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['waittime'] = $hospital->waittime;
            $nestedData['price'] = $hospital->price;
            $nestedData['address'] = $hospital->address;
            $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
            $nestedData['service'] = $hospital->service ? $hospital->service->getTranslation('name', app()->getLocale(Config::get('app.locale'))) : '';
          
            $nestedData['created_at'] = $hospital->created_at->format('M Y');
            $data7[] = $nestedData;
        }
    }
    $services=Service::get();
    $services[]= null;
$data8[]='';
    if (!empty($services)) {
        // providing a dummy id instead of database ids
     

        foreach ($services as $service) {
            if($service!=null){
            $nestedData['id'] = $service->id;
           
            $nestedData['name'] = $service->getTranslation('name', app()->getLocale(Config::get('app.locale')));
            $nestedData['created_at'] = $service->created_at->format('M Y');

            $data8[] = $nestedData;
        }
    }
    }
    $responseData = [
        'cases' => $data,
        'nationalities' => $data1,
        'categories' => $data2,
        'treatments' => $data3,
        'insurances' => $data4,
        'areas' => $data5,
        'cities' => $data6,
        'hospitals' => $data7,
        'services' => $data8,
    ];

    return response()->json($responseData);
  }
    public function search(Request $request){
       
        $treatments=$request->treatments;
        $categories=$request->categories;
        $Child_categories=$request->Child_categories;
        $areas=$request->areas;
        $insurances=$request->insurances;
        $services=$request->services;
        if(!$services){
            $services=2;
        }
        $name=$request->name;
        $hospitals=$request->hospitals;
        $gender=$request->gender;
        $min_price=$request->min_price;
        $max_price=$request->max_price;
        
        $country=Country::where('country_key',$request->key)->first();
        if (!$country) {
            // Handle the case where the country does not exist.
            // For example, you can set a default country_id or return an error message.
            $country_id = 1; // Setting a default value for now, you can adjust as needed.
        } else {
            $country_id = $country->id;
        }
        log::info($country_id);
        $city_id=City::where('country_id',$country_id)->first()->id;
 //$city_id=$request->city_id;
 log::info($city_id);
        $query = Doctor::with('service', 'insurances', 'treatments','hospitals')
        ->when($treatments, function ($query, $treatments)
        {$query->whereHas('treatments', function ($q) use ($treatments) {
            $q->where('treatment_id', $treatments);});})
        ->when($categories, function ($query, $categories)
        {$query->whereHas('category_parent', function ($q) use ($categories) {
            $q->where('category_id', $categories);});})
        ->when($Child_categories, function ($query, $Child_categories)
        {$query->whereHas('category_child', function ($q) use ($Child_categories) {
            $q->where('child_category_id', $Child_categories);});})
        ->when($areas, function ($query, $areas)
        {$query->where('area_id', $areas);})
        ->when($insurances, function ($query, $insurances)
        {$query->whereHas('insurances', function ($q) use ($insurances) {
            $q->where('insurance_id', $insurances);});})
        ->when($services, function ($query, $services)
        {$query->whereHas('service', function ($q) use ($services) {
            $q->where('service_id', $services);});})
        ->when($name, function ($query, $name)
        {$query->where(function ($q) use ($name) {
            $q->where('first_name', 'like', '%' . $name . '%')
                ->orWhere('last_name', 'like', '%' . $name . '%');});})
        ->when($hospitals, function ($query, $hospitals)
        {$query->whereHas('hospitals', function ($q) use ($hospitals) {
            $q->where('hospital_id', $hospitals);});})
        ->when($gender, function ($query, $gender)
        {$query->where(function ($q) use ($gender) {
                $q->where('gender', 'like', '%' . $gender . '%');});})


                ->when($city_id, function ($query, $city_id)
                {$query->where(function ($q) use ($city_id) {
                        $q->where('city_id', $city_id);});})

                ->when($min_price, function ($query, $min_price)
        {$query->where(function ($q) use ($min_price) {
           $q->whereHas('service', function ($q) use ($min_price) {
            $q->where('value', '>=', $min_price);});});})
        ->when($max_price, function ($query, $max_price)
        {$query->where(function ($q) use ($max_price) {
           $q->whereHas('service', function ($q) use ($max_price) {
            $q->where('value', '<=', $max_price);});});});





            //$query = Doctor::with('service', 'insurances', 'treatments');
            
        //dd($query);
            // Filter by country (assuming you have a column named 'country_id' in Doctor model)
            // if ($request->has('country')) {
            //     $query->where('country_id', $request->input('country'));
            // }
            // Filter by treatments
        // if ($request->has('treatments')) {
        //     $query->whereHas('treatments', function ($q) use ($request) {
        //         $q->where('treatment_id', $request->input('treatments'));
        //     });
            
        // }
        return $query->get();
        // if ($request->has('categories')) {
            // $query->whereHas('category_parent', function ($q) use ($request) {
            //     $q->where('category_id', $request->input('categories'));
            // });
            // if ($request->has('Child_categories')) {
                // $query->whereHas('category_child', function ($q) use ($request) {
                //     $q->where('child_category_id', $request->input('Child_categories'));
                // });
            // }
        // }
        
            // Filter by areas
        // if ($request->has('Areas')) {
        //     $query->where('area_id', $request->input('Areas'));
        // }
        
            // Filter by insurances
        // if ($request->has('insurances')) {
        //     $query->whereHas('insurances', function ($q) use ($request) {
        //         $q->where('insurance_id', $request->input('insurances'));
        //     });
        // }
        
            // Filter by services
        // if ($request->has('services')) {
        //     $query->whereHas('service', function ($q) use ($request) {
        //         $q->where('service_id', $request->input('services'));
        //     });
        // }
        
            // Filter by name (assuming you're looking for a match in the 'first_name' or 'last_name' fields)
        // if ($request->has('name')) {
        //     $name = $request->input('name');
        //     $query->where(function ($q) use ($name) {
        //         $q->where('first_name', 'like', '%' . $name . '%')
        //             ->orWhere('last_name', 'like', '%' . $name . '%');
        //     });
        // }         
        // if ($request->has('hospitals')) {
        //     $query->whereHas('hospitals', function ($q) use ($request) {
        //         $q->where('hospital_id', $request->input('hospitals'));
        //     });
        // }
        // if ($request->has('gender')) {
        //     $gender = $request->input('gender');
        //     $query->where(function ($q) use ($gender) {
        //         $q->where('gender', $gender);
        //     });
        // }
        // if ($request->has('min_price') || $request->has('max_price')) {
        //     $query->whereHas('service', function ($q) use ($request) {
        //             // Check for minimum price
        //         if ($request->has('min_price')) {
        //             $q->where('value', '<', $request->input('min_price'));
        //         }
            
        //             // Check for range between min and max prices
        //         if ($request->has('min_price') && $request->has('max_price')) {
        //             $q->whereBetween('value', [$request->input('min_price'), $request->input('max_price')]);
        //         }
            
        //             // Check for maximum price
        //         if ($request->has('max_price')) {
        //             $q->orWhere('value', '>', $request->input('max_price'));
        //         }
        //     });
        // }       
            // Fetch the doctors based on the constructed query
            try {
                $data = [];
                
                $doctors = $query->get();
        //dd($doctors->first()->service, $doctors->first()->insurances);
        
            //  dd($doctors);
        
                foreach ($doctors as $doctor) {
                    if ($doctor) { // Check if $doctor is not null
                        $doc = []; // Initialize $doc as an empty array for each iteration
                    $doc['id'] = $doctor->id ?? null; 
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
         $data['is_trainer'] =$request->is_trainer;
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
    public function singleDoctor(Request $request){
       $name= $request->name;
      $doctor=  Doctor::with('service', 'insurances', 'treatments','hospitals','cases','category_parent','category_child','area','city')
        ->where('first_name', 'like', '%' . $name . '%')->first();
        if ($doctor) { // Check if $doctor is not null
            $doc = []; // Initialize $doc as an empty array for each iteration
        $doc['id'] = $doctor->id ?? null; 
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
    log::info($data);
        return response()->json(["message"=>"success","doctor"=>$data]);    
    }
        
}
