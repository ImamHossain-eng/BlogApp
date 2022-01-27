<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        // $blogs = Blog::orderBy('id', 'desc')->get();
        // $blogs = Blog::orderBy('id', 'asc')->take(1)->get();
        //$blog = Blog::where('id', 2)->get();
        //$blog = Blog::find(2); or $blog = Blog::where('id', 2)->first();
        //return $blogs;
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
            'title' => 'required|min:10|max:191',
            'body' => 'required|max:191'
        ]);

        //option 1
        Blog::create($request->all());

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
        
        return redirect()->route('blog.index')->with('success', 'Successfully Created');
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
        //
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
        $blog = Blog::find($id);

        $blog->delete();

        return redirect()->route('blog.index')->with('error', 'Successfully Removed');
    }
}
