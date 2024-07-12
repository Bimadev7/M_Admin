<?php

namespace App\Http\Controllers;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProfilDesaController extends Controller
{
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
                    $profildesa = ProfilDesa::query();
                    return Datatables::of($profildesa)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                                    return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
                return view('backoffice.profildesa.index');
    }

    public function edit($id){

        $profildesa = ProfilDesa::find($id);
        if (!$profildesa) {
            return redirect()->route('backoffice.lembagadesa.index')->with('error', 'lembagadesa tidak ditemukan.');
        }
        return view('backoffice.profildesa.edit', compact('profildesa'));
    
}

public function show($id)
        {
            $profildesa = profildesa::findOrFail($id);
            return view('backoffice.profildesa.show')->with(compact('profildesa'));
        }

        public function update(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $profildesa = profildesa::findOrFail($id);

        // Update data
        $profildesa->tentang_desa = $request->tentang_desa;
        $profildesa->misi = $request->misi;
        $profildesa->visi = $request->visi;
        $profildesa->sejarah_desa = $request->sejarah_desa;
        $profildesa->geografis = $request->geografis;

        

        // Simpan perubahan data
        $profildesa->save();

        // Redirect dengan pesan sukses/backoffice/profildesa/1/edit
        return redirect()->route('profildesa.1.edit')->with([
            'alert-type' => 'success',
            'message' => 'Data berhasil diperbarui.'
        ]);
    }

}
