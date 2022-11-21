@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Room Types
                    <a href="{{ route('roomtype.index') }}" class="float-right"><i class="fas fa-regular fa-backward"></i></a>
                </h6>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form action="{{ route('roomtype.update',$data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <td>
                                    <input value="{{ $data->title }}" name="title" type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>
                                    <input value="{{ $data->price }}" type="number" name="price" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea name="detail" class="form-control" id="" cols="30" rows="10">{{ $data->detail }}</textarea>
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
