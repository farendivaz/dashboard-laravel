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
                            <h1>Data Sparepart</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sparepart</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3>Tambah Data Sparepart</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('sparepart.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="kode_sparepart">Kode Barang</label>
                                <input type="text" name="kode_sparepart" class="form-control" id="kode_sparepart"
                                    placeholder="Masukan Kode Barang">
                                <!-- Display warning message below email input -->
                                @if ($errors->has('kode_sparepart'))
                                    <span class="text-danger">{{ $errors->first('kode_sparepart') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Barang</label>
                                <input type="text" name="jenis" class="form-control" id="jenis"
                                    placeholder="Masukan Jenis Barang">
                                <!-- Display warning message below jenis barang input -->
                                @if ($errors->has('jenis'))
                                    <span class="text-danger">{{ $errors->first('jenis') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="brand">Nama Brand</label>
                                <input type="text" name="brand" class="form-control" id="brand"
                                    placeholder="Masukan Nama Brand">
                                <!-- Display warning message below brand barang input -->
                                @if ($errors->has('brand'))
                                    <span class="text-danger">{{ $errors->first('brand') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga"
                                    placeholder="Masukkan Harga Barang">
                                <!-- Display warning message below harga input -->
                                @if ($errors->has('harga'))
                                    <span class="text-danger">{{ $errors->first('harga') }}</span>
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
