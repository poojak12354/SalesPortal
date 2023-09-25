@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>CREATE <span class="wscl">BDE PROFILE</span></h4>
                </div>
                <div class="card-body wssi">
                    <h4 class="card-title"></h4>
                    <form class="{{ url('admin/add-bde') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_name">Name</label>
                                    <input type="text" class="form-control" id="user_name" name="name"
                                        value="{{ old('name') }}" autocomplete="false">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_email">Email address</label>
                                    <input type="email" class="form-control" id="user_email" name="email"
                                        value="{{ old('email') }}" autocomplete="false">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_password">Password</label>
                                    <input id="password" type="password" class="form-control" id="user_password"
                                        name="pwd" value="{{ old('pwd') }}" autocomplete="false">
                                    @error('pwd')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_confirm_password">Re-enter Password</label>
                                    <input id="user_confirm_password" type="password" class="form-control"
                                        name="pwd_confirmation" autocomplete="false" value="{{ old('pwd_confirmation') }}">
                                    @error('pwd_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_target">Buisness Target</label>
                            <input id="password" type="text" class="form-control" id="user_target" name="target"
                                value="{{ old('target') }}" autocomplete="false">
                            @error('target')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn  me-2 wssb">CREATE</button>
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
