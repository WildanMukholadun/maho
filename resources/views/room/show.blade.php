@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Show Rooms
                    <a href="{{ route('room.index') }}" class="float-right"><i class="fas fa-regular fa-backward"></i></a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>RoomType</th>
                            <td>{{ $data->RoomType->title }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $data->title }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
