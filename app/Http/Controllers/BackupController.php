<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BackupController extends Controller
{
    public function trash_all(){
        $blogs = Blog::onlyTrashed()->get();
        return view('blog.trash', compact('blogs'));
    }
    public function blog_restore($id){
        // $blog = Blog::withTrashed()->find($id);
        // $blog->restore();
        Blog::withTrashed()->find($id)->restore();
        return redirect()->route('blog.index')->with('success', 'Restored one blog successfully.');
    }
}
