<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email|unique:customers,email',
            'nama' => 'required',
            'notelp' => 'required',
            'password' => 'required',
            'alamat' => 'required',
        ]);

        // Check if the email already exists
        $existingCustomer = Customer::where('email', $request->email)->first();
        if ($existingCustomer) {
            // Email already exists, return warning message
            return back()->withInput()->with('warning', 'Email already exists. Please choose a different email.');
        }

        // Email doesn't exist, proceed with storing the customer data
        Customer::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'notelp' => $request->notelp,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
        ]);

        return redirect()
        ->route('customer.index')
        ->with('success', 'Successfully add Customer');
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
    public function edit(Customer $customer)
    {
        // $customers = Customer::all();

        return view('customer.edit', ['customer' => $customer]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
    // Validate the incoming request data
    $request->validate([
        'nama' => 'required',
        'notelp' => 'required',
        'password' => 'required',
        'alamat' => 'required',
    ]);

    // Check if the email already exists
    $existingCustomer = Customer::where('email', $request->email)->first();
    if ($existingCustomer && $existingCustomer->id !== $customer->id) {
        // Email already exists for a different customer, return warning message
        return back()->withInput()->with('warning', 'Email already exists. Please choose a different email.');
    }

    Customer::where('id', $customer->id)->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'password' => $request->password,
        'notelp' => $request->notelp
    ]);

    return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
    }
}
