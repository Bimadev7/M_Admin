<?php

namespace App\Http\Controllers;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Pengumuman::query();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backoffice.pengumuman.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.pengumuman.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
           // Simpan gambar ke direktori yang ditentukan
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    // Simpan data ke database
    $pengumuman = new Pengumuman([
        'judul' => $request->get('judul'),
        'caption_capture' => $request->get('caption_capture'),
        'deskripsi_singkat' => $request->get('deskripsi_singkat'),
        'deskripsi' => $request->get('deskripsi'),
        'penulis' => $request->get('penulis'),
        'image' => $imageName, // simpan nama file gambar ke dalam kolom 'image'
    ]);
    $pengumuman->save();

 
                     return redirect()->route('backoffice.pengumuman.index')->with([
                        'alert-type' => 'success',
                        'message' => 'Data Order Berhasil Ditambahkan!'
                    ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
            return view('backoffice.pengumuman.show')->with(compact('pengumuman'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('backoffice.pengumuman.edit')->with(compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = DataModel::findOrFail($id);
        $pengumuman = Pengumuman::findOrFail($id);

        // Update data
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi_singkat = $request->deskripsi_singkat;
        $pengumuman->deskripsi = $request->deskripsi;

        // Upload dan simpan gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            // $image->storeAs('public/images', $filename); // Simpan gambar ke storage
            $image->move('images/', $filename); // Simpan gambar ke storage
            $pengumuman->image = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        }

        // Simpan perubahan data
        $pengumuman->save();

        // Redirect dengan pesan sukses
        return redirect()->route('backoffice.pengumuman.index')->with([
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
            $pengumuman = Pengumuman::findOrFail($id);
            $pengumuman->delete();

            return response()->json(['message' => 'User berhasil dihapus.'], 200);
             } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus user. ' . $e->getMessage()], 500);
        }
    }
}