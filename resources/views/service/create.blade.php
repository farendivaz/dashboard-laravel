<!DOCTYPE html>

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
                        <form action="{{ route('service.store') }}" method="POST">
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
                                <select id="kode_sparepart" name="kode_sparepart" class="form-control">
                                    <option value="" selected disabled>Pilih Kode Sparepart</option>
                                    @foreach ($spareparts as $sparepart)
                                        <option value="{{ $sparepart->kode_sparepart }}">
                                            {{ $sparepart->kode_sparepart }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="customer_id">Pilih Customer</label>
                                <select id="customer_id" name="customer_id" class="form-control">
                                    <option value="" selected disabled>Pilih Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Pilih Employee</label>
                                <select id="employee_id" name="employee_id" class="form-control">
                                    <option value="" selected disabled>Pilih Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_customer">Nama Customer</label>
                                <input type="text" name="nama_customer" class="form-control" id="nama_customer">
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('nama_customer'))
                                    <span class="text-danger">{{ $errors->first('nama_customer') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email_customer">Email Customer</label>
                                <input type="email" name="email_customer" class="form-control" id="email_customer">
                                <!-- Display warning message below nama input -->
                                @if ($errors->has('email_customer'))
                                    <span class="text-danger">{{ $errors->first('email_customer') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_employee">Nama Employee</label>
                                <input type="text" name="nama_employee" class="form-control" id="nama_employee">
                                @if ($errors->has('nama_employee'))
                                    <span class="text-danger">{{ $errors->first('nama_employee') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email_employee">Email Employee</label>
                                <input type="email" name="email_employee" class="form-control" id="email_employee">
                                @if ($errors->has('email_employee'))
                                    <span class="text-danger">{{ $errors->first('email_employee') }}</span>
                                @endif
                            </div>
                            <button type="submit">Submit</button>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#customer_id').change(function() {
                    var customerId = $(this).val();
                    if (customerId) {
                        $.ajax({
                            url: '/services/customer/' + customerId,
                            method: 'GET',
                            success: function(data) {
                                $('#nama_customer').val(data.nama);
                                $('#email_customer').val(data.email);
                            }
                        });
                    }
                });

                $('#employee_id').change(function() {
                    var employeeId = $(this).val();
                    if (employeeId) {
                        $.ajax({
                            url: '/services/employee/' + employeeId,
                            method: 'GET',
                            success: function(data) {
                                $('#nama_employee').val(data.nama);
                                $('#email_employee').val(data.email);
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>
