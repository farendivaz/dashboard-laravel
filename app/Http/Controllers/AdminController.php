<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'nama' => 'required',
            'password' => 'required',
        ]);

               // Check if the email already exists
               $existingAdmin = Admin::where('email', $request->email)->first();
               if ($existingAdmin) {
                   // Email already exists, return warning message
                   return back()->withInput()->with('warning', 'Email already exists. Please choose a different email.');
               }

               // Email doesn't exist, proceed with storing the customer data
               Admin::create([
                   'email' => $request->email,
                   'nama' => $request->nama,
                   'password' => bcrypt($request->password),
               ]);

               return redirect()
               ->route('admin.index')
               ->with('success', 'Successfully add Admin');
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
    public function edit(Admin $admin)
    {
        // $customers = Customer::all();

        return view('admin.edit', ['admin' => $admin]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
     // Validate the incoming request data
     $request->validate([
        'nama' => 'required',
        'password' => 'required',
    ]);

    // Check if the email already exists
    $existingAdmin = Admin::where('email', $request->email)->first();
    if ($existingAdmin && $existingAdmin->id !== $admin->id) {
        // Email already exists for a different admin, return warning message
        return back()->withInput()->with('warning', 'Email already exists. Please choose a different email.');
    }

    admin::where('id', $admin->id)->update([
        'nama' => $request->nama,
        'password' => $request->password,
    ]);

    return redirect()->route('admin.index')->with('success', 'Admin updated successfully!');
    }


    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully');
    }
}
