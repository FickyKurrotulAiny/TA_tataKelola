<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request){
        $data['navlink'] = 'user';
        return view('user.index', $data, compact('request'));
    }

    public function getuser(Request $request){
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($value){
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">

                    <a class="btn btn-info btn-sm"
                        href="'.route('user.edit', $value->id).'"><i
                            class="fas fa-pen-fancy"></i>&nbsp;</a>&nbsp;

                    <button class="btn btn-danger delete" id="'.$value->id.'"
                        nama="'.$value->nama.'" type="submit" onclick="deleteUser('.$value->id.')"><i
                            class="fas fa-trash"></i></button>
                </div>';
                    return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // return view('user.index');
    }

    public function create()
    {
        $data['navlink'] = 'user';
        return view('user.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ],[
            'name.required' => 'Nama Wajib diisi!',
            'username.required' => 'Username Wajib diisi!',
            'password.required' => 'Password Wajib diisi!',
            'level.required' => 'Level Wajib diisi!',
        ]);

        $user = new User();
        $user = User::create($request->all());

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->level = $request->level;
        $user->save();

        return redirect('user')->with('success', 'Tambah User Sukses!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data['navlink'] = 'user';
        return view('user.edit', $data, compact('user'));
    }

    public function update(Request $request, $id)
    {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = $request->passwordb7;
            $user->level = $request->level;
            $user->save();

            return redirect('user')->with('success', 'Edit User Sukses!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        // dd($user);
        $user->delete();
        return $id;
        // return redirect('user');
    }


}
