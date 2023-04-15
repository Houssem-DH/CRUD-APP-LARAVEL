<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    
     
    public function index()
    {

        
        $posts=Post::where('state',2)->orderBy('created_at', 'DESC')->get();
        return view('home', compact(['posts']));
    }
    public function search()
    {

        
        $search_text=$_GET['query'];
        $posts=Post::where('title','LIKE','%'.$search_text.'%')->get();
        
        return view('search' ,compact(['posts']));
    }
}
