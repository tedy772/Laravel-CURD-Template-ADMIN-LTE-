@extends('layouts.master')

<!-- penambahan asset css dataTables -->
@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection
<!-- end dataTbles -->

<!-- sweetAlert -->
@section('addJavascript')
<!-- penambahan jquery dataTables -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })
</script>
<!-- end penambahan -->
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    confirmDelete = function(button) {
        var url = $(button).data('url');
        swal({
            'title': 'Konfirmasi Hapus',
            'text': 'Apakah Anda yakin Inging Menghapus Data Ini?',
            'dangermode': true,
            'buttons': true
        }).then(function(value) {
            if (value) {
                window.location = url;
            }
        })
    }
</script>
@endsection
<!-- end sweetAlert -->

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<!-- <h1 class="m-0 text-dark"> Daftar Jurusan</h1> -->
                <h1><th class="m-0">Daftar Jurusan</th></h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Jurusan</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
        <!-- view tabel -->
		<div class="card">
            <!-- tombol akase halaman create pada jurusan -->
            <div class="card-header text-right">
                <a href="{{ route('createJurusan') }}" class="btn btn-success" role="button"><i class="nav-icon fa fa-plus"></i>Tambah jurusan</a>
            </div>
            <!-- end tombol akses halaman -->
            <div class="card-body">
                <table class="table table-hover table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama Jurusan</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- bentuk statis -->
                        <!-- <tr>
                            <td>1</td>
                            <td>RPL</td>
                            <td>Rekayasa Perangkat Lunak</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" role="button">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" role="button">Hapus</a>
                            </td>
                        </tr> -->
                        <!-- end bentuk statis -->
                        <!-- ----------------------------- -->
                        <!-- bentuk dinamis -->
                        @foreach ($jurusans as $jurusan)
                        <tr>
                            <td class="text-center">{{$loop->index + 1 }}</td>
                            <td>{{ $jurusan->nama }}</td>
                            <td>{{$jurusan->deskripsi }}</td>
                            <td class="text-center">
                                <a href="{{route('editJurusan', ['id' => $jurusan->id])}}" class="btn btn-warning btn-sm text-white" role="button"><i class="nav-icon fa fa-edit"></i>Update</a>
                                <!-- <a href="{{ route('deleteJurusan', ['id' => $jurusan->id])}}" class="btn btn-danger btn-sm" role="button">Hapus</a> -->
                                <a onclick="confirmDelete(this)" data-url="{{ route('deleteJurusan', ['id' => $jurusan->id]) }}" class="btn btn-danger btn-sm text-white" role="button"><i class="nav-icon fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- end bentuk dinamis -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end view tabel -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection