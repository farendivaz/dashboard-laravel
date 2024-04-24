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

        $employees = Employee::all();
        return view('employee.index', compact('employees'));
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

        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email|unique:employees,email',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
        ]);

        // Check if the email already exists
        $existingEmployee = employee::where('email', $request->email)->first();
        if ($existingEmployee) {
            // Email already exists, return warning message
            return back()->withInput()->with('warning', 'Email already exists. Please choose a different email.');
        }

        // Email doesn't exist, proceed with storing the employee data
        Employee::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'notelp' => $request->notelp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        return redirect()
        ->route('employee.index')
        ->with('success', 'Successfully add employee');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // $employees = Employee::all();

        return view('employee.edit', ['employee' => $employee]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
    // Validate the incoming request data
    $request->validate([
        'nama' => 'required',
        'notelp' => 'required',
        'alamat' => 'required',
        'tanggal_lahir' => 'required',
    ]);

    // Check if the email already exists
    $existingEmployee = Employee::where('email', $request->email)->first();
    if ($existingEmployee && $existingEmployee->id !== $employee->id) {
        // Email already exists for a different employee, return warning message
        return back()->withInput()->with('warning', 'Email already exists. Please choose a different email.');
    }

    Employee::where('id', $employee->id)->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'notelp' => $request->notelp,
        'tanggal_lahir' => $request->tanggal_lahir,

    ]);

    return redirect()->route('employee.index')->with('success', 'employee updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'employee deleted successfully');
    }
}
