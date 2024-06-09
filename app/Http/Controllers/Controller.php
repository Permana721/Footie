<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showDetail($id)
    {
        $product = Product::findOrFail(decrypt($id));
        $allProducts = Product::all();

        return view('pelanggan.page.produk', [
            'data' => [$product],
            'allProducts' => $allProducts,
            'name' => 'Produk',
            'title' => $product->nama_product,
        ]);
    }

    public function about(){
        return view('pelanggan.page.about', [
            'title' => 'Tentang Kami',
        ]);
    }

public function admin()
    {
        $dataProduct = product::count();
        $dataUser = User::count();
        return view('admin.page.dashboard', [
            'name'          => "Dashboard",
            'title'         => 'Admin Dashboard',
            'totalProduct'  => $dataProduct,
            'totalUser'  => $dataUser,
        ]);
    }


    public function userManagement()
    {
        return view('admin.page.user',[
            'name'  =>  'User Management',
            'title' => 'Admin User Management',
        ]);
    }


    public function login()
    {
        return view('admin.page.login',[
            'name'  =>  'Login',
            'title' => 'Admin Login',
        ]);
    }

    public function loginProses(Request $request)
    {
        $dataLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            Session::flash('error', 'Email atau Password kamu tidak valid');
            return back();
        }

        if ($user->role == 2) {
            Session::flash('error', 'Kamu Bukan Admin');
            return back();
        }

        if (Auth::attempt($dataLogin)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('success', 'Berhasil login');
        } else {
            Session::flash('error', 'Email atau Password kamu tidak valid');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('admin');
    }
}
