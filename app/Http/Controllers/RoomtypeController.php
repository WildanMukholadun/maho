<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    public function index()
    {
        $data=RoomType::all();
        return view('roomtype.index',['data' => $data]);
    }

    public function create()
    {
        return view('roomtype.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi terlebih dahulu!!',
            'min' => ':attribute harus diisi minimal :min karakter ya!!',
            'numeric' => ':attribute harus diisi dengan angka ya!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya!!',
        ];

        $this->validate($request,[
            'title' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
        ], $messages);

        $data = new RoomType;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();

        return redirect('/roomtype')->with('success','Data Sudah Ditambah');
    }

    public function show($id)
    {
        $data = RoomType::find($id);
        return view('roomtype.show',[
            'data'=>$data
        ]);
    }

    public function edit($id)
    {
        $data = RoomType::find($id);
        return view('roomtype.edit',[
            'data'=>$data
        ]);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi terlebih dahulu!!',
            'min' => ':attribute harus diisi minimal :min karakter ya!!',
            'numeric' => ':attribute harus diisi dengan angka ya!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya!!',
        ];

        $this->validate($request,[
            'title' => 'required',
            'price' => 'required|numeric',
            'detail' => 'required',
        ],$messages);

        $data = RoomType::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();

        return redirect('/roomtype')->with('success','Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = RoomType::findOrFail($id);
        $data->delete();

        if($data){
            return redirect()
            ->route('roomtype.index')
            ->with([
                'success' => 'Data berhasil dihapus'
            ]);
        } else {
            return redirect()
            ->route('roomtype.index')
            ->with([
                'error' => 'Beberapa masalah telah terjadi, silahkan coba lagi'
            ]);
        }
    }
}
