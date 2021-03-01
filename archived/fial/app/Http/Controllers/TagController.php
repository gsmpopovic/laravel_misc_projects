<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Post; 
use App\Models\Tag; 
use App\Models\Category; 

class TagController extends Controller
{
    //

    // Get general information about the website.
    public function __invoke($slug){
        $website = General::query()
        ->where('slug', $slug)
        ->firstOrFail();

        // Get selected tag. 
        $tag = Tag::query()
    ->where('slug', $slug)
    ->firstOrFail();

    // Get posts in that particular tag. 
    $posts = $tag->posts()
    ->where('is_published', true)
    ->orderBy('id', 'desc')
    ->get();

    // Get all categories. 
    $categories = Category::all();

    // Get all tags.
    $tags = Tag::all();

    // Get all recent posts.
    $recent_posts = Post::query()
    ->where('is_published', true)
    ->orderBy('created_at', 'desc')
    ->take(5)
    ->get();

    // Return data along with relevant view. 

    return view('category', [
        'website'=>$website, 
        'tag'=>$tag, 
        'categories'=>$categories,
        'tags'=>$tags, 
        'posts'=>$posts, 
        'recent_posts'=>$recent_posts

    ]);

    }

}
