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
                                    <h4 class="card-title">Input Jurusan</h4>
                                    @foreach ($jurusan as $j)
                                        <form class="forms-sample" action="/jurusan/update" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $j->id }}">
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <input type="text"
                                                    class="form-control @error('nama_jurusan') is-invalid @enderror"
                                                    name="nama_jurusan" value="{{ $j->nama_jurusan }}">
                                                @error('nama_jurusan')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- DATA MAPEL  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Jurusan</h4>
                                    <div class="table-responsive">
                                        <table class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Jurusan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataJurusan as $jurusan)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $jurusan->nama_jurusan }}</td>
                                                        <td>
                                                            <a href="/jurusan/edit/{{ $jurusan->id }}"
                                                                class="badge badge-warning">Edit</a>
                                                            <a href="/jurusan/hapus/{{ $jurusan->id }}"
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
