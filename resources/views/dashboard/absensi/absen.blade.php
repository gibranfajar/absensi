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
                                    <h4 class="card-title">Input Absensi</h4>
                                    

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Pilih Kelas
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($kelas as $kel)
                                                <li><a class="dropdown-item" href="/data-absen/data/search/{{$kel->id}}">{{$kel->kelas}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>


                                    <div class="table-responsive">
                                        <table class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Kelas</th>
                                                    <th>Absen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataSiswa as $data)     
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->kelas}}</td>
                                                        <td>
                                                            @if ($data->status_kehadiran == 1)
                                                                <span class="badge badge-success">HADIR</span>
                                                            @elseif($data->status_kehadiran == 2)
                                                                <span class="badge badge-warning">Izin</span>
                                                            @else
                                                                <span class="badge badge-danger">Alfa</span>
                                                            @endif
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
