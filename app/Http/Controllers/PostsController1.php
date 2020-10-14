<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use Redirect;
use Session;

class PostsController1 extends Controller
{

    public function __construct()
    {
       //session is not working inside construct
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*if you want to use direct SQL*/
       // $posts = DB::select('SELECT * FROM posts');

       /*Eloquent*/
       //return Post::all();
       // $posts = Post::all();
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(empty(Session::get('id')) ){
            return redirect('/users'); 
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.date('YmdHis').'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = session('id');
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Post::where('title', 'Post Two')->get();
        $post =  Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(empty(Session::get('id')) ){
            return redirect('/users'); 
        }

        $post =  Post::find($id);

        //check for correct user
        if( Session::get('id') !== $post->user_id ){
            return redirect('/posts')->with('error', 'Unauthorized');
        }

        return view('posts.edit')->with('post',$post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //custom functions
    public function update_custom(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.date('YmdHis').'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }

        //Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    public function delete_custom($id)
    {
        if(empty(Session::get('id')) ){
            return redirect('/users'); 
        }

        $post = Post::find($id);

        //check for correct user
        if( Session::get('id') !== $post->user_id ){
            return redirect('/posts')->with('error', 'Unauthorized');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('/public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
    
}
