@extends('layouts.usermaster')
@section('content')
    <div class="row">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Bids <span class="wscl">Of Month <?php echo date('F'); ?></span></h3>
                    <?php
                    $info = getdate();
                    $date = $info['mday'];
                    $month = $info['month'];
                    $my = date('F Y');
                    ?>
                    @foreach ($mnthre as $mnth)
                        @if ($mnth->userid == $uid)
                            @if ($mnth->month_name == $my)
                                <?php
                                $b = '';
                                $b = $mnth->month_name;
                                ?>
                            @endif
                        @endif
                    @endforeach
                    <?php
if(!isset($b)){
if($month == 'February'){
if($date == 26 || $date == 27 || $date == 28 || $date == 29){
    	?>
                    <div class="table-responsive">

                        <table class="table table-hover mt-4 alltable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="parent" class="form-check-input" /></th>
                                    <th>ID</th>
                                    <th>JOB LINK</th>
                                    <th>CLIENT NAME</th>
                                    <th>UPWORK ID</th>
                                    <th>REVENUE</th>
                                    {{-- <th>Monthly Budget</th> --}}
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bid as $item)
                                    @if ($item->userid == $uid && $item->reply == '3')
                                        <tr class="upusers">
                                            <b>
                                                <td class="n"><input type="checkbox" class="child form-check-input" />
                                                </td>
                                                <td class="s">{{ $item->id }}</td>
                                                <td class="n">
                                                    <a href="{{ $item->job_link }}" class="text-decoration-none"
                                                        target="_blank"><?php echo substr($item->job_link, 0, 30) . '...'; ?></a>
                                                </td>
                                                <td class="s"><input type="hidden" name="name[]"
                                                        value="{{ $item->client_name }}">{{ $item->client_name }}</td>
                                                <td class="s"><input type="hidden" name="up_id[]"
                                                        value="{{ $item->up_id }}">{{ $item->up_id }}
                                                </td>
                                                <td class="s">
                                                    <input type="text" id='name_1' onkeyup="calculateSum()"
                                                        class='txt_' name="budget[]" value="{{ $item->budget }}" disabled
                                                        style="background-color: transparent; border:none; width:100px">
                                                </td>
                                                {{-- <td>{{ $budget }}</td> --}}
                                                <td class="n">{{ $item->date }}</td>

                                            </b>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class=" add_btn btn  text-right mt-4 wssb" style="display: none;">ADD
                            TO REPORT</button>

                        <div class="final-report mt-4" style="display: none;">
                            <form method="GET" action="{{ url('user/create-report') }}" class="forms-sample">
                                @csrf
                                <table class="table table-success table-striped alltable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CLIENT NAME</th>
                                            <th scope="col">UPWORK ID</th>
                                            <th scope="col">REVENUE</th>
                                        </tr>
                                    </thead>
                                    <tbody class="gg">
                                        <tr>
                                            <h4><span id="para"></span></h4>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" id="addAll" class="report_btn  btn text-right mt-4 wssb">GENRATE
                                    REPORT</button>
                            </form>
                        </div>
                    </div>
                    <?php
    }else
    {
    ?>
                    <h4 class="text-center mt-5 mb-5">You can set up the last report only three days before the month's
                        end. Thanks</h4>

                    <?php
    }
}elseif($month == 'April' || $month == 'June' || $month == 'September' || $month == 'November'){
if($date == 28 || $date == 29 || $date == 30){
    	?>
                    <div class="table-responsive">

                        <table class="table table-hover mt-4 alltable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="parent" class="form-check-input" /></th>
                                    <th>ID</th>
                                    <th>JOB LINK</th>
                                    <th>CLIENT NAME</th>
                                    <th>UPWORK ID</th>
                                    <th>REVENUE</th>
                                    {{-- <th>Monthly Budget</th> --}}
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bid as $item)
                                    @if ($item->userid == $uid && $item->reply == '3')
                                        <tr class="upusers">
                                            <b>
                                                <td class="n"><input type="checkbox" class="child form-check-input" />
                                                </td>
                                                <td class="s">{{ $item->id }}</td>
                                                <td class="n"><a href="{{ $item->job_link }}"
                                                        class="text-decoration-none" target="_blank"><?php echo substr($item->job_link, 0, 30) . '...'; ?></a>
                                                </td>
                                                <td class="s"><input type="hidden" name="name[]"
                                                        value="{{ $item->client_name }}">{{ $item->client_name }}</td>
                                                <td class="s"><input type="hidden" name="up_id[]"
                                                        value="{{ $item->up_id }}">{{ $item->up_id }}
                                                </td>
                                                <td class="s">
                                                    <input type="text" id='name_1' onkeyup="calculateSum()"
                                                        class='txt_' name="budget[]" value="{{ $item->budget }}" disabled
                                                        style="background-color: transparent; border:none; width:100px">
                                                </td>
                                                {{-- <td>{{ $budget }}</td> --}}
                                                <td class="n">{{ $item->date }}</td>

                                            </b>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class=" add_btn btn text-right mt-4 wssb" style="display: none;">ADD
                            TO REPORT</button>

                        <div class="final-report mt-4" style="display: none;">
                            <form method="GET" action="{{ url('user/create-report') }}" class="forms-sample">
                                @csrf
                                <table class="table table-success table-striped alltable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CLIENT NAME</th>
                                            <th scope="col">UPWORK ID</th>
                                            <th scope="col">REVENUE</th>
                                        </tr>
                                    </thead>
                                    <tbody class="gg">
                                        <tr>
                                            <h4><span id="para"></span></h4>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" id="addAll"
                                    class="report_btn  btn  text-right mt-4 wssb">GENRATE
                                    REPORT</button>
                            </form>
                        </div>
                    </div>
                    <?php
    }else
    {
    ?>
                    <h4 class="text-center mt-5 mb-5">You can set up the last report only three days before the month's
                        end. Thanks</h4>
                    <?php

    }
}elseif($month == 'January' || $month == 'March' || $month == 'May' || $month == 'July' || $month == 'August' || $month == 'October' || $month == 'December'){
	if($date == 29 || $date == 30 || $date == 31){
    	?>
                    <div class="table-responsive">

                        <table class="table table-hover mt-4 alltable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="parent" class="form-check-input" /></th>
                                    <th>ID</th>
                                    <th>JOB LINK</th>
                                    <th>CLIENT NAME</th>
                                    <th>UPWORK ID</th>
                                    <th>REVENUE</th>
                                    {{-- <th>Monthly Budget</th> --}}
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bid as $item)
                                    @if ($item->userid == $uid && $item->reply == '3')
                                        <tr class="upusers">
                                            <b>
                                                <td class="n"><input type="checkbox"
                                                        class="child form-check-input" />
                                                </td>
                                                <td class="s">{{ $item->id }}</td>
                                                <td class="n"><a href="{{ $item->job_link }}"
                                                        class="text-decoration-none"
                                                        target="_blank"><?php echo substr($item->job_link, 0, 30) . '...'; ?></a></td>
                                                <td class="s"><input type="hidden" name="name[]"
                                                        value="{{ $item->client_name }}">{{ $item->client_name }}</td>
                                                <td class="s"><input type="hidden" name="up_id[]"
                                                        value="{{ $item->up_id }}">{{ $item->up_id }}
                                                </td>
                                                <td class="s">
                                                    <input type="text" id='name_1' onkeyup="calculateSum()"
                                                        class='txt_' name="budget[]" value="{{ $item->budget }}"
                                                        disabled
                                                        style="background-color: transparent; border:none; width:100px">
                                                </td>
                                                {{-- <td>{{ $budget }}</td> --}}
                                                <td class="n">{{ $item->date }}</td>

                                            </b>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class=" add_btn btn text-right mt-4 wssb" style="display: none;">ADD
                            TO REPORT</button>

                        <div class="final-report mt-4" style="display: none;">
                            <form method="GET" action="{{ url('user/create-report') }}" class="forms-sample">
                                @csrf
                                <table class="table table-success table-striped alltable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CLIENT NAME</th>
                                            <th scope="col">UPWORK ID</th>
                                            <th scope="col">REVENUE</th>
                                        </tr>
                                    </thead>
                                    <tbody class="gg">
                                        <tr>
                                            <h4><span id="para"></span></h4>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" id="addAll"
                                    class="report_btn  btn  text-right mt-4 wssb">GENRATE REPORT</button>
                            </form>
                        </div>
                    </div>
                    <?php
    }else
    {
    ?>
                    <h4 class="text-center mt-5 mb-5">You can set up the last report only three days before the month's
                        end. Thanks</h4>
                    <?php
    }
}else
{
?>
                    <h3 class="text-center mt-5">Nothing Found</h3>
                    <?php
}
}else{
    ?>
                    <h4 class="text-center mt-5">You have already submitted your monthly report. If you want make any
                        modification then delete the previously submitted reports and generate a new one.</h4>
                    <h4 class="card-title text-center">
                        <a href="{{ url('user/finalbid') }}" class="btn btn-block btn-lg  mt-4 wssb">DELETE REPORT
                        </a>
                    </h4>
                    <?php
}
?>

                </div>
            </div>
        </div>
    </div>
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
