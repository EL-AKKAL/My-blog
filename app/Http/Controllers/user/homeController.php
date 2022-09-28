<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class homeController extends Controller
{
    // show the home page for users
    public function index(){

        $posts = Post::where('status',1)->orderBy('created_at','desc')->paginate(7);
        
        return view('user.home')->with('posts',$posts);
    }

    // show a single post for users
    public function post(Post $slug){

        $slug=Post::with('tags','categories')->where('id',$slug->id)->first();
        return view('user.post')->with('slug',$slug);
    } 

    // show posts by tag  using the same view as index
    public function showPostsByTag( Tag $tag )
    {
        $posts = $tag->posts();
        $filters = $tag->slug;
        return view('user.home')->with('posts',$posts)->with('filters',$filters);
    }

    // show posts by tag  using the same view as index
    public function showPostsByCategory( Category $category )
    {
        $posts = $category->posts();
        $filters = $category->slug;
        return view('user.home')->with('posts',$posts)->with('filters',$filters);
    }
}
