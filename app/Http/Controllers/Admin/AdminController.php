<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $counttu = DB::table('users')->count();
        $counttp = DB::table('posts')->count();
        $countpp = DB::table('posts')->where('state',0)->count();
        $countap = DB::table('posts')->where('state',2)->count();
        $countrp = DB::table('posts')->where('state',1)->count();
        return view('admin.dashboard', compact(['counttu','counttp','countpp','countap','countrp']));
    }
}
