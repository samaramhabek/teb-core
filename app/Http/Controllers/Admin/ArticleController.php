<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Config;

class ArticleController extends Controller
{


    public function index(){
        $parent_categories = Category::whereNull('parent_id')->latest()->get();
        $child_categories = Category::whereNotNull('parent_id')->latest()->get();
         // dd($parent_categories);
        return view('backend.article.index',compact(['parent_categories', 'child_categories']));
    }
    public function articles_api(Request $request)
    {
        //dd($request);
        $parent_categories = Category::whereNull('parent_id')->latest()->get();
        $columns = [
            // 1 => 'id',
            // 2 => 'first_name',
            // 3=>'last_name',
            // 4=>'description',
            // 5=>'gender',
            // 6 => 'email',
            // 7 => 'phone',
            // 8=>'is_trainer',
            // 9=>'city_id',
            // 10=>'region',
            // 11=>'title',
            // 12=>'lat',
            // 13=>'lang',
            // 12 => 'created_at',
        ];

        $search = $request->input('search.value');
        $categoryId = $request->input('category_id');



        $totalData = Article::count();

        $query = Article::with('category_parent','category_child');
        // ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));

        // Filter by category if a category ID is provided
        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $totalFiltered = $query->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $articles= $query->skip($start)->take($limit)->get();
       
        $data = [];

        if (!empty($articles)) {
            $ids = $start;
            
            //log::info($articles);
            foreach ($articles as $article) {
              // dd($article->meta_tags);
                $nestedData['id'] = $article->id;
                $nestedData['fake_id'] = ++$ids;
                // $nestedData['lang'] = app()->getLocale(Config::get('app.locale'));
                $nestedData['article_name'] = $article->article_name;
                // $nestedData['published_at'] = $article->published_at->format('Y-m-d H:i:s');
                if ($article->published_at instanceof \Carbon\Carbon) {
                    $nestedData['published_at'] = $article->published_at->format('Y-m-d H:i:s');
                  
                } else {
                    $nestedData['published_at'] = $article->published_at;
                }
                $nestedData['Nameofthewriter'] = $article->Nameofthewriter;
                $nestedData['reviewerofthearticle'] = $article->reviewerofthearticle;
                // $nestedData['meta_tags'] = $article->meta_tags;
                $metaTags = json_decode($article->meta_tags, true);

                // Check if decoding was successful and $metaTags is an array
                if (is_array($metaTags)) {
                    // Extract all 'value' properties from the array of objects
                    $metaValues = array_column($metaTags, 'value');
            
                    // Join the values into a string, separated by a comma or any other delimiter
                    $nestedData['meta_tags'] = implode(' , ', $metaValues);
                } else {
                    $nestedData['meta_tags'] = ''; // Set a default value or handle the case where decoding fails
                }
                $nestedData['description'] = $article->description;
                // $nestedData['meta_description'] = $article->meta_description;
     // Replace newline characters with hyphens in meta_description
     $metaDescriptionModified = str_replace(["\r\n", "\r", "\n"], '   -   ', $article->meta_description);
     $nestedData['meta_description'] = $metaDescriptionModified;
 

                $nestedData['category_id'] = $article->category_parent ? $article->category_parent->getTranslation('name', app()->getLocale()) : '';
                $nestedData['child_category_id'] = $article->category_child ? $article->category_child->getTranslation('name', app()->getLocale()) : '';
            
                $data[] = $nestedData;
            }
        }
//dd($data);
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
    public function create(Request $request){
      
       
        $categories=Category::get();
      
        $child_categories = Category::whereNotNull('parent_id')->get();
       
        $articles[] = null;

        // $lang = app()->getLocale(Config::get('app.locale'));
        if($request->has('id'))
        {
            //dd($request->id);
            $articles=Article::with('media')->whereId($request->id)->get();
          //  dd($articles[0]->published_at);
            $articles->transform(function ($article) {
               // $doctor->setRelation('images', $doctor->media->where('collection_name', 'doctor_images'));
               $article->setRelation('image', $article->media->where('collection_name', 'Article_image')->first());
               $article->unsetRelation('media');
           
               return $article;
           });

        

        }

        return view('backend.article.form',['article'=>$articles[0],'categories'=>$categories,
    'child_categories'=>$child_categories]);
    }




    public function store(Request $request)
    {  
     // dd($request->all());
       // log::info($request->all());
       $validatedData = $request->validate([
        'article_name' => 'required|string',
        'description' => 'required|string',
        'meta_tags' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'category_id' => 'required|integer',
        'child_category_id' => 'nullable|integer',
        'Nameofthewriter' => 'required|string',  // Add the new fields here
        'reviewerofthearticle' => 'required|string',
        'published_at' => 'nullable|date',  // Assuming 'published_at' is a date field
        //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
   
          
        
            $articleId = $request->id;
            if ($articleId) {
                $article = Article::find($articleId);
                $article->update($validatedData);
        
                if ($request->hasFile('image')) {
                    $article->addMedia($request->file('image'))->toMediaCollection('Article_image');
                }
            } else {
                $article = Article::create($validatedData);
        
                if ($request->hasFile('image')) {
                    $article->addMedia($request->file('image'))->toMediaCollection('Article_image');
                }
            }
             // Add the new fields to the articles table
               $article->update([
                  'Nameofthewriter' => $validatedData['Nameofthewriter'],
                  'reviewerofthearticle' => $validatedData['reviewerofthearticle'],
                  'published_at' => $validatedData['published_at'],
                    ]);
        
            return response()->json(["message" => "success"]);
        
        
                
     
        
    }


public function deletearticle($id){
    Article::where('id', $id)->delete();
       
    return 'Article deleted';
}





    }

