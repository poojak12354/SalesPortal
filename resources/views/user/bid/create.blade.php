@extends('layouts.usermaster')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>Add <span class="wscl">Bid</span></h4>
                </div>
                <div class="card-body wssi">
                    <h4 class="card-title"></h4>
                    <form method="POST" action="{{ url('user/add-bid') }}" class="forms-sample">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bid_link">Upwork Job Link </label>
                                    <input type="text" class="form-control" id="bid_link" name="job_link"
                                        value="{{ old('job_link') }}">
                                    @error('job_link')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bid_name">Client Name</label>
                                    <input type="text" class="form-control" id="bid_name" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upwork Id</label>
                            <select class="form-select" aria-label="Default select example" name="up_id">
                                @foreach ($upwork as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('up_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <label>Status</label>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsReply"
                                                value="1" {{ old('optionsReply') == '1' ? 'checked' : '' }}>
                                            Bid
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsReply"
                                                value="2" {{ old('optionsReply') == '2' ? 'checked' : '' }}> Reply
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsReply"
                                                value="3" {{ old('optionsReply') == '3' ? 'checked' : '' }}> Hired
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('optionsReply')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col" id="otherAnswer" style="display:none;">
                                <div class="form-group">
                                    <label>Estimate Budget</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text wss text-white">$</span>
                                        </div>
                                        <input type="text" class="form-control tb4"
                                            aria-label="Amount (to the nearest dollar)" name="budget"
                                            value="{{ old('budget') }}">
                                    </div>
                                    @error('budget')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputName1">Date</label>
                                    <input type="date" class="form-control" id="date" name="up_date"
                                        onfocus="this.showPicker()">
                                    @error('up_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn  me-2 wssb">CREATE BID</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
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
