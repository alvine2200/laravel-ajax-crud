<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function create(Request $request)
    {
        $valid = $request->validate([
            'name' => 'string',
            'email' => 'string|email|unique',
            'phone' => 'string|numeric',
            'course' => 'string|max:30'
        ]);
        Student::create($valid);
        return back()->with('success', 'New Student added successfullly');
    }
}
