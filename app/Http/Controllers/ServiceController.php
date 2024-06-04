<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Sparepart;
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
        $customers = Customer::all();
        $employees = Employee::all();
        $spareparts = Sparepart::all();
        return view('service.create', compact('customers', 'employees', 'spareparts'));
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
            'customer_id' => 'required',
            'employee_id' => 'required',
            'nama_customer' => 'required',
            'nama_employee' => 'required',
            'email_customer' => 'required',
            'email_employee' => 'required',
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
                'customer_id' => $request->customer_id,
                'employee_id' => $request->employee_id,
                'nama_customer' => $request->nama_customer,
                'nama_employee' => $request->nama_employee,
                'email_customer' => $request->email_customer,
                'email_employee' => $request->email_employee,
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
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $customers = Customer::all();
        $employees = Employee::all();
        $spareparts = Sparepart::all();
        return view('service.edit', compact('service', 'customers', 'employees', 'spareparts'));

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
                'customer_id' => 'required',
                'employee_id' => 'required',
                'nama_customer' => 'required',
                'nama_employee' => 'required',
                'email_customer' => 'required',
                'email_employee' => 'required',
            ]);

    // Check if the email already exists
    $existingKodeService = Service::where('kode_service', $request->kode_service)->first();
    if ($existingKodeService && $existingKodeService->id !== $service->id) {
        // Email already exists for a different admin, return warning message
        return back()->withInput()->with('warning', 'Kode Service sudah ada. Pilih Kode Service lain.');
    }

     // Update service
     $service->update([
        // 'kode_service' => $request->kode_service,
        'tanggal_service' => $request->tanggal_service,
        'kode_sparepart' => $request->kode_sparepart,
        'customer_id' => $request->customer_id,
        'employee_id' => $request->employee_id,
        'nama_customer' => $request->nama_customer,
        'nama_employee' => $request->nama_employee,
        'email_customer' => $request->email_customer,
        'email_employee' => $request->email_employee,
       ]);
    //  $service->update([
    //     'kode_service' => $request->kode_service,
    //     'tanggal_service' => $request->tanggal_service,
    //     'kode_sparepart' => $request->kode_sparepart,
    //     'customer_id' => $request->customer_id,
    //     'employee_id' => $request->employee_id,
    // ]);


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

    public function getCustomerData($id)
    {
        $customer = Customer::find($id);
        return response()->json([
            'nama' => $customer->nama,
            'email' => $customer->email
        ]);
    }

    public function getEmployeeData($id)
    {
        $employee = Employee::find($id);
        return response()->json([
            'nama' => $employee->nama,
            'email' => $employee->email
        ]);
    }

}
