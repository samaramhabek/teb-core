<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Support\Facades\Config;

class HospitalController extends Controller
{
    public function index()
    {
       
        return view('backend.hospitals.index');
    }
    public function hospitals_api(Request $request){
        {

            $columns = [
                1 => 'id',
                2 => 'name',
             
                5 => 'created_at',
            ];
    
            $search = $request->input('search.value');
            $categoryId = $request->input('category_id');
    
    
    
            $totalData = Hospital::count();
    
            $query = Hospital::
                orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));
    
            if (!empty($search)) {
                $query->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%{$search}%")
                        ->orWhere('name->ar', 'LIKE', "%{$search}%")
                        ->orWhere('name->en', 'LIKE', "%{$search}%");
                      
                });
            }
    
            $totalFiltered = $query->count();
            $limit = $request->input('length');
            $start = $request->input('start');
            $hospitals = $query->skip($start)->take($limit)->get();
    
            $data = [];
    
            if (!empty($hospitals)) {
                $ids = $start;
    
                foreach ($hospitals as $hospital) {
                    $nestedData['id'] = $hospital->id;
                    $nestedData['fake_id'] = ++$ids;
                    $nestedData['name'] = $hospital->getTranslation('name', app()->getLocale(Config::get('app.locale')));
                    $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
                  
                    $nestedData['created_at'] = $hospital->created_at->format('M Y');
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
    }

    public function store(Request $request)
    {   
        //dd($request->all());
        $hospitalId = $request->id;

        $request->validate([
            'name_ar' => 'required|unique:cases,name->ar,'. $hospitalId,
            'name_en' => 'required|unique:cases,name->en,'. $hospitalId,
           
           
        ]);

        $data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
       
        if ($hospitalId) {
            // update the value
            $hospital = Hospital::whereId($hospitalId)->firstOrFail();
            $hospital->update($data);

            // user updated
            return response()->json(__('cp.update'));
        } else {
            // create new one if email is unique
            $hospital = Hospital::where('id', $request->id)->first();

            if (empty($hospital)) {
                $hospital = Hospital::create($data);

                // category created
                return response()->json(__('cp.create'));
            } else {
                // category already exist
                return response()->json(['message' => "already exits"], 422);
            }
        }
    }
public function edit($id){
    $hospital = Hospital::where('id', $id)->first();

    return response()->json($hospital);
}

public function destroy( $id)
{
    Hospital::where('id',$id)->delete();
    return 'Hospital deleted';
}

}
