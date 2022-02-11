<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua data yang ada di tabel
    public function index() {
        $data = Product::all();

        return response($data, 200);
    }

    // Melakukan penyimpanan/pembuatan data baru ke dalam tabel
    public function store(Request $request) {
        $product = new Product();

        $product->name = $request->name;
        $product->category = $request->category;
        $product->thumbnail_image = $request->tuhumbnail_image ?? 'image.jpg';

        $product->save();

        return response($product, 200);
    }

    // Melakukan pembaharuan data
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->category = $request->category;
        $product->thumbnail_image = $request->tuhumbnail_image ?? 'image.jpg';

        $product->save();

        return response($product, 200);
    }

    // Menampilkan salah satu data di dalam tabel
    public function show($id) {
        $product = Product::findOrFail($id);

        return response($product, 200);
    }

    // Melakukan penghapusan salah satu data di dalam tabel
    public function destroy($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return response('Data Berhasil Dihapus!', 200);
    }
}
