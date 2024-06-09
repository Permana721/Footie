<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    
    public function index(Request $request) 
    {
        $data = User::paginate(10);
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('tlp', 'LIKE', '%' . $search . '%')
                ->orWhere('jenis_kelamin', 'LIKE', '%' . $search . '%')
                ->orWhere('role', 'LIKE', '%' . $search . '%');
        }

        $data = $query->paginate($request->has('search') ? User::count() : 4);

        return view('admin.page.user',[
            'name'  =>  'User Management',
            'title' => 'Admin User Management',
            'data'  => $data,
        ]);
    }

    public function addModalUser()
    {
        return view('admin.modal.modalUser', [
            'title' => 'Tambah Data Admin',
        ]);
    }

    public function store(UserRequest $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'tlp' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
        ], [
            'nama.required' => 'Silahkan isi nama user.',
            'email.required' => 'Silahkan isi alamat email.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Silahkan isi password.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'tlp.required' => 'Silahkan isi nomor telepon.',
            'role.required' => 'Silahkan pilih peran user.',
            'jenis_kelamin.required' => 'Silahkan pilih jenis kelamin user.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Format foto harus jpeg, png, atau jpg.',
        ]);

        $data = new User;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tlp = $request->tlp;
        $data->role = $request->role;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->is_mamber = 0;
        $data->is_admin = 1;

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        }
        $data->save();

        return back()->with('success', 'Berhasil menambah user');
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        // $hasValue = Hash::make($data->password);
        return view(
            'admin.modal.editUser',
            [
                'title' => 'Edit Data Admin',
                'data'  => $data,
            ]
        )->render();
    }

    public function update(UserRequest $request, $id)
{
    $data = User::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'tlp' => 'required',
        'role' => 'required',
        'jenis_kelamin' => 'required',
        'foto' => 'nullable|', // Ubah validasi untuk foto
    ], [
        'nama.required' => 'Silahkan isi nama user.',
        'email.required' => 'Silahkan isi alamat email.',
        'email.email' => 'Alamat email tidak valid.',
        'email.unique' => 'Alamat email sudah digunakan.',
        'tlp.required' => 'Silahkan isi nomor telepon.',
        'role.required' => 'Silahkan pilih peran user.',
        'jenis_kelamin.required' => 'Silahkan pilih jenis kelamin user.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
    ]);

    // Memperbarui data pengguna tanpa password jika tidak ada perubahan pada password
    if (!$request->filled('password')) {
        $data->fill($request->except('password'));
    } else {
        $data->fill($request->all());
    }
    
    // Memeriksa apakah pengguna mengunggah foto baru
    if ($request->hasFile('foto')) {
        $photo = $request->file('foto');
        $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
        $photo->move(public_path('storage/user'), $filename);
        $data->foto = $filename;
    }

    $data->name = $request->nama;
    $data->email = $request->email;
    $data->password = bcrypt($request->password);
    $data->tlp = $request->tlp;
    $data->role = $request->role;
    $data->jenis_kelamin = $request->jenis_kelamin;
    $data->save();

    return back()->with('success', 'Berhasil mengedit user');
}

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect()->route('product');
    }

    public function storePelanggan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'tlp' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'required',
        ], [
            'name.required' => 'Silahkan isi nama user.',
            'email.required' => 'Silahkan isi alamat email.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Silahkan isi password.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'tlp.required' => 'Silahkan isi nomor telepon.',
            'jenis_kelamin.required' => 'Silahkan pilih jenis kelamin user.',
            'foto.required' => 'Silahkan upload foto.',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->tlp = $request->tlp;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->role = 2;
        $data->is_mamber = 1;
        $data->is_admin = 0;

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        } else {
            $filename = "default.png";
            $data->foto = $filename;
        }

        $data->save();

        Auth::login($data);

        event(new Registered($data));

        return redirect()->route('verification.notice');
    }

    public function updatePelanggan(UserRequest $request, $id)
    {   
        $id = $request->user_id;
        $data = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'tlp' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|', // Ubah validasi untuk foto
        ], [
            'nama.required' => 'Silahkan isi nama user.',
            'email.required' => 'Silahkan isi alamat email.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'tlp.required' => 'Silahkan isi nomor telepon.',
            'role.required' => 'Silahkan pilih peran user.',
            'jenis_kelamin.required' => 'Silahkan pilih jenis kelamin user.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);

        // Memperbarui data pengguna tanpa password jika tidak ada perubahan pada password
        if (!$request->filled('password')) {
            $data->fill($request->except('password'));
        } else {
            $data->fill($request->all());
        }
        
        // Memeriksa apakah pengguna mengunggah foto baru
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        }

        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tlp = $request->tlp;
        $data->role = $request->role;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();

        return back()->with('success', 'Berhasil mengedit user');
    }

    
    public function resendVerificationEmail(Request $request)
    {
        $user = Auth::user();
        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Berhasil mengirim ulang verifikasi!');
    }

    public function loginProses(Request $request)
    {
        $dataLogin = [
            'email' => $request->email,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();

        if (!$proses || $proses->is_active === 0) {
            return back()->with('errors', 'Email atau password tidak valid');
        }

        if (Auth::attempt($dataLogin)) {
            $request->session()->regenerate();
            return redirect('/')->with('login', 'Berhasil Login');
        } else {
            return back()->with('errors', 'Email atau password tidak valid');
        }
    }

    public function gantiAkun(Request $request)
    {
        $dataLogin = [
            'email' => $request->email,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();

        if (!$proses || $proses->is_active === 0) {
            return back()->with('errors', 'Email atau password tidak valid');
        }

        if (Auth::attempt($dataLogin)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Berhasil Mengganti Akun');
        } else {
            return back()->with('errors', 'Email atau password tidak valid');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Logout');                       
    }
}
