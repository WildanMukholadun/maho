<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $data = Room::all();
        return view('room.index',[
            'data' => $data
        ]);
    }

    public function create()
    {
        $roomtypes = RoomType::all();
        return view('room.create',[
            'roomtypes' => $roomtypes
        ]);
    }

    public function store(Request $request)
    {
        $data = new Room;
        $data->room_type_id = $request->rt_id;
        $data->title = $request->title;
        $data->save();

        return redirect('/room')->with('success','Data Sudah DItambah');
    }

    public function show($id)
    {
        $data = Room::find($id);
        return view('room.show',[
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $roomtypes = RoomType::all();
        $data = Room::find($id);
        return view('room.edit',[
            'data' => $data,
            'roomtypes' => $roomtypes
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_type_id = $request->rt_id;
        $data->title = $request->title;
        $data->save();

        return redirect('/room')->with('success','Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Room::findOrFail($id);
        $data->delete();

        if ($data) {
            return redirect()
                ->route('room.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('room.index')
                ->with([
                    'error' => 'Beberapa masalah telah terjadi, silahkan coba lagi'
                ]);
        }
    }
}
