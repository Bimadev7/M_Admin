<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackOfficeController extends Controller
{
    public function index()
    {
        
        // return view('backoffice.main');
        $username = Auth::user()->username;
        // return view('nama_view', ['username' => $username]);
        if (Auth::check()) {
            $username = Auth::user()->username;
            return view('backoffice.main', ['username' => $username]);
        } else {
            return view('main');
        }

    }


    public function main()
    {


        return view('backoffice.main');
    }

    
    public function index2()
    {
        return view('backoffice.main2');
    }


    public function show(Barang $barang)
{
    return view('backoffice.main', compact('barang'));
}
}
