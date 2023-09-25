@extends('layouts.usermaster')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <h4 class="card-title">
                        <a href="{{ url('user/download-report') }}" class="btn btn-block btn-lg  mt-4 wssb">+
                            ADD
                            MONTHLY REPORT
                        </a>
                    </h4>
                    </p>
                    <div class="table-responsive alltable">
                        <table class="table table-hover" id="myTable2">
                            <thead>
                                <tr>
                                    <th class="fw-bolder">#</th>
                                    <th class="fw-bolder">client Name</th>
                                    <th class="fw-bolder">Month Report</th>
                                    <th class="fw-bolder">Target</th>
                                    <th class="fw-bolder">Sale</th>
                                    <th class="fw-bolder">View</th>
                                    <th class="fw-bolder"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach ($mnthre as $item)
                                    @if ($item->userid == $userid)
                                        <tr class="upusers">
                                            <td class="fw-bolder">{{ $i++ }}</td>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>{{ $item->month_name }}</td>
                                            <td>{{ $item->bus_target }}</td>
                                            <td>{{ $item->total_bus }}</td>
                                            <td><a href="{{ url('user/month-report/' . $item->id) }}"><i
                                                        class="mdi mdi-eye menu-icon"></i></a></td>
                                            @if ($item->verify_report == 0)
                                                <td><button type="button" value="{{ $item->id }}" class=" deletebtn"><i
                                                            class="mdi mdi-delete code"></i></button></td>
                                            @endif

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delele --}}
    <div class="modal" id="DeleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('user/delete-finalreport') }}" method="POST">
                    <div class="modal-body">

                        @csrf
                        @method('Get')
                        <input type="hidden" id="deleteing_id" name="delete_stud_id">
                        <h3 class="modal-title w-100 text-center">Are you sure?</h3>
                        <p class="text-center">Do you really want to delete these records? This process cannot be undone.
                        </p>

                    </div>
                    <div class=" modal-footer justify-content-center">
                        <button type="submit" class="btn wssb">Yes</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Delete --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
