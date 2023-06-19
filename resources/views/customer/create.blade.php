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
    <div class="row mb-2">
      <div class="col-sm-6">
      <a class="btn btn-danger" href="/">
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
          <form role="form" method="post" action="/store">
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
                    <label for="exampleFormControlTextarea1" class="form-label">Tanggal Lahir</label>
                    <input id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" type="date" value="{{ old('dob') }}" />
                    @error('dob')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="number" name="phone_num" class="form-control @error('phone_num') is-invalid @enderror" id="phone_num" placeholder="Nomor HP" maxlength="20" value="{{ old('phone_num') }}" >
                    @error('phone_num')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Kewarganegaraan</label>
                    <select name="kewarganegaraan_id" id="kewarganegaraan_id" class="form-control @error('kewarganegaraan_id') is-invalid @enderror select-kewarganegaraan" style="width: 100%;">
                      <option value="" selected disabled>Pilih Kewarganegaraan</option>
                        @foreach ($nationalities as $nationality) 
                          @if (old('kewarganegaraan_id') == $nationality->nationality_id)
                            <option value="<?= $nationality->nationality_id ?>" selected>{{ $nationality->nationality_name }} ({{ $nationality->nationality_code }})</option>
                          @else
                            <option value="<?= $nationality->nationality_id ?>">{{ $nationality->nationality_name }} ({{ $nationality->nationality_code }})</option>
                          @endif
                        @endforeach
                    </select>
                    @error('kewarganegaraan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" maxlength="50" value="{{ old('email') }}">
                    @error('email')
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
