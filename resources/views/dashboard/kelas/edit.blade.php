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
                    {{-- INPUT KELAS --}}
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Input Kelas</h4>
                                    @foreach ($kelasEdit as $k)
                                        <form class="forms-sample" action="/kelas/update" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $k->id }}">
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <input type="text" class="form-control" name="kelas"
                                                    value="{{ $k->kelas }}">
                                                @error('kelas')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <select name="jurusan" class="form-control">
                                                    @if ($k->jurusan_id == '')
                                                        <option value="">- Pilih Jurusan -</option>
                                                    @endif
                                                    @foreach ($dataJurusan as $jurusan)
                                                        @if ($k->jurusan_id == $jurusan->id)
                                                            <option value="{{ $jurusan->id }}" selected>
                                                                {{ $jurusan->nama_jurusan }}</option>
                                                        @else
                                                            <option value="{{ $jurusan->id }}">
                                                                {{ $jurusan->nama_jurusan }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('jurusan')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Walas</label>
                                                <select name="walas" class="form-control">
                                                    @if ($k->user_id == '')
                                                        <option value="">- Pilih Walas -</option>
                                                    @endif
                                                    @foreach ($dataWalas as $walas)
                                                        @if ($k->user_id == $walas->id)
                                                            <option value="{{ $walas->id }}" selected>
                                                                {{ $walas->name }}</option>
                                                        @else
                                                            <option value="{{ $walas->id }}">
                                                                {{ $walas->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('walas')
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

                    {{-- DATA KELAS  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Kelas</h4>
                                    <div class="table-responsive">
                                        <table class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Walas</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataKelas as $kelas)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $kelas->kelas }}</td>
                                                        <td>{{ $kelas->nama_jurusan }}</td>
                                                        <td>{{ $kelas->name }}</td>
                                                        <td>
                                                            <a href="/kelas/edit/{{ $kelas->id }}"
                                                                class="badge badge-warning">Edit</a>
                                                            <a href="/kelas/hapus/{{ $kelas->id }}"
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
