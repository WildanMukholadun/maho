@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Show Room Types
                    <a href="{{ route('roomtype.index') }}" class="float-right"><i class="fas fa-regular fa-backward"></i></a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <td>
                                {{ $data->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>
                                <sup><b>Rp</b></sup>{{ $data->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td>
                                {{ $data->detail }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
