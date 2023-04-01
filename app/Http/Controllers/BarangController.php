<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function addBarang(Request $request)
    {
        try {

            if ($request->has('image') == null) {
                $save = [
                    'nama_barang' => $request->nama_barang,
                    'user_id' => Auth::user()->id,
                    'jenis' => $request->jenis,
                    'stok' => $request->stok,
                    'harga' => preg_replace('/[Rp. ]/', '', $request->harga),
                    'ukuran' => $request->ukuran,
                    'deskripsi' => $request->deskripsi,
                    'slug' => Str::slug($request->title, '-'),
                    'active' => 1,
                    'created_at' => now(),
                ];
            } else {
                $file_path = public_path() . '/storage/images/barang/' . $request->image;
                File::delete($file_path);
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('storage/images/barang'), $filename);
                $save = [
                    'nama_barang' => $request->nama_barang,
                    'user_id' => Auth::user()->id,
                    'jenis' => $request->jenis,
                    'stok' => $request->stok,
                    'harga' => preg_replace('/[Rp. ]/', '', $request->harga),
                    'ukuran' => $request->ukuran,
                    'deskripsi' => $request->deskripsi,
                    'slug' => Str::slug($request->title, '-'),
                    'created_at' => now(),
                    'image' => $request->file('image')->getClientOriginalName(),

                ];
            }
            // dd($save);
            $data['barang'] = DB::table('barang')->insert($save);
            Alert::success('Barang berhasil ditambah');
            return redirect()->route('barang', $data);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
    public function deleteBarang($id)
    {
        try {
            $cekbarang = DB::table('barang')->where('id', $id)->first();
            if (File::exists(public_path('storage/images/barang/' . $cekbarang->image . ''))) {
                File::delete(public_path('storage/images/barang/' . $cekbarang->image . ''));
            }
            DB::table('barang')->where('id', $id)->delete();
            Alert::success('Barang berhasil dihapus');
            return redirect()->route('barang');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}
