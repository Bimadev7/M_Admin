<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class SliderConttrollers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Slider::query();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backoffice.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('backoffice.slider.show')->with(compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('backoffice.slider.index')->with('error', 'Berita tidak ditemukan.');
        }
        return view('backoffice.slider.edit', compact('slider'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Temukan data berdasarkan ID
        $slider = Slider::findOrFail($id);

        // Update data

        // Upload dan simpan gambar jika ada
        if ($request->hasFile('slider1')) {
            $slider1 = $request->file('slider1');
            $filename = time() . '_' . $slider1->hashName();
            $slider1->move('images/', $filename); // Simpan gambar ke storage
            $slider->slider1 = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        }

        if ($request->hasFile('slider2')) {
            $slider2 = $request->file('slider2');
            $filename = time() . '_' . $slider2->hashName();
            $slider2->move('images/', $filename); // Simpan gambar ke storage
            $slider->slider2 = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        }

        if ($request->hasFile('slider3')) {
            $slider3 = $request->file('slider3');
            $filename = time() . '_' . $slider3->hashName();
            $slider3->move('images/', $filename); // Simpan gambar ke storage
            $slider->slider4 = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        }

        
        if ($request->hasFile('slider4')) {
            $slider4 = $request->file('slider4');
            $filename = time() . '_' . $slider4->hashName();
            $slider4->move('images/', $filename); // Simpan gambar ke storage
            $slider->slider4 = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        }
        // Simpan perubahan data
        $slider->save();

        // Redirect dengan pesan sukses
        return redirect()->route('slider.index')->with([
            'alert-type' => 'success',
            'message' => 'Data berhasil diperbarui.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
