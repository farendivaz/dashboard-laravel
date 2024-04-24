<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Tentang toko Halaman -->

    <a href="{{ asset('InfoPage/DataCell') }}" class="brand-link">
        <img src="{{ asset('gambar/kucing.jpeg') }}" width="80" height="80" alt="Data Cell Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SISDC</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- NANTI PANGGIL USER DISINI -->
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ asset('') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Daftar Biodata
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('customers') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('employees') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Karyawan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Service
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('InfoPage/StatusService') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Status Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('InfoPage/InformasiService') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('InfoPage/InformasiSparepart') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi Sparepart</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
