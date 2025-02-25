<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Make sure you have this model

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login'); // Ensure the correct path
    }

    public function admin_auth_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember'); // Check if remember is checked

        // Attempt login using the 'admin' guard
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $admin = Auth::guard('admin')->user(); 

            if ($admin->role == 1) {
            return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            } else {
                Auth::guard('admin')->logout(); // Logout unauthorized user
                return redirect()->back()->with('error', 'Unauthorized access.'); 
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}

