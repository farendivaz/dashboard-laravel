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
                            <h1>Data status</h1>
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
                        <h3>Edit Data Status</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('status.update', ['status' => $status]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="kode_status">Kode Status</label>
                                <input type="text" name="kode_status" class="form-control" id="kode_status"
                                    value={{ $status->kode_status }} placeholder="Masukan Kode Status" disabled>
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('kode_status'))
                                    <span class="text-danger">{{ $errors->first('kode_status') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kerusakan">Kerusakan</label>
                                <input type="text" id="kerusakan" name="kerusakan" value={{ $status->kerusakan }}
                                    placeholder="Masukan Kerusakan" class="form-control" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('kerusakan'))
                                    <span class="text-danger">{{ $errors->first('kerusakan') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" name="status" value={{ $status->status }}
                                    placeholder="Masukan Status" class="form-control" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kode_service">Kode Service</label>
                                <input type="text" id="kode_service" name="kode_service"
                                    value={{ $status->kode_service }} placeholder="Masukan Kode Service"
                                    class="form-control" />
                                <!-- Display warning message below notelp input -->
                                @if ($errors->has('kode_service'))
                                    <span class="text-danger">{{ $errors->first('kode_service') }}</span>
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
