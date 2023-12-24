<?php

namespace App\Http\Controllers\PublicSite;

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
use App\Models\Article;
use App\Http\Resources\CategoryResource;
use Stevebauman\Location\Facades\Location;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::get();

        $data = [];

        if (!empty($articles)) {
            foreach ($articles as $article) {
                    $nestedData['id'] = $article->id;
                    $nestedData['article_name'] = $article->article_name;
                    if ($article->published_at instanceof \Carbon\Carbon) {
                        $nestedData['published_at'] = $article->published_at->format('Y-m-d H:i:s');
                    
                    } else {
                        $nestedData['published_at'] = $article->published_at;
                    }
                    $nestedData['Nameofthewriter'] = $article->Nameofthewriter;
                    $nestedData['reviewerofthearticle'] = $article->reviewerofthearticle;
                    $metaTags = json_decode($article->meta_tags, true);
                    if (is_array($metaTags)) {
                      // Extract all 'value' properties from the array of objects
                        $metaValues = array_column($metaTags, 'value');
                      // Join the values into a string, separated by a comma or any other delimiter
                        $nestedData['meta_tags'] = implode(' , ', $metaValues);
                    } else {
                      $nestedData['meta_tags'] = ''; // Set a default value or handle the case where decoding fails
                    }
                    $nestedData['description'] = $article->description;
                    $metaDescriptionModified = str_replace(["\r\n", "\r", "\n"], '   -   ', $article->meta_description);
                    $nestedData['meta_description'] = $metaDescriptionModified;
                    $nestedData['category_id'] = $article->category_parent ? $article->category_parent->getTranslation('name', app()->getLocale()) : '';
                    $nestedData['child_category_id'] = $article->category_child ? $article->category_child->getTranslation('name', app()->getLocale()) : '';
                    $data[] = $nestedData;
            }
        }
        // if ($data) {
            return response()->json([
                'code' => 200,
                'articles' => $data,
            ]);
        // } else {
        //     return response()->json([
        //         'message' => 'Internal Server Error',
        //         'code' => 500,
        //         'data' => [],
        //     ]);
        // }
    }
}

