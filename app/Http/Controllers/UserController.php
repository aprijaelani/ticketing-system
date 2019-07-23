<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ServicePoint;
use App\AdminService;

class UserController extends Controller
{
    public function index(ServicePoint $servicepoint)
    {
    	$data_user = Auth::user();

    	$users = User::all();
        return view('data_master.user.list_user',compact('data_user','users','servicepoint'));
    }

    public function edit(User $user)
    {
    	$service_points = ServicePoint::all();
    	$data_user = Auth::user();
    	return view('data_master.user.edit_user',compact('user','data_user','service_points'));
    }

    public function update ($id)
    {
    	User::where('id',$id)->update([
    		'name'				=>request('name'),
    		'email'				=>request('email'),
    		'telepon'			=>request('telepon'),
            'password' => bcrypt(request('password')),
    		'service_point_id'	=>request('service_point_id'),
    		'level'				=>request('level')
    		]);
    	flash()->overlay('Data User Berhasil Diperbarui');
        return redirect("/user");	
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect("/user");
    }
}
