<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts=Post::where('state',0)->paginate(10);
        return view('admin.posts.index', compact('posts'));

    }




    public function accept($id)
    {
       $posts=Post::where('id',$id)->first();
       $posts->state=2;
       $posts->update();
      
        return back()->with('status','Post Accepted Sccessfully');
        
    }



    public function reject($id)
    {

        $posts=Post::where('id',$id)->first();
        $posts->state=1;
        $posts->update();
       
         return back()->with('status','Post Rejected Sccessfully');

    }
}
