<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    // public function index()
    // {
    //     return view('backoffice.dasboard');
    // }

    public function index()
    {
    $barang = Barang::all(); // Mengambil semua data Barang dari database
        return view('backoffice.dasboard', ['barangs' => $barang]);
        
    }  

    
}
