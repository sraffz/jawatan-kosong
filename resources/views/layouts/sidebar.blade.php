<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('Halaman-utama') }}">
            <img src="{{ asset('images/kelantan-jata.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Jawatan Kosong SUK</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mb-2 mt-0">
                <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white {{ $page == 'Profil' ? ' active' : '' }}" aria-controls="ProfileNav"
                    role="button" aria-expanded="false">
                    <img src="{{ asset('material/img/team-3.jpg') }}" class="avatar">
                    <span class="nav-link-text ms-2 ps-1">{{ Auth::user()->nama }}</span>
                </a>
                <div class="collapse {{ $page == 'Profil' || $page == 'Tetapan' ? ' show' : '' }}" id="ProfileNav" style="">
                    <ul class="nav ">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $page == 'Profil' ? ' active bg-gradient-success' : '' }}" href="{{ route('profil') }}">
                                <span class="sidenav-mini-icon"> MP </span>
                                <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white  {{ $page == 'Tetapan' ? ' active bg-gradient-success' : '' }}" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal  ms-3  ps-1"> Tetapan </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <a class="nav-link text-white " href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <span class="sidenav-mini-icon"> L </span>
                                <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <hr class="horizontal light mt-0">
            <li class="nav-item">
                <a class="nav-link text-white {{ $page == 'Halaman Utama' ? ' active bg-gradient-success' : '' }}"
                    href="{{ url('Halaman-utama') }}">
                    <i class="material-icons-round opacity-10">dashboard</i>
                    <span class="nav-link-text ms-2 ps-1">Halaman Utama</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $page == 'Iklan Jawatan Kosong' ? ' active bg-gradient-success' : '' }}"
                    href="{{ url('iklan') }}">
                    <span class="sidenav-mini-icon"> I </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Iklan Jawatan </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $page == 'Konfigurasi' ? ' active bg-gradient-success' : '' }}"
                    href="{{ url('konfigurasi') }}">
                    <span class="sidenav-mini-icon"> M </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Maklumat Diri </span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#education" class="nav-link text-white {{ $page == 'Profil' ? ' active' : '' }}" aria-controls="education"
                    role="button" aria-expanded="false">
                    <span class="sidenav-mini-icon"> A </span>
                    <span class="nav-link-text ms-2 ps-1">Maklumat Akademik</span>
                </a>
                <div class="collapse {{ $page == 'Profil' || $page == 'Tetapan' ? ' show' : '' }}" id="education" style="">
                    <ul class="nav ">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $page == 'Profil' ? ' active bg-gradient-success' : '' }}" href="{{ route('profil') }}">
                                <span class="sidenav-mini-icon"> PT </span>
                                <span class="sidenav-normal  ms-3  ps-1"> PT3 / PMR / SRP </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> SP </span>
                                <span class="sidenav-normal  ms-3  ps-1"> SPM / SPMV </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> SU </span>
                                <span class="sidenav-normal  ms-3  ps-1"> SPM ULANGAN </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> SV </span>
                                <span class="sidenav-normal  ms-3  ps-1"> SVM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> SK </span>
                                <span class="sidenav-normal  ms-3  ps-1"> SKM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> STP </span>
                                <span class="sidenav-normal  ms-3  ps-1"> STPM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> STM </span>
                                <span class="sidenav-normal  ms-3  ps-1"> STAM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> M </span>
                                <span class="sidenav-normal  ms-3  ps-1"> SIJIL MATRIKULASI </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('tetapan') }}">
                                <span class="sidenav-mini-icon"> PT </span>
                                <span class="sidenav-normal  ms-3  ps-1"> PENGAJIAN TINGGI </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $page == 'Konfigurasi' ? ' active bg-gradient-success' : '' }}"
                    href="{{ url('konfigurasi') }}">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Pengalaman </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $page == 'Konfigurasi' ? ' active bg-gradient-success' : '' }}"
                    href="{{ url('konfigurasi') }}">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Pengesahan </span>
                </a>
            </li>


    {{-- @include('layouts.admin.sidebar22') --}}
    </div>
</aside>
