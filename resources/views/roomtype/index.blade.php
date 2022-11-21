@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room Types</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data)
                                <?php $i = 0 ?>
                                @foreach ($data as $roomtype)
                                    <?php $i++ ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $roomtype->title }}</td>
                                        <td><sup><b>Rp</b></sup>    {{ $roomtype->price }}</td>
                                        <td>{{ $roomtype->detail }}</td>
                                        <td class="text-center justify-content-center align-self-center d-flex">
                                            <a href="{{ route('roomtype.show',$roomtype->id) }}" class="btn btn-info btn-sm" style="margin-right: 3px"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('roomtype.edit',$roomtype->id) }}" class="btn btn-primary btn-sm" style="margin-right: 3px"><i class="fa fa-edit"></i></a>
                                            <form class="ms-1" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('roomtype.destroy', $roomtype->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
