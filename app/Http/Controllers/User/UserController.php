<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
   
    public function profile($id)
    {
        $users=User::where('id',$id)->first();
        return view('user.profile' , compact(['users']));
    }

    public function valid(Request $request,$id)
    {



        $users=User::where('id',$id)->first();

        if($request->hasFile('image'))
        {


            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('assets/uploads/user',$filename);
            $users->image=$filename;
        }

        $users->full_name=$request->input('full_name');
       
        $users->update();







        return back()->with('status','Profile Updated Sccessfully');
}


}
