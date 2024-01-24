@extends('template.index')
@section('dashboard')
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
                    @if (Auth::user()->jabatan == 'admin')
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon icon-box-success">
                                                <span class="mdi mdi-account icon-item"></span>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <h3>Guru : {{ $guru }} </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon icon-box-success">
                                                <span class="mdi mdi-account icon-item"></span>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <h3>Walas : {{ $walas }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon icon-box-success">
                                                <span class="mdi mdi-account icon-item"></span>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <h3>Siswa : {{$siswa}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @include('layouts.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
