<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\Like;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->filled('search')) {
            $search = $request->search;
            $query->where('sku', 'LIKE', '%' . $search . '%')
                ->orWhere('nama_product', 'LIKE', '%' . $search . '%')
                ->orWhere('category', 'LIKE', '%' . $search . '%')
                ->orWhere('tipe', 'LIKE', '%' . $search . '%')
                ->orWhere('alamat_penjual', 'LIKE', '%' . $search . '%')
                ->orWhere('halal', 'LIKE', '%' . $search . '%');
        } else {
            return redirect()->back();
        }

        $data = $query->paginate(100);

        return view('pelanggan.page.home', [
            'data' => $data,
            'title' => 'Cari Produk',
            'name' => 'Product',
        ]);
    }
    
    public function product($slug)
    {
        $query = Product::query();
        $data = $query;
        $like = Like::where('product_id', $data->id)->count();
        return $like;
    }
    
    public function chinnese()
    {
        $data = Product::where('category', 'chinese')->inRandomOrder()->get();
        return view('pelanggan.page.home', [
            'hideSections' => true,
            'data' => $data,
            'title' => 'Chinnese',
            'judul' => 'Chinnese',
        ]);
    }

    public function middle()
    {
        $data = Product::where('category', 'middle')->inRandomOrder()->get();
        return view('pelanggan.page.home', [
            'hideSections' => true,
            'data' => $data,
            'title' => 'Middle',
            'judul' => 'Middle',
        ]);
    }

    public function indonesia()
    {
        $data = Product::where('category', 'indonesia')->inRandomOrder()->get();
        return view('pelanggan.page.home', [
            'hideSections' => true,
            'data' => $data,
            'title' => 'Indonesia',
            'judul' => 'Indonesia',
        ]);
    }

    public function japanese()
    {
        $data = Product::where('category', 'japan')->inRandomOrder()->get();
        return view('pelanggan.page.home', [
            'hideSections' => true,
            'data' => $data,
            'title' => 'Japanese',
            'judul' => 'Japanese',
        ]);
    }

    public function korean()
    {
        $data = Product::where('category', 'korean')->inRandomOrder()->get();
        return view('pelanggan.page.home', [
            'hideSections' => true,
            'data' => $data,
            'title' => 'Korean',
            'judul' => 'Korean',
        ]);
    }

    public function non()
    {
        $data = Product::where('halal', 'haram')->inRandomOrder()->get();
        return view('pelanggan.page.home', [
            'hideSections' => true,
            'data' => $data,
            'title' => 'Non Halal',
            'judul' => 'Non Halal',
        ]);
    }

}
