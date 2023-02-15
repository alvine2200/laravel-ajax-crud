<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(['id', 'name', 'email', 'phone', 'course']);
        return view('students.index', ['students' => $students]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email' => 'string|email|unique:students,email',
            'phone' => 'string|numeric',
            'course' => 'string|max:30'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ], 400);
        }
        $data = Student::create($validator->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Student created succesfully',
            'data' => $data,
        ], 200);
    }
}
