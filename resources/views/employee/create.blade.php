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
                            <h1>Data Employee</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Employee</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3>Tambah Data Employee</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Masukan Email">
                                <!-- Display warning message below email input -->
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Employee</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Masukan Nama">
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="notelp">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" min="1970-01-01"
                                    class="form-control" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="notelp">Nomor Telepon</label>
                                <input type="int" name="notelp" class="form-control" id="notelp"
                                    placeholder="08">
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('notelp'))
                                    <span class="text-danger">{{ $errors->first('notelp') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat"></textarea>
                                <!-- Display warning message below alamat input -->
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
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
