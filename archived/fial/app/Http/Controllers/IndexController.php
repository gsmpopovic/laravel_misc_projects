<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Post; 
use App\Models\Tag; 
use App\Models\Category; 


class IndexController extends Controller
{

    public function __invoke(){
        // Get general information about the website.

        $website = General::query()->firstOrFail();

        // Get posts that are published--display in desc order. 

        $posts = Post::query()
        ->where('is_published', true)
        ->orderBy('id', 'desc')
        ->get();

        $featured_posts = Post::query()
        ->where('is_published', true)
        ->where('is_featured', true)
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

        $categories = Category::all();

        $tags = Tag::all();

        $recent_posts = Post::query()
        ->where('is_published', true)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        // Return data to corresponding view
        return view('home', [
            'website'=>$website, 
            'posts'=>$posts,
            'featured_posts'=>$featured_posts,
            'categories'=>$categories,
            'tags'=>$tags, 
            'recent_posts'=>$recent_posts
        ]
    );


    }
}
