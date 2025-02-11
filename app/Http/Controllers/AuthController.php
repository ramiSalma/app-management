<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student; // Ensure the Student model is imported

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate incoming request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Find the student by email
        $student = Student::where('email', $credentials['email'])->first();

        // Check if student exists and verify the password
        if ($student && Hash::check($credentials['password'], $student->password)) {
            Auth::guard('student')->login($student);
            $request->session()->regenerate();
            return redirect()->route('students.dashboard'); // Change this route as needed
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('auth.login');
    }
}
