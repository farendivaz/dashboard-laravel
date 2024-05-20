<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    @include('Template.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar kepala -->
        @include('Template.navbar')
        <!-- Left navbar links -->
        @include('Template.leftnavbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Service</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Service</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3>Tambah Data Service</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('service.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="kode_service">Kode Service</label>
                                <input type="text" name="kode_service" class="form-control" id="kode_service"
                                    placeholder="Masukan Kode service">
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('kode_service'))
                                    <span class="text-danger">{{ $errors->first('kode_service') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tanggal_service">Tanggal Service</label>
                                <input type="date" id="tanggal_service" name="tanggal_service" min="1970-01-01"
                                    class="form-control" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('tanggal_service'))
                                    <span class="text-danger">{{ $errors->first('tanggal_service') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kode_sparepart">Kode Sparepart</label>
                                <input type="text" id="kode_sparepart" name="kode_sparepart" class="form-control"
                                    placeholder="Masukan Kode Sparepart" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('kode_sparepart'))
                                    <span class="text-danger">{{ $errors->first('kode_sparepart') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_customer">Nama Customer</label>
                                <input type="text" name="nama_customer" class="form-control" id="nama_customer"
                                    placeholder="Masukan Nama Customer">
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('nama_customer'))
                                    <span class="text-danger">{{ $errors->first('nama_customer') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_employee">Nama Employee</label>
                                <input type="text" name="nama_employee" class="form-control" id="nama_employee"
                                    placeholder="Masukan Nama Employee">
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('nama_employee'))
                                    <span class="text-danger">{{ $errors->first('nama_employee') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        @include('Template.footer')
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        @include('Template.script')
</body>

</html>
