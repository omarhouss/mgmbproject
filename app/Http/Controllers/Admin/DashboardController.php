<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function registred()
    {
        $user = User::all();
        $totalusers = User::count();
        return view('admin.register')->with('users',$user);
        return view('admin.totalusers')->with('users',$user);

    }
    public function registrededit(Request $request ,$id)
    {
        $user = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$user);
    }
    public function registredupdate(Request $request ,$id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->email = $request->input('email');
        $users->update();
        return redirect('/roleregiter')->with('status','user is modified');
    }
    public function registreddel($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/roleregiter')->with('status','user is delated');

    }
    public function state()
    {
        $totalusers = User::count();
        return view('admin.dashboard')->with('users',$totalusers);
    }

    public function useradd(Request $request)
    {
        $users = new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->usertype = $request->input('usertype');

        $users->save();
        return redirect('/roleregiter')->with('success','task aded');
    }
}
