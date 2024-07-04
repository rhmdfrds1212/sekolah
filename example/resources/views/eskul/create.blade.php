@extends('layout.main')

@section('title','TAMBAH EKSTRAKULIKULER')
    
@section('content')
<div class="card">
    <div class="card-body">
      <h3 class="text-center">Form Tambah EKSTRAKULIKULER</h3>
      <!-- Vertical Form -->
      <form class="row g-3" method="POST" action="{{ route('eskul.store') }}">
        @csrf
        <div class="col-12 ">
          <label for="kode_eskul" class="form-label">Kode Eskul</label>
          <input type="text" class="form-control" id="kode_eskul" name="kode_eskul" placeholder="Masukan Kode Eskul">
          @error('kode_eskul')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-12 ">
          <label for="nama" class="form-label">Nama Eskul</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Eskul">
          @error('nama')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-12 ">
          <label for="pelatih" class="form-label">Pelatih Eskul</label>
          <input type="text" class="form-control" id="pelatih" name="pelatih" placeholder="Masukan Pelatih Eskul">
          @error('pelatih')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-12 ">
          <label for="tanggal_resmi" class="form-label">Tanggal Resmi</label>
          <input type="date" class="form-control" id="tanggal_resmi" name="tanggal_resmi" placeholder="Masukan Tanggal Resmi">
          @error('tanggal_resmi')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('eskul') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection