<?php

namespace App\Http\Controllers;
use App\Models\Demografidesa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DemografidesaController extends Controller
{


    public function store(Request $request)
    {

        $demografidesa = new Demografidesa;
        $demografidesa->angka_kelahiran            = strip_tags(ucfirst($request->angka_kelahiran));
        $demografidesa->angka_kematian           = strip_tags($request->angka_kematian);
        $demografidesa->jumlah_penduduk           = strip_tags($request->jumlah_penduduk);
        $demografidesa->save();
    

        return redirect()->route('demografidesa.index')->with([
            'alert-type' => 'success',
            'message' => 'Data Order Berhasil Ditambahkan!'
        ]);
        
        

    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
                    $demografidesa = Demografidesa::query();
                    return Datatables::of($demografidesa)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                                    return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
                return view('backoffice.demografidesa.index');
    }


    public function edit($id)
    {
        $demografidesa = Demografidesa::find($id);
        if (!$demografidesa) {
            return redirect()->route('backoffice.demografidesa.index')->with('error', 'Berita tidak ditemukan.');
        }
        return view('backoffice.demografidesa.edit', compact('demografidesa'));
    
    }

    public function show($id)
        {
            $demografidesa = Demografidesa::findOrFail($id);
            return view('backoffice.demografidesa.show')->with(compact('demografidesa'));
        }

    public function update(Request $request, string $id)
    {
        // Temukan data berdasarkan ID
        $demografidesa = Demografidesa::findOrFail($id);

        // Update data
        $demografidesa->angka_kelahiran = $request->angka_kelahiran;
        $demografidesa->angka_kematian = $request->angka_kematian;
        $demografidesa->jumlah_penduduk = $request->jumlah_penduduk;

        // Upload dan simpan gambar jika ada
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '_' . $image->hashName();
        //     $image->move('images/', $filename); // Simpan gambar ke storage
        //     $berita->image = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        // }

        // Simpan perubahan data
        $demografidesa->save();

        // Redirect dengan pesan sukses
        return redirect()->route('demografidesa.index')->with([
            'alert-type' => 'success',
            'message' => 'Data berhasil diperbarui.'
        ]);

        }

        public function destroy($id)
        {
            
        try {
            $demografidesa = Demografidesa::findOrFail($id);
            $demografidesa->delete();

            return response()->json(['message' => 'User berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus user. ' . $e->getMessage()], 500);
        }
    }











}
