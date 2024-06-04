<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $statuses = Status::all();
        return view('status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::all();
        $services = Service::all();
        return view('status.create', compact('statuses', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'kode_status' => 'required|string|unique:statuses,kode_status',
            'kerusakan' => 'required',
            'status' => 'required',
            'kode_service' => 'required',
        ]);

        $existingStatus = Status::where('kode_status', $request->kode_status)->first();
        if ($existingStatus) {
            return back()->withInput()->with('warning', 'Kode Status sudah ada. Silahkan pilih Kode Status lain.');
        }

        Status::create([
            'kode_status' => $request->kode_status,
            'kerusakan' => $request->kerusakan,
            'status' => $request->status,
            'kode_service' => $request->kode_service,
        ]);

        return redirect()
        ->route('status.index')
        ->with('success', 'Successfully add Status');
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
    public function edit($id)
    {
        // $customers = Customer::all();
        $status = Status::findOrFail($id);
        $services = Service::all();
        return view('status.edit', compact('status', 'services'));
        // return view('status.edit', ['status' => $status]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
    // Validate the incoming request data
    $request->validate([
        'kerusakan' => 'required',
        'status' => 'required',
        'kode_service' => 'required',
    ]);

    // Check if the email already exists
    $existingStatus = Status::where('kode_status', $request->kode_status)->first();
    if ($existingStatus && $existingStatus->id !== $status->id) {
        // Email already exists for a different customer, return warning message
        return back()->withInput()->with('warning', 'Kode Status already exists. Please choose a different kode status.');
    }

    Status::where('id', $status->id)->update([
        'kerusakan' => $request->kerusakan,
        'status' => $request->status,
        'kode_service' => $request->kode_service,
    ]);

    return redirect()->route('status.index')->with('success', 'Status updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('status.index')->with('success', 'Status deleted successfully');
    }
}
