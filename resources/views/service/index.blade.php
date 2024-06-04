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
                        <div class="card-tools">
                            <a href="/services/create" class="btn btn-success">Tambah Data <i
                                    class="fas fa-plus-square"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Kode service</th>
                                <th>Tanggal Service</th>
                                <th>Kode Sparepart</th>
                                <th>Nama Customer</th>
                                <th>Email Customer</th>
                                <th>Nama Employee</th>
                                <th>Email Employee</th>
                            </tr>

                            @forelse ($services as $service)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $service->kode_service }}</td>
                                    <td>{{ $service->tanggal_service }}</td>
                                    <td>{{ $service->kode_sparepart }}</td>
                                    <td>{{ $service->nama_customer }}</td>
                                    <td>{{ $service->email_customer }}</td>
                                    <td>{{ $service->nama_employee }}</td>
                                    <td>{{ $service->email_employee }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-info btn-sm mr-2"
                                            href="{{ route('service.edit', $service->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td>
                                        No data available
                                    </td>
                                </tr>
                            @endforelse
                        </table>
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
