<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Post; 
use App\Models\Tag; 
use App\Models\Category; 

class CategoryController extends Controller
{
    //

    public function __invoke($slug){
        // Get general information about the website. 

        $website = General::query()->firstOrFail();

        // Get request category. 

        $category = Category::query()
        ->where('slug', $slug)
        ->firstOrFail();

        // Get posts in that category.

        $posts = $category->posts()
        ->where('is_published', true)
        ->orderBy('id', 'desc')
        ->get();

        // Get all the categories.

        $categories = Category::all();

        // Get all the tags. 

        $tags = Tag::all();

        // Get 5 most recent posts. 

        $recent_posts = Post::query()
        ->where('is_published', true)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        // Return data to corresponding view.

        return view ('category', [
            'website'=>$website,
            'category'=>$category, 
            'posts'=>$posts, 
            'categories'=>$categories, 
            'tags'=>$tags, 
            'recent_posts'=>$recent_posts
        ]);
    }
}
