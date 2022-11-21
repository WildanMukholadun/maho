@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Rooms
                    <a href="{{ route('room.index') }}" class="float-right"><i class="fa fa-regular fa-backward"></i></a>
                </h6>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form method="POST" action="{{ url('/room') }}">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>Select Room Type</th>
                                <td>
                                    <select name="rt_id" class="form-control">
                                        <option value="0">Please Select</option>
                                        @foreach ($roomtypes as $rt)
                                            <option value="{{ $rt->id }}">{{ $rt->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>
                                    <input name="title" type="text" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">
                                    <input type="submit" class="btn btn-primary">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
