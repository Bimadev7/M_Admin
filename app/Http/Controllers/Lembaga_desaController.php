<?php

namespace App\Http\Controllers;
use App\Models\LembagaDesa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class Lembaga_desaController extends Controller
{

    public function update(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $lembagadesa = LembagaDesa::findOrFail($id);

        // Update data
        $lembagadesa->nama_lembaga = $request->nama_lembaga;
        $lembagadesa->alamat = $request->alamat;
        $lembagadesa->deskripsi_profil = $request->deskripsi_profil;

        // Upload dan simpan gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->hashName();
            $image->move('images/', $filename); // Simpan gambar ke storage
            $lembagadesa->image = $filename; // Simpan nama file gambar ke kolom 'image' dalam database
        }

        // Simpan perubahan data
        $lembagadesa->save();

        // Redirect dengan pesan sukses
        return redirect()->route('lembagadesa.index')->with([
            'alert-type' => 'success',
            'message' => 'Data berhasil diperbarui.'
        ]);
    }

     public function index(Request $request)
    {
        if ($request->ajax()) {
            $lembagadesa = LembagaDesa::query();

            
            return Datatables::of($lembagadesa)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backoffice.lembagadesa.index');
    }

    public function create()
    {
        return view('backoffice.lembagadesa.create');
    }


    public function edit($id){

            $lembagadesa = LembagaDesa::find($id);
            if (!$lembagadesa) {
                return redirect()->route('backoffice.lembagadesa.index')->with('error', 'lembagadesa tidak ditemukan.');
            }
            return view('backoffice.lembagadesa.edit', compact('lembagadesa'));
        
    }


        public function store(Request $request)
        {

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
        
            // Simpan data ke database
            $lembagadesa = new LembagaDesa([
                'nama_lembaga' => $request->get('nama_lembaga'),
                'alamat' => $request->get('alamat'),
                'deskripsi_profil' => $request->get('deskripsi_profil'),
                'image' => $imageName, 
        
            ]);
            $lembagadesa->save();
        
         
                             return redirect()->route('lembagadesa.index')->with([
                                'alert-type' => 'success',
                                'message' => 'Data Order Berhasil Ditambahkan!'
                            ]); 
            
            

            }

            public function destroy($id)
            {
                
            try {
                $lembagadesa = LembagaDesa::findOrFail($id);
                $lembagadesa->delete();

                return response()->json(['message' => 'User berhasil dihapus.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Gagal menghapus LembagaDesa. ' . $e->getMessage()], 500);
            }
        }
        

        public function show($id)
        {
            $lembagadesa = LembagaDesa::findOrFail($id);
            return view('backoffice.lembagadesa.show')->with(compact('lembagadesa'));
        }





}
