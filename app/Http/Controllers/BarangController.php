<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $data['title'] = "Barang";
        $data['barang'] = DB::select('select * from barang');
        return view('backend.barang.index', $data);
    }
    public function add()
    {
        $data['title'] = "Tambah Barang";
        return view('backend.barang.add', $data);
    }
}
