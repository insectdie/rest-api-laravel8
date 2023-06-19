@extends('layouts.main')

@section('container')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Customer</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">DataTable with default features</h3> -->
            <a class="btn btn-success" href="/create">
              <i class="fas fa-plus mr-1"></i>
              Tambah Customer Baru
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
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Telepon</th>
                  <th>Kewarganegaraan</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($customers as $customer)
                  <tr id="{{ $customer->cst_id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->cst_name }}</td>
                    <td>{{ $customer->cst_dob }}</td>
                    <td>{{ $customer->cst_phone_num }}</td>
                    <td>{{ $customer->nationality_name." (".$customer->nationality_code.")" }}</td>
                    <td>{{ $customer->cst_email }}</td>
                    <td>
                      <!-- <form class="form-delete""> -->
                      <div class="d-flex">
                        <a class="btn btn-success m-1" href="/customer/{{$customer->cst_id}}/family">
                          Keluarga
                        </a>
                        <a class="btn btn-primary m-1" href="/customer/{{$customer->cst_id}}/edit">
                          Edit
                        </a>

                        <form method="post" action="/customer/{{$customer->cst_id}}/delete"> 
                          @method('delete')
                          @csrf
                          <input id ="cst_id" name="cst_id" value="{{$customer->cst_id}}" hidden>
                          <button class="btn btn-danger m-1 delete-btn " onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                      </div>
                      <!-- </form> -->
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






