<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

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

    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'message' => 'Student fetched successfully',
                'data' => $student
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Students Not Found',
            ]);
        }
    }

    public function delete($id)
    {
        $student = Student::find($id);
        try {
            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Student deleted succesfully',
                'data' => [],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong',
                'error' => $th,
            ], 200);
        }
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
                'error' => $validator->errors()->all(),
            ], 400);
        }
        $data = Student::create($validator->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Student created succesfully',
            'data' => $data,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string|numeric',
            'course' => 'required|string|max:30'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ], 400);
        }

        $stude = Student::find($id);
        if ($stude) {
            $studentUpdated = $stude->update($validator->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Student updated succesfully',
                'data' => $studentUpdated,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Student Not Found',
            ]);
        }
    }
}
