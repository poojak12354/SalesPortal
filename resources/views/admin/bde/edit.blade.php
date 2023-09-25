@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>UPDATE <span class="wscl">BDE PROFILE</span></h4>
                </div>
                <div class="card-body wssi">
                    <h4 class="card-title"></h4>
                    <form action="{{ url('admin/update-bde/' . $bde->id) }}" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_name">Name</label>
                                    <input type="text" class="form-control" id="user_name" placeholder="Username"
                                        name="name" value="{{ $bde->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_email">Email address</label>
                                    <input type="email" class="form-control" id="user_email" placeholder="Email"
                                        name="email" value="{{ $bde->email }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_target">Buisness Target</label>
                            <input type="text" class="form-control" id="user_target" placeholder="Target" name="target"
                                value="{{ $bde->budget }}">
                            @error('target')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn  me-2 wssb">UPDATE</button>
                    </form>
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
