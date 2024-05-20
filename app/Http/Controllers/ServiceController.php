<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $services = Service::all();
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'kode_service' => 'required|string|unique:services,kode_service',
            'tanggal_service' => 'required',
            'kode_sparepart' => 'required',
            'nama_customer' => 'required',
            'nama_employee' => 'required',
        ]);

               // Check if the email already exists
               $existingKodeService = Service::where('kode_service', $request->kode_service)->first();
               if ($existingKodeService) {
                   // Email already exists, return warning message
                   return back()->withInput()->with('warning', 'Kode Service sudah ada. Pilih Kode Service lain.');
               }

               // Email doesn't exist, proceed with storing the customer data
               Service::create([
                'kode_service' => $request->kode_service,
                'tanggal_service' => $request->tanggal_service,
                'kode_sparepart' => $request->kode_sparepart,
                'nama_customer' => $request->nama_customer,
                'nama_employee' => $request->nama_employee,
               ]);

               return redirect()
               ->route('service.index')
               ->with('success', 'Successfully add Service');
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
    public function edit(Service $service)
    {
        // $customers = Customer::all();

        return view('service.edit', ['service' => $service]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
     // Validate the incoming request data
     $request->validate([
        'tanggal_service' => 'required',
        'kode_sparepart' => 'required',
        'nama_customer' => 'required',
        'nama_employee' => 'required',
    ]);

    // Check if the email already exists
    $existingKodeService = Service::where('kode_service', $request->kode_service)->first();
    if ($existingKodeService && $existingKodeService->id !== $service->id) {
        // Email already exists for a different admin, return warning message
        return back()->withInput()->with('warning', 'Kode Service sudah ada. Pilih Kode Service lain.');
    }

    Service::where('id', $service->id)->update([
        'tanggal_service' => $request->tanggal_service,
        'kode_sparepart' => $request->kode_sparepart,
        'nama_customer' => $request->nama_customer,
        'nama_employee' => $request->nama_employee,
    ]);

    return redirect()->route('service.index')->with('success', 'Service updated successfully!');
    }


    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
