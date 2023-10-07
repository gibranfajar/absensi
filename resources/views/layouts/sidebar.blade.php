<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('images/logo.svg') }}"
                alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo-mini.svg') }}"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('images/faces/face15.jpg') }}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        {{-- <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5> --}}
                        {{-- <span>{{ Auth::user()->jabatan }}</span> --}}
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- @if (Auth::user()->jabatan == 'admin') --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#guru">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Guru</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="guru">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/guru/tambah">Tambah Data</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/guru/data">Data Guru</a></li>
                </ul>
            </div>
        </li>
        {{-- @endif --}}

        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#siswa">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Siswa</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="siswa">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/siswa/tambah">Tambah Data</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/siswa/data">Data Siswa</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="/mapel">
                <span class="menu-icon">
                    <i class="mdi mdi-clipboard-text"></i>
                </span>
                <span class="menu-title">Mapel</span>
            </a>
        </li>

        {{-- @if (Auth::user()->jabatan == 'admin') --}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="/kelas">
                <span class="menu-icon">
                    <i class="mdi mdi-source-branch"></i>
                </span>
                <span class="menu-title">Kelas</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="/jurusan">
                <span class="menu-icon">
                    <i class="mdi mdi-arrange-send-backward"></i>
                </span>
                <span class="menu-title">Jurusan</span>
            </a>
        </li>
        {{-- @endif --}}

        <li class="nav-item menu-items">
            <a class="nav-link" href="/absensi">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Absensi</span>
            </a>
        </li>
    </ul>
</nav>
