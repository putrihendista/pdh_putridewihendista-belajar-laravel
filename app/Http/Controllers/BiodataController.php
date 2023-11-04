<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function show()
    {
        $nama         = "Putri Dewi Hendista";
        $umur         = 20;
        $agama        = "Islam";
        $jeniskelamin = "Perempuan";
        $alamat       = "Banyuwangi";
        $kelas        = "FSWD";
        $asal         = "Politeknik Negeri Banyuwangi";

        return view('biodata', compact('nama', 'umur', 'agama', 'jeniskelamin', 'alamat', 'kelas', 'asal'));
    } 
}