@extends('template.index')
@section('gurutambah')
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.navbar')
            <!-- partial -->


            <div class="main-panel">
                <div class="content-wrapper">
                    {{-- INPUT MAPEL --}}
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Input Mapel</h4>
                                    <form class="forms-sample" action="/mapel/tambah" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Kode Mapel</label>
                                            <input type="text"
                                                class="form-control @error('kode_mapel') is-invalid @enderror"
                                                name="kode_mapel">
                                            @error('kode_mapel')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Mapel</label>
                                            <input type="text"
                                                class="form-control @error('nama_mapel') is-invalid @enderror"
                                                name="nama_mapel">
                                            @error('nama_mapel')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Guru</label>
                                            <select name="guru" class="form-control @error('guru') is-invalid @enderror">
                                                <option value="">- Pilih Guru -</option>
                                                @foreach ($dataGuru as $guru)
                                                    <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('guru')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- DATA MAPEL  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Mapel</h4>
                                    <div class="table-responsive">
                                        <table class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Mapel</th>
                                                    <th>Nama Mapel</th>
                                                    <th>Guru Pengajar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataMapel as $mapel)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $mapel->kode_mapel }}</td>
                                                        <td>{{ $mapel->nama_mapel }}</td>
                                                        <td>{{ $mapel->name }}</td>
                                                        <td>
                                                            <a href="/mapel/edit/{{ $mapel->id }}"
                                                                class="badge badge-warning">Edit</a>
                                                            <a href="/mapel/hapus/{{ $mapel->id }}"
                                                                class="badge badge-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
