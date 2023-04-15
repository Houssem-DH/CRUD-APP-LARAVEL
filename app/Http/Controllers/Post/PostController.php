<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function insert(Request $request)
    {


        $request->validate([
            'title' => ['required'],
            'description' => ['required']
            
        ]);

        $post=new Post();
        $post->user_id=Auth::user()->id;
        $post->title=$request->input('title');
        $post->description=$request->input('description');
        $post->save();
      
        return back()->with('status','Post Created Sccessfully');



        
    }

    public function edit($id)
    {


        
      
        $posts=Post::where('id',$id)->first();
        return view('edit-post', compact(['posts']));



        
    }



    public function update(Request $request,$id)
    {


        
      
        $posts=Post::where('id',$id)->first();
        $posts->title=$request->input('title');
        $posts->description=$request->input('description');
        
        $posts->update();
        return back()->with('status','Post Updated Sccessfully');




        
    }

    public function delete($id)
    {


        
      
        $posts=Post::where('id',$id)->first();
        $posts->delete();
        return redirect('/')->with('status','Post Deleted Succesfully');



        
    }

    public function myposts($user_id)
    {


        
      
        $posts=Post::where('user_id',$user_id)->get();
       
        return view('myposts', compact(['posts']));



        
    }


}
