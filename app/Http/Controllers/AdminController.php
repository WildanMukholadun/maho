<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $admindata = User::find($id);
        return view('admin.profile', compact('admindata'));
    }

    public function update()
    {
        $id = Auth::user()->id;
        $admindata = User::find($id);
        return view('admin.edit-profile', compact('admindata'));
    }

    public function upload(Request $request, $id)
    {
        $data = $request->all();
        $model = User::findOrFail($id);
        $model->image = $request->image;
        $model->name = $request->name;
        $model->username = $request->username;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->address = $request->address;

        $validasi = Validator::make($data,[
            'name' => 'required|max:255',
            'phone' => 'required|max:15',
            'username' => 'required|max:15',
            'email' => 'required|email',
            'address' => 'required|max:255',
        ]);
        if ($validasi->fails()){
            toastr()->error('Gagal diubah!','Sukses');
            return redirect()->back();
        }
        if ($image = $request->file('image')){
            $destinationPath = 'assets/img';
            $profilImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profilImage);
            $model['image'] = "$profilImage";
        }
        $model->save();

        toastr()->success('Berhasil diubah!', 'Sukses');
        return redirect()->route('admin.profile', $id);
    }
}
