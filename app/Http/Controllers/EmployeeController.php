<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employee,email',
            'country_code' => 'required',
            'mobile_number' => 'required|numeric',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'hobby' => 'array',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $emp = new Employee();
        $emp->first_name = $request->first_name;
        $emp->last_name = $request->last_name;
        $emp->email = $request->email;
        $emp->country_code = $request->country_code;
        $emp->mobile_number = $request->mobile_number;
        $emp->address = $request->address;
        $emp->gender = $request->gender;
        $emp->hobby =  $request->has('hobby') ? json_encode($request->hobby) : null;
        
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imgName = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imgName);
            $emp->photo = $imgName;
        }
        $emp->save();

        return redirect()->route('employee.index')->with('succeess', 'Employee Created Successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit',compact('employee'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employee,email,'. $id,
            'country_code' => 'required',
            'mobile_number' => 'required|numeric',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'hobby' => 'array',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $emp = Employee::findOrFail($id);
        $emp->first_name = $request->first_name;
        $emp->last_name = $request->last_name;
        $emp->email = $request->email;
        $emp->country_code = $request->country_code;
        $emp->mobile_number = $request->mobile_number;
        $emp->address = $request->address;
        $emp->gender = $request->gender;
        $emp->hobby =  $request->has('hobby') ? json_encode($request->hobby) : null;
        
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imgName = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imgName);
            $emp->photo = $imgName;
        }
        $emp->save();

        return redirect()->route('employee.index')->with('succeess', 'Employee Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee Deleted successfully.');
    }
}
