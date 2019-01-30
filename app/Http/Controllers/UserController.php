<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
     
     public function createUser(){

        
        return view('admin.user.createUser'); 	
     }


     public function storeUser(Request $request){

     	$this->validate($request,[
         'name' => 'required|string|max:255',
         'address' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6',

    	]);


    	$user=new User();
    	$user->name=$request->name;
    	$user->address=$request->address;
    	$user->email=$request->email;
    	$user->password=bcrypt($request->password);
    	$user->save();


    	return redirect('/user/add')->with('message','User Info Added Successfully!');

     }

     
     public function manageUser(){

     	$users=User::all();
     	return view('admin.user.manageUser',['users'=>$users]);
     
     }


     public function editUser($id){

     	$userById=User::where('id',$id)->first();

     	return view('admin.user.editUser',['userById'=>$userById]);
     }


     public function updateUser(Request $request){

     	$this->validate($request,[
         'name' => 'required|string|max:255',
         'address' => 'required|string|max:255',
    	]);

    	$user=User::find($request->userId);
    	$user->name=$request->name;
    	$user->address=$request->address;
    	//$user->email=$request->email;	
    	$user->save();


    	return redirect('/user/manage')->with('message','User Info Updated Successfully!');	

     }


     public function deleteUser($id){

    	$user=User::find($id);
    	$user->delete();

    	return redirect('/user/manage')->with('message','User Info Deleted Successfully!');
    }
    
}
