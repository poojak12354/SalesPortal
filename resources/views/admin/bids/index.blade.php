@extends('layouts.master')
@section('content')
    <div class="row">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    </p>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="showbids/0" style="text-decoration: none">
                                <div class="card bg-gradient-danger card-img-holder text-white"
                                    style="min-height:146px; min-width:200px;">
                                    <div class="card-body">
                                        <img src="{{ url('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                                            alt="circle-image" />
                                        <h4 class="fw-light fst-italic">All bids</h4>
                                        <h6 class="card-text">Bids in this month:
                                            {{ $wordCount }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @foreach ($user as $item)
                            @if ($item->role_as == 0)
                                <div class="col-md-3 mb-3">
                                    <a href="showbids/{{ $item->id }}" style="text-decoration: none">
                                        <div class="card wss card-img-holder text-white"
                                            style="min-height:146px; min-width:200px;">
                                            <div class="card-body">
                                                <img src="{{ url('assets/images/dashboard/circle.svg') }}"
                                                    class="card-img-absolute" alt="circle-image" />
                                                <h4 class="fw-light">{{ $item->name }}</h4>
                                                <h6 class="card-text">
                                                    {{-- @foreach ($data as $dd) --}}
                                                    @foreach ($a as $key => $value)
                                                        @if ($item->id == $key)
                                                            Bids in this month: {{ $value }}
                                                        @endif
                                                    @endforeach
                                                    {{-- @endforeach --}}
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
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
