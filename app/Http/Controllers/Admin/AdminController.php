<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function showadmin()
    {
        $data['getRecord'] = Admin::getAdmin();
        $data['header_title'] = "Admin";
        return view('admin.list', $data);
    }

    public function addnewadmin()
    {
        $data['header_title'] = "Add New Admin";
        return view('admin.addadmin', $data);
    }

    public function storeadmin(Request $request)
    {

       
        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|required',
            'is_active' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

       

        // Save data to the database
        $admin =   Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
            'is_active' => $request->is_active,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

      // Handle image upload using Spatie MediaLibrary
    if ($request->hasFile('profile_image')) {
        $admin->addMedia($request->file('profile_image'))
            ->toMediaCollection('profile_images');
    }
        return redirect()->route('admin.list')->with('success', 'New admin added successfully!');
    }

    public function editadmin($id)
    {
        $data['header_title'] = "Edit Admin";
        //return view('admin.addadmin', $data);

        $adminId = Crypt::decrypt($id); // Decrypt the ID
        $admin = Admin::findOrFail($adminId);

                
        
        return view('admin.editadmin', compact('admin') , $data);
    }


    public function updateadmin($id , Request $request)
    {

       
        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'is_active' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $admin = Admin::findOrFail($id);

        // Save data to the database
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'updated_at' => now(),
            'password' => $request->filled('password') ? Hash::make($request->password) : $admin->password,
        ]);

        if ($request->hasFile('profile_image')) {
            // Remove the old image (if exists)
            $admin->clearMediaCollection('profile_images');
    
            // Upload and store the new image
            $admin->addMedia($request->file('profile_image'))
                  ->toMediaCollection('profile_images');
        }
    
        return redirect()->route('admin.list')->with('success', 'Admin Updated successfully!');
    }

    public function deleteadmin($id)
    {
        $adminId = Crypt::decrypt($id); // Decrypt the ID

        $admin = Admin::findOrFail($adminId);

        $admin->update([
           
            'is_active' => 0,
            'updated_at' => now(),
            
        ]);

        return redirect()->route('admin.list')->with('success', 'Admin Deleted successfully!');

    }

    public function categorylistall()
    {
        $data['getRecord'] = Admin::getAdmin();
        $data['header_title'] = "Admin";
        return view('admin.categorylist', $data);
    }

}
