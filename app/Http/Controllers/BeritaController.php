<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Berita::with('kategori')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="/backoffice/berita/' . $row->id . '" class="btn btn-info btn-sm">Show</a>' .
                           '<a href="/backoffice/berita/' . $row->id . '/edit" class="btn btn-primary btn-sm mx-1">Edit</a>' .
                           '<form action="/backoffice/berita/' . $row->id . '" method="POST" style="display:inline">' .
                               csrf_field() .
                               method_field("DELETE") .
                               '<button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>' .
                           '</form>';
                    return $btn;
                })
                ->addColumn('kategori_id', function($row){
                    return $row->kategori->nama_kategori;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backoffice.berita.index');
    }

    // No relasi
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         // $kategori_berita = kategori_berita::pluck('nama', 'id');
    //         $data = Berita::query();

            
    //         return Datatables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('action', function($row){

    //                         $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
    //     }
    //     return view('backoffice.berita.index');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.berita.create');
        
    }

    public function store(Request $request)
    {

       // Simpan gambar ke direktori yang ditentukan
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    // Simpan data ke database
    $berita = new Berita([
        'judul' => $request->get('judul'),
        'caption_capture' => $request->get('caption_capture'),
        'deskripsi_singkat' => $request->get('deskripsi_singkat'),
        'penulis' => $request->get('penulis'),
        'image' => $imageName, 
        'kategori_id' => $request->get('kategori_id'),

    ]);
    $berita->save();

 
                     return redirect()->route('berita.index')->with([
                        'alert-type' => 'success',
                        'message' => 'Data Order Berhasil Ditambahkan!'
                    ]); 

    }



    
   

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return redirect()->route('backoffice.berita.index')->with('error', 'Berita tidak ditemukan.');
        }
        return view('backoffice.berita.show', compact('berita'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return redirect()->route('backoffice.berita.index')->with('error', 'Berita tidak ditemukan.');
        }
        return view('backoffice.berita.edit', compact('berita'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Temukan data berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Update data
        $berita->judul = $request->judul;
        $berita->deskripsi_singkat = $request->deskripsi_singkat;
        $berita->caption_capture = $request->caption_capture;

        // Upload dan simpan gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->hashName();
            $image->move('images/', $filename); // Simpan gambar ke storage
            $berita->image = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        }

        // Simpan perubahan data
        $berita->save();

        // Redirect dengan pesan sukses
        return redirect()->route('berita.index')->with([
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
            $berita = Berita::findOrFail($id);
            $berita->delete();

            return response()->json(['message' => 'User berhasil dihapus.'], 200);
             } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus user. ' . $e->getMessage()], 500);
        }
    }
}
