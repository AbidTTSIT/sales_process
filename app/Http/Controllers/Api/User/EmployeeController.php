<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function employees()
    {
        $employees = Employee::all();
        return response()->json([
            'status' => true,
            'data' => $employees
        ], 200);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
           'name' => 'required|string',
           'mobile' => 'required|digits:10'
        ]);

        if($validate->fails())
        {
              return response()->json($validate->errors(), 400);
        }

        $employee = Employee::create([
            'name' => $request->name,
            'mobile' => $request->mobile
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Employee Added Successfully.',
            'employee' => $employee
        ], 200);
    }
}
