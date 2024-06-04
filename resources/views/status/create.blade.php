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
                            <h1>Data Status</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Status</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3>Tambah Data Status</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('status.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="kode_status">Kode Status</label>
                                <input type="text" name="kode_status" class="form-control" id="kode_status"
                                    placeholder="Masukan Kode Status">
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('kode_status'))
                                    <span class="text-danger">{{ $errors->first('kode_status') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kerusakan">Kerusakan</label>
                                <input type="text" id="kerusakan" name="kerusakan" min="1970-01-01"
                                    class="form-control" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('kerusakan'))
                                    <span class="text-danger">{{ $errors->first('kerusakan') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" name="status" min="1970-01-01"
                                    class="form-control" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kode_service">Pilih Kode Service</label>
                                <select id="kode_service" name="kode_service" class="form-control">
                                    <option value="" selected disabled>Pilih Kode Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->kode_service }}">{{ $service->kode_service }}
                                        </option>
                                    @endforeach
                                </select>
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
