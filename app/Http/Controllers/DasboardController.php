<?php

namespace App\Http\Controllers;
use App\Models\Barang; 
use App\Models\Peminjaman; 
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class DasboardController extends Controller
{
    
    public function welcome()
    {
        return view('/welcome'); // Misalnya, kita mengembalikan view 'dashboard.index'
    }


    public function index()
    {
        return view('public.index'); // Misalnya, kita mengembalikan view 'dashboard.index'
    }

  
    public function dasboard()
    {

        $peminjaman = Peminjaman::all();
        return view('backoffice.main', compact('peminjaman'));
    $barang = Barang::all(); // Mengambil semua data Barang dari database
        return view('backoffice.main', ['barangs' => $barang]);
    }   

    
}
