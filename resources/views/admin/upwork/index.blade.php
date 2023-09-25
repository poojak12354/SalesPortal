@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <h4 class="card-title">
                        <a href="{{ url('admin/add-upwork') }}" class="btn btn-block btn-lg  wssb mt-4">+
                            ADD
                            UPWORK PROFILE</a>
                    </h4>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover alltable" id="upworkTable">
                            <thead>
                                <tr>
                                    <th class="fw-bolder">#</th>
                                    <th class="fw-bolder">NAME</th>
                                    <th class="fw-bolder">PROFILE LINK</th>
                                    <th class="fw-bolder">EDIT</th>
                                    <th class="fw-bolder">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @if (!empty($upwork) && $upwork->count())
                                    @foreach ($upwork as $item)
                                        <tr class="upusers">
                                            <td class="fw-bolder">{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><a href="{{ $item->profile_link }}" class="text-decoration-none"
                                                    target="_blank"><?php echo substr($item->profile_link, 0, 80) . '...'; ?></a></td>
                                            <td><a href="{{ url('admin/edit-upwork/' . $item->id) }}"><i
                                                        class="mdi mdi-pencil menu-icon"></i></a></td>
                                            {{-- <td><a href="{{ url('admin/delete-upwork/' . $item->id) }}"><i
                                                    class="mdi mdi-delete code"></i></a></td> --}}
                                            <td><button type="button" value="{{ $item->id }}" class=" deletebtn"><i
                                                        class="mdi mdi-delete code"></i></button></td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">No data available in table</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="text-center">

                            {{-- @if ($prevURL)
                                <a class="btn btn-primary m-10 leftbtn"
                                    href="{{ route('admin.upwork.index', $prevURL) }}"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> Previous</a>
                            @endif

                            @if ($nextURL)
                                <a class="btn btn-primary m-10 rightbtn"
                                    href="{{ route('admin.upwork.index', $nextURL) }}">Next <i class="fa fa-angle-right"
                                        aria-hidden="true"></i> </a>
                            @endif --}}

                        </div>
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
                <form action="{{ url('admin/delete-upwork') }}" method="POST">
                    <div class="modal-body">

                        @csrf
                        @method('Get')
                        <input type="hidden" id="deleteing_id" name="delete_stud_id">

                        <h3 class="modal-title w-100 text-center">Are you sure?</h3>
                        <p class="text-center">Do you really want to delete these records? This process cannot be undone.
                        </p>

                    </div>
                    <div class="modal-footer justify-content-center">
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
