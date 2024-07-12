<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProfilDesa;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ProfilDesaMisiController extends Controller
{
    public function index()
    {

        $profildesa_misi = ProfilDesa::all(); // Ambil semua data dari model
        return view('backoffice.profildesa_misi.index');

        // return view('backoffice.profildesa_misi.index', compact('profildesa_misi'));


    }









}
