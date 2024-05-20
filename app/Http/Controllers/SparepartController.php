<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $spareparts = Sparepart::all();
        return view('sparepart.index', compact('spareparts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sparepart.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'kode_sparepart' => 'required|string|unique:spareparts,kode_sparepart',
            'jenis' => 'required',
            'brand' => 'required',
            'harga' => 'required',
        ]);

        Sparepart::create([
            'kode_sparepart' => $request->kode_sparepart,
            'jenis' => $request->jenis,
            'brand' => $request->brand,
            'harga' => $request->harga,
        ]);

        return redirect()
        ->route('sparepart.index')
        ->with('success', 'Successfully add Sparepart');
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
    public function edit(Sparepart $sparepart)
    {
        // $customers = Customer::all();

        return view('sparepart.edit', ['sparepart' => $sparepart]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sparepart $sparepart)
    {
    // Validate the incoming request data
    $request->validate([
        'jenis' => 'required',
        'brand' => 'required',
        'harga' => 'required',
    ]);

    // Check if the email already exists
    $existingKodeBarang = Sparepart::where('kode_sparepart', $request->kode_sparepart)->first();
    if ($existingKodeBarang && $existingKodeBarang->id !== $sparepart->id) {
        // Email already exists for a different customer, return warning message
        return back()->withInput()->with('warning', 'Kode Barang sudah ada. Tolong Masukkan Kode lain');
    }

    Sparepart::where('id', $sparepart->id)->update([
        'jenis' => $request->jenis,
        'brand' => $request->brand,
        'harga' => $request->harga,
    ]);

    return redirect()->route('sparepart.index')->with('success', 'Sparepart updated successfully!');
    }


    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Sparepart $sparepart)
    {
        $sparepart->delete();

        return redirect()->route('sparepart.index')->with('success', 'Sparepart deleted successfully');
    }
}
