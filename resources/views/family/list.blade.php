@extends('layouts.main')

@section('container')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Keluarga</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">

    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">{{$customer->cst_name}}</h5>
            <p class="card-text">{{$customer->cst_email}}</p>
            <a href="/" class="btn btn-primary">Go To Customer</a>
        </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">DataTable with default features</h3> -->
            <a class="btn btn-success" href="/customer/{{$customer->cst_id}}/family/create">
              <i class="fas fa-plus mr-1"></i>
              Tambah Keluarga
            </a>
          </div>
          @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabel-mahasiswa" class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Relasi</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($families as $family)
                  <tr id="{{ $family->fl_id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $family->fl_relation }}</td>
                    <td>{{ $family->fl_name }}</td>
                    <td>{{ $family->fl_dob }}</td>
                    <td>
                        <form method="post" action="/customer/{{$customer->cst_id}}/family/{{$family->fl_id}}/delete">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger m-1 delete-btn " onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


</div> 

@endsection






