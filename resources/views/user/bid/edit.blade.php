@extends('layouts.usermaster')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>Update <span class="wscl">Bid</span></h4>
                </div>
                <div class="card-body wssi">
                    <h4 class="card-title"></h4>
                    <form method="POST" action="{{ url('user/update-bid/' . $bid->id) }}" class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName1">Upwork Job Link</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="https://upwork.."
                                name="job_link" value="{{ $bid->job_link }}">
                            @error('job_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName2">Client Name</label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Gabreilla I"
                                name="name" value="{{ $bid->client_name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Upwork Id</label>
                            <select class="form-select" aria-label="Default select example" name="up_id">
                                @foreach ($upwork as $item)
                                    <option value="{{ $item->name }}" {{ $bid->up_id == $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
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
                                                value="1" {{ $bid->reply == '1' ? 'checked' : '' }}> Bid
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsReply"
                                                value="2" {{ $bid->reply == '2' ? 'checked' : '' }}> Reply
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsReply"
                                                value="3" {{ $bid->reply == '3' ? 'checked' : '' }}>
                                            Hire
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('optionsReply')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col" id="otherAnswer" style="display:none">
                                <div class="form-group">
                                    <label>Estimate Budget</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text wss text-white">$</span>
                                        </div>
                                        <input type="text" class="form-control editbids tb3"
                                            aria-label="Amount (to the nearest dollar)" name="budget"
                                            value="{{ $bid->budget }}">
                                        <input type="hidden" value="{{ $bid->budget }}" class="tb2">
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
                                        value="{{ $bid->date }}" onfocus="this.showPicker()">
                                    @error('up_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn wssb me-2">UPDATE BID</button>
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
