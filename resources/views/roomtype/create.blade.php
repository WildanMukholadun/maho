@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Room Type</h6>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="table-responsive">
                    <form method="POST" action="{{ url('/roomtype') }}" enctype="multipart/form-data">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <td>
                                    <input name="title" type="text" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>
                                    <input name="price" type="number" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea name="detail" class="form-control" id="" cols="30" rows="10" required></textarea>
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
