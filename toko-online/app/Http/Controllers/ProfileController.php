<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('profile.index', compact('user'));
    }

    public function index_profile()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('profile.update', compact('user'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'password' => 'confirmed',
    	]);

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->nohp = $request->nohp;
    	$user->alamat = $request->alamat;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}

    	$user->update();
    	Alert::success('User Sukses di Update', 'Success');
    	return redirect('profile');
    }
}
