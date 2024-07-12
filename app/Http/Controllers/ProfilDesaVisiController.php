<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProfilDesa;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ProfilDesaVisiController extends Controller
{

    public function store(Request $request){
    

    // Simpan data ke database
    $profildesa_visi = new ProfilDesa([
        'tentang_desa' => $request->get('tentang_desa'),
        'visi' => $request->get('visi'),
        'misi' => $request->get('misi'),
        'sejarah_desa' => $request->get('sejarah_desa'),
        'geografis' => $request->get('geografis'),
    ]);
    $profildesa_visi->save();


                    return redirect()->route('profildesa_visi.index')->with([
                        'alert-type' => 'success',
                        'message' => 'Data Order Berhasil Ditambahkan!'
                    ]); 
    }

    public function update(Request $request, string $id)
    {
        // $data = DataModel::findOrFail($id);
        $profildesa_visi = ProfilDesa::findOrFail($id);

        $profildesa_visi->tentang_desa = $request->tentang_desa;
        $profildesa_visi->visi = $request->visi;
        $profildesa_visi->misi = $request->misi;
        $profildesa_visi->sejarah_desa = $request->sejarah_desa;
        $profildesa_visi->geografis = $request->geografis;

        
        // Update data

        // Simpan perubahan data
        $profildesa_visi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('profildesa_visi.index')->with([
            'alert-type' => 'success',
            'message' => 'Data berhasil diperbarui.'
        ]);
     
        
    }

    public function index(){

        $profildesa_visi = ProfilDesa::all(); // Ambil semua data dari model
        return view('backoffice.profildesa_visi.index', compact('profildesa_visi'));
    }

    public function index_visi(){

        $profildesa_visi = ProfilDesa::all(); // Ambil semua data dari model
        return view('backoffice.profildesa_visi.index_visi', compact('profildesa_visi'));
    }

    public function index_misi(){

        $profildesa_visi = ProfilDesa::all(); // Ambil semua data dari model
        return view('backoffice.profildesa_visi.index_misi', compact('profildesa_visi'));
    }

    public function index_sejarah_desa(){

        $profildesa_visi = ProfilDesa::all(); // Ambil semua data dari model
        return view('backoffice.profildesa_visi.index_sejarah_desa', compact('profildesa_visi'));
    }

    public function geografis(){

        $profildesa_visi = ProfilDesa::all(); // Ambil semua data dari model
        return view('backoffice.profildesa_visi.geografis', compact('profildesa_visi'));
    }


    public function tentang_desa(){

        $profildesa_visi = ProfilDesa::all(); // Ambil semua data dari model
        return view('backoffice.profildesa_visi.tentang_desa', compact('profildesa_visi'));
    }
    


    public function edit(string $id)
    {
        $profildesa_visi = ProfilDesa::findOrFail($id);
        return view('backoffice.profildesa_visi.edit')->with(compact('profildesa_visi'));
    }



    public function show($id)
        {
            $profildesa_visi = ProfilDesa::findOrFail($id);
            return view('backoffice.profildesa_visi.show')->with(compact('profildesa_visi'));
        }

}
