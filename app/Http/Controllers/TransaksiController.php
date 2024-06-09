<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use App\Models\product;
use App\Models\tblCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $data = product::all();
    
        return view('pelanggan.page.home', [
            'title' => 'Home',
            'data' => $data
        ]);
    }

    public function shop()
    {
        return view('pelanggan.page.shop');
    }

}
