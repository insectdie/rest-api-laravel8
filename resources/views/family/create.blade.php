@extends('layouts.main')

@section('container')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Keluarga {{$customer->cst_name}}</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
      <a class="btn btn-danger" href="/customer/{{$customer->cst_id}}/family">
          <i class="fas fa-times mr-1"></i>
          Cancel
        </a>
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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="/customer/{{$customer->cst_id}}/family/store">
            @csrf
            <div class="card-body">
             
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" maxlength="50" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Relasi</label>
                    <input name="relasi" class="form-control @error('relasi') is-invalid @enderror" id="relasi" placeholder="Relasi / Hubungan" maxlength="50" value="{{ old('relasi') }}" >
                    @error('relasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Tanggal Lahir</label>
                    <input id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" type="date" value="{{ old('dob') }}" />
                    @error('dob')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  @endsection
