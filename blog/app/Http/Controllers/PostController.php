<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and storing all the blog post data in it form the database
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //$posts = Post::all();

        //return a view and pass in the above variable
        return view('posts.index')->with('posts', $posts);
        //or
        //return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
        //or
        //return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        //Validate the data
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'   => 'required|integer',
            'body'          => 'required',
            'featured_image' => 'sometimes|image' 
        )
    );
        

        //Store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if($request->hasFile('featured_image')){

            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = storage_path('app/public/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;
        }


        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully saved!');

        //Redirect to another page
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable.
        $post = Post::find($id);
        $categories = Category::all();


        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;     
        }


        $tags = Tag::all();
       // dd($tags);
        $tags2 = array();
        foreach ($tags as $tag) {
                $tags2[$tag->id] = $tag->name;
        }

        //return the view and passing that variable
        return view('posts.edit')->with('post', $post)->with('categories', $cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    
    public function update(Request $request, $id)
    {
        //Validate the data
//*Inserting the $id at the unique force laravel not to check the slug against its own slug when slug has been ubdated , while checking for unique slug.
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body'  => 'required',
                'featured_image' => 'image'
             ));
        

            $post = Post::find($id);

            if($request->hasFile('featured_image')){
               
                //add the new photo
                $image = $request->file('featured_image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = storage_path('app/public/'.$filename);
                Image::make($image)->resize(600,400)->save($location);

                $oldFileName = $post->image;

                //update the database
                 $post->image = $filename;

                //delete the old photo 
                 Storage::delete($oldFileName);
            }



        //Save the data to the database

         //or  $post->title = $request->title;
        $post->title = $request->input('title');

        $post->slug = $request->input('slug');

        $post->category_id = $request->input('category_id');

       //of $post->body = $request->body;
        $post->body = Purifier::clean($request->input('body'));
        $post->save();

        //Synching with post_tab table
        $post->tags()->sync($request->tags, true);



        //set flash data with success message
        Session::flash('success', 'The blog post was updated successfully saved!');

        //Redirect whth flash data to posts.show
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach(); 
        Storage::delete($post->image); 

        $post->delete();

        Session::flash('success','The post was successfully deleted.');
        return redirect()->route('posts.index');

    }
}
