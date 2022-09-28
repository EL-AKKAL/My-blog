<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.post.posts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tags=Tag::all();
        $categories = Category::all();
        
        return view('admin.post.create')->with('tags',$tags)
                                        ->with('categories',$categories);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // this var replace the checkbox value
        $status = 0;
        
        $PostTags=[];
        $PostCategories=[];
        
        if ($request->tags != null) {
         
            foreach ($request->tags as $tag) {
                $PostTags[] += $tag;
            }   
        }
        if ($request->categories != null) {
         
            foreach ($request->categories as $category) {
                $PostCategories[] += $category;
            }   
        }
        
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);

        // because status is boolean we check the request input if it's checked we give the status var a value of 1 else 0
        if ($request->status == 'on') {
            $status = 1;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('public');
        }
        $post = new Post();
        $post->title=$request->title;
        $post->subtitle=$request->subtitle;
        $post->slug=$request->slug;
        $post->body=$request->body;
        $post->image=$imagePath;
        $post->status=$status;
        $post->save();
        $post->tags()->sync($PostTags);
        $post->categories()->sync($PostCategories);
        session()->flash('message','A new post has been created successfully');
        return redirect('admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags=Tag::all();
        $categories = Category::all();
        $post=Post::with('tags','categories')->where('id',$post->id)->first();

        return view('admin.post.edit')->with('post',$post)
                                      ->with('tags',$tags)
                                      ->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $PostTags=[];
        $PostCategories=[];
        if ($request->tags != null) {
         
            foreach ($request->tags as $tag) {
                $PostTags[] += $tag;
            }   
        }
        if ($request->categories != null) {
         
            foreach ($request->categories as $category) {
                $PostCategories[] += $category;
            }   
        }
        $status = 0;
        if ($request->status =='on') {
            $status = 1;
        }
        $this->validate($request, [
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('public');
        }
        $post->update([
            'title' =>$request->title,
            'subtitle' =>$request->subtitle,
            'slug' =>$request->slug,
            'body' =>$request->body,
            'image' =>$imagePath,
            'status' =>$status,
        ]);
        $post->tags()->sync($PostTags);
        $post->categories()->sync($PostCategories);
        session()->flash('message','Post Has Been Updated Successfully');
        return redirect('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('message','Post Has Been Deleted Successfully');
        return redirect('admin/post');
    }
}
