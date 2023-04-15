<?php

namespace App\Http\Controllers\Admin\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MembersController extends Controller
{
    public function index()
    {
        
        $users=User::paginate(10);
        return view('admin.members.index', compact('users'));
    }

    public function edit(Request $request, $id)
    {
        
        $users=User::where('id',$id)->first();

        $users->role=$request->input('role')== TRUE?'1':'0';
        $users->update();

        return back()->with('status','Member Updated Sccessfully');
    }

    public function delete($id)
    {
        
        $users=User::where('id',$id)->first();

        
        $users->delete();

        return back()->with('status','Member Deleted Sccessfully');
    }
}
