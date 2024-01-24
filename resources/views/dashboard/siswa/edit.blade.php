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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Input Siswa Baru</h4>
                                    @foreach ($dataSiswa as $dasis)
                                        <form class="forms-sample" action="/siswa/update" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $dasis->id }}">
                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input type="text" class="form-control" name="nis" placeholder="NIS"
                                                    value="{{ $dasis->nis }}">
                                                @error('nis')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Nama Lengkap" value="{{ $dasis->name }}">
                                                @error('name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="kelas" class="form-control">
                                                    @if ($dasis->kelas_id == '')
                                                        <option value="">- Pilih Walas -</option>
                                                    @endif
                                                    @foreach ($dataKelas as $kelas)
                                                        @if ($dasis->kelas_id == $kelas->id)
                                                            <option value="{{ $kelas->id }}" selected>
                                                                {{ $kelas->kelas }}</option>
                                                        @else
                                                            <option value="{{ $kelas->id }}">
                                                                {{ $kelas->kelas }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('kelas')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>

                                                @if ($dasis->jenkel == 'P')
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="L"> Laki-laki </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="P" checked> Perempuan </label>
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="L" checked> Laki-laki </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="P"> Perempuan </label>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <select name="jurusan" class="form-control">
                                                    @if ($dasis->jurusan_id == '')
                                                        <option value="">- Pilih Jurusan -</option>
                                                    @endif
                                                    @foreach ($dataJurusan as $jurusan)
                                                        @if ($dasis->jurusan_id == $jurusan->id)
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
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        </form>
                                    @endforeach
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
