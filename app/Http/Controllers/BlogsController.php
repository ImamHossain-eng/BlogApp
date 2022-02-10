<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use Image;
use File;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $blogs = Blog::latest()->get();
        // $blogs = Blog::orderBy('id', 'desc')->get();
        // $blogs = Blog::orderBy('id', 'asc')->take(1)->get();
        //$blog = Blog::where('id', 2)->get();
        //$blog = Blog::find(2); or $blog = Blog::where('id', 2)->first();
        //return $blogs;
        $blogs = Blog::latest()->paginate(5);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            // 'title' => 'required|min:10|max:191',
            // 'body' => 'required|max:191'
            'title' => ['required', 'min:10', 'max:190'],
            'body' => 'required',
            'type' => 'required'
        ]);

        //Image validation
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(800, 400)->save(public_path('/images/blogs/'.$file_name));
        }
        else{
            $file_name = 'no_image.png';
        }


        if($request->input('type') != 'null'){
            // Initiate a new Object
            $blog = new Blog;
            // Assign Value
            $blog->title = $request->input('title');
            $blog->body = $request->input('body');
            $blog->type = $request->input('type');
            $blog->image = $file_name;
            //Save to DB
            $blog->save();

            return redirect()->route('blog.index')->with('success', 'Successfully Created');           
        }else{
            return back()->withInput()->with('error', 'Please select any type');
        }

        //option 1
        // Blog::create($request->all());
        

        //option 2
        // Blog::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        // ]);

        //option 3
        // //Initiate a new Object
        // $blog = new Blog;
        // //Assign Value
        // // $blog->title = $request->input('title');
        // // $blog->body = $request->input('body');
        
        // $blog->title = $request->title;
        // $blog->body = $request->body;
        // //Save to DB
        // $blog->save();
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit', compact('blog'));
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
        $this->validate($request, [
            'title' => 'required|max:191',
            'body' => 'required'
        ]);

        $blog = Blog::find($id);
        $oldImg = $blog->image;
         //Image validation
         if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(800, 400)->save(public_path('/images/blogs/'.$file_name));
            if($oldImg != 'no_image.png'){
                File::delete(public_path('images/blogs/'.$oldImg));
            }
        }
        else{
            $file_name = $oldImg;
        }

        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->type = $request->input('type');
        $blog->image = $file_name;
        $blog->save();

        return redirect()->route('blog.index')->with('warning', 'Successfully Updated');
        // $oldType = $blog->type;
        // $newType = $request->input('type');

        // if($newType != 'null'){
        //     $type = $newType;
        // }else{
        //     $type = $oldType;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $oldImg = $blog->image;

        if($oldImg != 'no_image.png'){
            File::delete(public_path('images/blogs/'.$oldImg));
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('error', 'Successfully Removed');
    }
}
