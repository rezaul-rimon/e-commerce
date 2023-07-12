<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
     // show Users
     public function showUsers(){
         
         $users =  User::all();
 
         return view('backend.users', compact('users'));
       }

    //Delete product
    public function destroy($id){
    $users = User::find($id);
    $users->delete();
    return back()->with("message", "User Deleted successfully!");
    }

     //Edit product
     public function edit($id){
    $users = User::find($id);
    return view('backend.edit-users',compact('users'));
    }

    //Update product
    public function update(Request $resquest,$id){
    $users = User::find($id);
    $users->name = $resquest->name;
    $users->email = $resquest->email;
    $users->password = $resquest->password;
    $users->update();
    return redirect()->route('showUsers')->with("message", "User Updated successfully!");
    }



}
