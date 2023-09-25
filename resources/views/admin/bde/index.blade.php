@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show"><button type="button" class="btn-close"
                                data-bs-dismiss="alert"></button>{{ session('message') }}</div>
                    @endif
                    <h4 class="card-title">
                        <a href="{{ url('admin/add-bde') }}" class="btn btn-block btn-lg mt-4 wssb">+ ADD
                            BDE
                            PROFILE</a>
                    </h4>
                    </p>
                    <table class="table table-hover alltable" id="bde">
                        <thead>
                            <tr>
                                <th class="fw-bolder">#</th>
                                <th class="fw-bolder">NAME</th>
                                <th class="fw-bolder">EMAIL</th>
                                <th class="fw-bolder">TARGET</th>
                                <th class="fw-bolder">EDIT</th>
                                <th class="fw-bolder">DELETE</th>
                                <th class="fw-bolder">LOGIN STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($bde as $item)
                                @if ($item->role_as == '1')
                                @else
                                    <tr class="upusers">
                                        <td class="fw-bolder">{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->budget }}</td>
                                        <td>
                                            <a href="{{ url('admin/edit-bde/' . $item->id) }}"><i
                                                    class="mdi mdi-pencil menu-icon"></i></a>
                                        </td>
                                        <td>
                                            <button type="button" value="{{ $item->id }}" class=" deletebtn"><i
                                                    class="mdi mdi-delete code"></i></button>
                                        </td>
                                        <td>
                                            <input type="hidden" class="login_status" value="{{ $item->login_status }}"
                                                id="login_status">
                                            <button class="py-2 px-3  edit_status" value="{{ $item->id }}"
                                                id="edit" title="Active/Inactive"><i
                                                    class="mdi mdi-thumb-{{ $item->login_status == 0 ? 'up' : 'down' }}"></i></button>
                                        </td>
                                @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                <form action="{{ url('admin/delete-bde') }}" method="POST">
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

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
