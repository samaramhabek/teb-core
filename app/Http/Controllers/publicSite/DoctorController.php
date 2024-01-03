<?php

namespace App\Http\Controllers\publicSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
  
    public function search(Request $request){
        $treatments=$request->treatments;
        $categories=$request->categories;
        $Child_categories=$request->Child_categories;
        $areas=$request->areas;
        $insurances=$request->insurances;
        $services=$request->services;
        $name=$request->name;
        $hospitals=$request->hospitals;
        $gender=$request->gender;
        $min_price=$request->min_price;
        $max_price=$request->max_price;

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
        {$query->whereHas('services', function ($q) use ($services) {
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