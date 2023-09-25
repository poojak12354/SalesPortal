@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>UPDATE <span class="wscl">UPWORK PROFILE</span></h4>
                </div>
                <div class="card-body wssi">
                    <h4 class="card-title"></h4>
                    <form method="POST" action="{{ url('admin/update-upwork/' . $upwork->id) }}" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="profile_name">Upwork Profile Name</label>
                            <input type="text" class="form-control" id="profile_name" name="up_name"
                                value="{{ $upwork->name }}">
                            @error('up_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="profile_link">Upwork File Link</label>
                            <textarea class="form-control" id="profile_link" rows="4" name="up_link">{{ $upwork->profile_link }}</textarea>
                            @error('up_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn  wssb me-2">UPDATE PROFILE</button>

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
