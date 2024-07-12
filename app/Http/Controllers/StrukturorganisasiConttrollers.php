<?php

namespace App\Http\Controllers;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StrukturorganisasiConttrollers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = StrukturOrganisasi::query();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backoffice.strukturorganisasi.index');
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
           // Simpan gambar ke direktori yang ditentukan
    $imageName = time().'.'.$request->file('image')->extension();  
    $request->image->move(public_path('images'), $imageName);

    // Simpan data ke database
    $data = new StrukturOrganisasi([
        'nama' => $request->get('nama'),
        'jabatan' => $request->get('jabatan'),
        // 'deskripsi' => $request->get('deskripsi'),
        'nip' => $request->get('nip'),
        'image' => $imageName, 
        'deskripsi' => $request->get('deskripsi'),

    ]);
    $data->save();

 
                     return redirect()->route('strukturorganisasi.index')->with([
                        'alert-type' => 'success',
                        'message' => 'Data Order Berhasil Ditambahkan!'
                    ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $strukturorganisasi = StrukturOrganisasi::findOrFail($id);
        return view('backoffice.strukturorganisasi.show')->with(compact('strukturorganisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $strukturorganisasi = StrukturOrganisasi::findOrFail($id);
        return view('backoffice.strukturorganisasi.edit')->with(compact('strukturorganisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $strukturorganisasi = StrukturOrganisasi::findOrFail($id);

        // Update data
        $strukturorganisasi->nama = $request->nama;
        $strukturorganisasi->jabatan = $request->jabatan;
        $strukturorganisasi->nip = $request->nip;
        $strukturorganisasi->deskripsi = $request->deskripsi;

        // Upload dan simpan gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            // $image->storeAs('public/images', $filename); // Simpan gambar ke storage
            $image->move('images/', $filename); // Simpan gambar ke storage
            $strukturorganisasi->image = $filename; // Simpan nama file gambar ke kolom 'foto' dalam database
        }

        // Simpan perubahan data
        $strukturorganisasi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('strukturorganisasi.index')->with([
            'alert-type' => 'success',
            'message' => 'Data berhasil diperbarui.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $strukturorganisasi = StrukturOrganisasi::findOrFail($id);
            $strukturorganisasi->delete();

            return response()->json(['message' => 'User berhasil dihapus.'], 200);
             } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus user. ' . $e->getMessage()], 500);
        }
    }
}
