<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    // Menampilkan semua data yang ada di tabel
    public function index() {
        $data = Merchant::all();

        return response($data, 200);
    }

    // Melakukan penyimpanan/pembuatan data baru ke dalam tabel
    public function store(Request $request) {

        $merchant = new Merchant();

        $merchant->name = $request->name;
        $merchant->email = $request->email;
        $merchant->password = Hash::make($request->password);
        $merchant->photo_profile = $request->photo_profile ?? 'user.jpg';
        // $merchant->status = $request->status;

        $merchant->save();

        return response($merchant, 200);
    }

    // Melakukan pembaharuan data
    public function update(Request $request, $id) {

        $merchant = Merchant::findOrFail($id);

        $merchant->name = $request->name;
        $merchant->email = $request->email;
        $merchant->password = Hash::make($request->password);
        $merchant->photo_profile = $request->photo_profile ?? 'user.jpg';

        $merchant->save();

        return response($merchant, 200);
    }

    // Menampilkan salah satu data di dalam tabel
    public function show($id) {

        $merchant = Merchant::findOrFail($id);

        return response($merchant, 200);
    }

    // Melakukan penghapusan salah satu data di dalam tabel
    public function destroy($id) {

        $merchant = Merchant::findOrFail($id);

        $merchant->delete();

        return response('Data Berhasil Dihapus!', 200);
    }
}
