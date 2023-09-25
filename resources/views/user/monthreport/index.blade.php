@extends('layouts.usermaster')
@section('content')
    <div class="row">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ url('user/finalbid') }}" class="btn btn-block btn-lg  mt-4 wssb">
                            Back
                        </a>
                    </h4>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover alltable" id="myTable1">
                            <thead>
                                <tr>
                                    <th class="fw-bold">#</th>
                                    <th class="fw-bold">client Name</th>
                                    <th class="fw-bold">Upwork Id</th>
                                    <th class="fw-bold">Total Buisness</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($mnthre as $item)
                                    @if ($item->userid == $userid and $item->user_mnthf_id == $idi)
                                        @if ($item->total_bus > 0)
                                            <tr class="upusers">
                                                <td class="fw-bolder">{{ $i++ }}</td>
                                                <td>{{ $item->client_name }}</td>
                                                <td>{{ $item->up_id }}</td>
                                                <td>{{ $item->total_bus }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
@endsection
