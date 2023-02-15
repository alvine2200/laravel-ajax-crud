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
        return view('students.index');
    }

    public function fetch()
    {
        $students = Student::all(['id', 'name', 'email', 'phone', 'course']);
        return response()->json([
            'status' => 200,
            'message' => 'Students fetched successfully',
            'data' => $students
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:students,email',
            'phone' => 'required|string|numeric',
            'course' => 'required|string|max:30'
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
