<?php

namespace App\Http\Controllers;

use App\Role;
use App\SKPD;
use App\SubUnit;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role_slug == 'admin'){
            $user = User::filter(request(['skpd']))->paginate(50);
        }else if(auth()->user()->role_slug == 'kaskpd'){
            $user = User::where('kode_skpd', auth()->user()->kode_skpd)->get();
        }
        return view('user.index', [
            'users' => $user,
            'skpd' => SKPD::where('status', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role_slug === 'admin') {
            return view('user.create', [
                'role' => Role::all(),
                'skpd' => SKPD::all()
            ]);
        } else if (auth()->user()->role_slug === 'kaskpd') {
            return view('user.create', [
                'role' => auth()->user()->role_slug,
                'kode_skpd' => auth()->user()->kode_skpd,
                'sub_units' => SubUnit::where('kode_skpd', auth()->user()->kode_skpd)->where('status', 1)->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required|email',
            'role_slug' => 'required',
            'status' => 'required',
            'password' => 'required|min:4'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['kode_skpd'] = $request->kode_skpd;
        $validatedData['kode_sub'] = $request->kode_sub;

        User::create($validatedData);
        return redirect('/user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
            'role' => Role::all(),
            'skpd' => SKPD::all(),
            'sub_units' => SubUnit::where('kode_skpd', auth()->user()->kode_skpd)->where('status', 1)->get()
        ]);
    }

    public function editmember(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        return view('user.editmember', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'role_slug' => 'required',
            'status' => 'required',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->password != '') {
            $validatedData['password'] = bcrypt($request->password);
        }

        $validatedData['kode_skpd'] = $request->kode_skpd;
        $validatedData['kode_sub'] = $request->kode_sub;

        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/user')->with('success', 'Pengguna berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/user')->with('success', 'Pengguna Berhasil dihapus');
    }
}
