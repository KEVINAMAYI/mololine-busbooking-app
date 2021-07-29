<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminUsersController extends Controller
{
    //fetch all users
    public function getUsers()
    {
        $users = User::all();
        return view('admin.users.list_users')->with('users',$users);
    }

    //show user creationForm
    public function showUserCreationForm()
    {
        return view('admin.users.create_user');
    }

    //create user
    public function storeUser(Request $request)
    {   

        //validate user details
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'phonenumber' => 'required|regex:(^07)|digits:10',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255'
        ]);

        //fetch data
        $data = $request->all();

        //create a new image using current timestamp username and file extension
        $newImageName =time() . '-' . str_replace(' ','',$data['name']) . '.'. $request->image->extension();
        
        //move image to the user_image folder in public directory
        $request->image->move(public_path('user_images'),$newImageName);


        //store image to database
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'avatar_name' => $newImageName,
            'phonenumber' => $data['phonenumber'],
        ]);

        session()->flash('success','User created successfully');
        return redirect('/admin/users');   
    }


    //show edit user form
    public function showUserEditForm(User $user)
    {
        return view('admin.users.edit_user')->with('user',$user);
    }


    //edit user data
    public function editUser(User $user,Request $request)
    {         
       

        //validate user details
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'phonenumber' => 'required|regex:(^07)|digits:10',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255'
        ]);

        //get the form data
        $data = $request->all();

        //create a new image using current timestamp username and file extension
        $newImageName =time() . '-' . str_replace(' ','',$data['name']) . '.'. $request->image->extension();
        
        //move image to the user_image folder in public directory
        $request->image->move(public_path('user_images'),$newImageName);


        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->avatar_name = $newImageName;
        $user->phonenumber = $data['phonenumber'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role'];
        $user->save();

        session()->flash('success','User Edited successfully');
        return redirect('/admin/users');


    }

    //delete users
    public function deleteUser(User $user)
    {
        $user->delete();

        session()->flash('success','User Deleted successfully');
        return redirect('/admin/users');
    }
}
