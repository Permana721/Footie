<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;     

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('sku', 'LIKE', '%' . $search . '%')
                ->orWhere('nama_product', 'LIKE', '%' . $search . '%')
                ->orWhere('category', 'LIKE', '%' . $search . '%')
                ->orWhere('tipe', 'LIKE', '%' . $search . '%')
                ->orWhere('alamat_penjual', 'LIKE', '%' . $search . '%')
                ->orWhere('halal', 'LIKE', '%' . $search . '%');
        }

        $data = $query->paginate($request->has('search') ? Product::count() : 4);

        return view('admin.page.product', [
            'data' => $data,
            'title' => 'Cari Product',
            'name' => 'Product',
        ]);
    }


    public function addModal()
    {
        return view('admin.modal.addModal',[
            'title' => 'Tambah Data Product',
            'sku'   => 'BRG'.rand(10000, 99999),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
{
    $request->validate([
        'sku' => 'required',
        'nama' => 'required',
        'link' => 'required|url',
        'deskripsi' => 'required',
        'category' => 'required',
        'tipe' => 'required',
        'alamat_penjual' => 'required',
        'halal' => 'required',
        'harga' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        'foto_2' => 'image|mimes:jpeg,png,jpg,gif',
        'foto_3' => 'image|mimes:jpeg,png,jpg,gif',
        'foto_4' => 'image|mimes:jpeg,png,jpg,gif',
    ], [
        'sku.required' => 'Silahkan isi SKU.',
        'nama.required' => 'Silahkan isi nama produk.',
        'link.required' => 'Silahkan isi link produk.',
        'link.url' => 'Link produk harus berupa URL yang valid.',
        'deskripsi.required' => 'Silahkan isi Deskripsi produk.',
        'category.required' => 'Silahkan isi kategori produk.',
        'tipe.required' => 'Silahkan isi tipe produk.',
        'alamat_penjual.required' => 'Silahkan isi alamat penjual.',
        'halal.required' => 'Silahkan isi status halal produk.',
        'harga.required' => 'Silahkan isi harga produk.',
        'foto.required' => 'Silahkan pilih foto produk utama.',
        'foto.image' => 'Foto produk harus berupa file gambar.',
        'foto.mimes' => 'Format foto produk harus jpeg, png, atau jpg.',
    ]);

    $data = new Product;
    $data->sku = $request->sku;
    $data->nama_product = $request->nama;
    $data->link = $request->link;
    $data->deskripsi = $request->deskripsi;
    $data->category = $request->category;
    $data->tipe = $request->tipe;
    $data->alamat_penjual = $request->alamat_penjual;
    $data->halal = $request->halal;
    $data->harga = $request->harga;
    $data->discount = 10 / 100;
    $data->is_active = 1;

    // Simpan foto utama
    if ($request->hasFile('foto')) {
        $photo = $request->file('foto');
        $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
        $photo->move(public_path('storage/product'), $filename);
        $data->foto = $filename;
    }

    $data->save();

    return back()->with('success', 'Berhasil Menambahkan Data');
}



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = product::findOrFail($id);

        return view(
            'admin.modal.editModal',
        [
            'title' => 'Edit Data Product',
            'data'  => $data,
        ]
    )->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product, $id)
    {
        $data = Product::findOrFail($id);

        $request->validate([
            'sku' => 'required',
            'nama' => 'required',
            'link' => 'required|url',
            'deskripsi' => 'required',
            'category' => 'required',
            'tipe' => 'required',
            'alamat_penjual' => 'required',
            'halal' => 'required',
            'harga' => 'required',
            'foto' => 'nullable',
        ], [
            'sku.required' => 'Silahkan isi SKU.',
            'nama.required' => 'Silahkan isi nama produk.',
            'link.required' => 'Silahkan isi link produk.',
            'link.url' => 'Link produk harus berupa URL yang valid.',
            'deskripsi.required' => 'Silahkan isi Deskripsi produk.',
            'category.required' => 'Silahkan isi kategori produk.',
            'tipe.required' => 'Silahkan isi tipe produk.',
            'alamat_penjual.required' => 'Silahkan isi alamat penjual produk.',
            'halal.required' => 'Silahkan isi status halal produk.',
            'harga.required' => 'Silahkan isi harga produk.',
        ]);

        if($request->file('foto')){
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/product'), $filename);
            $data->foto = $filename;
        }

        $data->sku = $request->sku;
        $data->nama_product = $request->nama;
        $data->link = $request->link;
        $data->deskripsi = $request->deskripsi;
        $data->category = $request->category;
        $data->tipe = $request->tipe;
        $data->alamat_penjual = $request->alamat_penjual;
        $data->halal = $request->halal;
        $data->harga = $request->harga;
        $data->discount = 10 / 100;
        $data->is_active = 1;
        $data->save();

        return back()->with('success', 'Berhasil Mengedit Data');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back();
    }
}
