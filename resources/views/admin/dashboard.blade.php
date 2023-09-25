@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon wss text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card wss card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ url('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3 fw-bold">Current Month Sale<i
                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">${{ $users }}</h2>
                    {{-- <h6 class="card-text">Increased by 60%</h6> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card wss card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ url('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3 fw-bold">Last Month Sale <i
                            class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">
                        ${{ $lastMonth }}</h2>
                    {{-- <h6 class="card-text">Decreased by 10%</h6> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card wss card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ url('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3 fw-bold">Total Sale <i
                            class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">$0</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        .fast {
            position: relative;
            font-size: 23px;
            cursor: pointer;
            top: 10px;
            right: 25px;
            color: #509ED7;
        }

        #ui-datepicker-div {
            font-size: 12px;
        }
    </style>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Project Status</h3>

                    <form action="{{ url('admin/dashboard') }}" method="POST">
                        @csrf
                        <div class="row datsetting">
                            <p class="fw-bolder text-uppercase">Search By Date:</p>
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text wss text-white">Start Date</span>
                                    <input placeholder="Select your date" type="text" name="fromDate"
                                        class="calendar form-control" id="d1"><i class="fast mdi mdi-calendar n"></i>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text wss text-white">End Date</span>
                                    <input placeholder="Select your date" type="text" name="endDate" id="d2"
                                        value="<?php echo date('d-m-Y');
                                        ?>" class="calendar form-control"><i
                                        class="fast mdi mdi-calendar m"></i>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="main-button">
                                    <button type="submit" class="btn wssb">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-3 dashboardTable">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> NAME </th>
                                    <th> MONTH</th>
                                    <th>TARGET</th>
                                    <th>SALE</th>
                                    <th>VIEW</th>
                                    <th>VERIFY</th>
                                    <th>PROGRESS</th>
                                </tr>
                            </thead>
                            <?php
                            if (isset($query)) {?>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($query as $item)
                                    <?php $i++; ?>
                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td>
                                            @foreach ($username as $user)
                                                @if ($user->id == $item->userid)
                                                    {{ $user->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td> {{ $item->month_name }} </td>
                                        <td>{{ $item->bus_target }}</td>
                                        <td>{{ $item->total_bus }}</td>
                                        <td style="text-align: center;">

                                            <!-- Button trigger modal -->
                                            <i data-bs-toggle="modal" class="mdi mdi-eye"
                                                style="padding:10px; font-size:18px; display:flex; justify-content:center;"
                                                data-bs-target="#staticBackdrop<?php echo $i; ?>">

                                            </i>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-striped modaltable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>CLIENT NAME</th>
                                                                        <th>UPWORK ID</th>
                                                                        <th>TOTAL BUISNESS</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="wss">
                                                                    @foreach ($monthsale as $users)
                                                                        @if ($users->user_mnthf_id == $item->id)
                                                                            <tr>
                                                                                <td>{{ $users->client_name }}</td>
                                                                                <td>{{ $users->up_id }}</td>
                                                                                <td>{{ $users->total_bus }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <br>
                                                            <h5 class="modal-title text-center" id="staticBackdropLabel">
                                                                SALE DETAIL
                                                            </h5>
                                                            <p class="fw-bold">LAST MONTH SALE:
                                                                @foreach ($lms as $lastmsale)
                                                                    <?php
                                                                    $currentMonth = $lastmsale->month_name;
                                                                    $newd = Date('F', strtotime($currentMonth . ' last month'));
                                                                    $nn = $newd . ' ' . date('Y');
                                                                    ?>
                                                                    @if ($lastmsale->userid == $item->userid)
                                                                        {{ $lastmsale->total_bus }}
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                            <p class="fw-bold">THIS MONTH SALE: {{ $item->total_bus }} </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary wss"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <select class="form-select" aria-label="Default select example" name="up_id"
                                                onchange="update_leave_status('<?php echo $item->id; ?>',
                                                    this.options[this.selectedIndex].value)">
                                                <option value="0"
                                                    {{ $item->verify_report == '0' ? 'selected' : '' }}>
                                                    Rejected
                                                </option>
                                                <option value="1"
                                                    {{ $item->verify_report == '1' ? 'selected' : '' }}>
                                                    Approved
                                                </option>
                                            </select>

                                        </td>
                                        <td>
                                            <?php
                                            $total = $item->bus_target;
                                            $current = $item->total_bus;
                                            $percent = ($current / $total) * 100;

                                            ?>
                                            <div class="progress" title="<?php echo "$$current Achived Of Target $$total"; ?>">
                                                <div class="progress-bar
                                                <?php if ($percent < 10) {
                                                    echo 'bg-gradient-warning';
                                                } elseif ($percent < 50) {
                                                    echo 'bg-gradient-danger';
                                                } elseif ($percent < 80) {
                                                    echo 'bg-gradient-info';
                                                } else {
                                                    echo 'bg-gradient-success';
                                                }

                                                ?>"
                                                    role="progressbar" style="width: <?php echo $percent; ?>%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <?php
                            }else{
                            ?>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($userfinal as $item)
                                    <?php $i++; ?>
                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td>
                                            @foreach ($username as $user)
                                                @if ($user->id == $item->userid)
                                                    {{ $user->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td> {{ $item->month_name }} </td>
                                        <td>{{ $item->bus_target }}</td>
                                        <td>{{ $item->total_bus }}</td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <i data-bs-toggle="modal" class="mdi mdi-eye"
                                                style="padding:10px; font-size:18px;"
                                                data-bs-target="#staticBackdrop<?php echo $i; ?>">

                                            </i>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-striped modaltable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>CLIENT NAME</th>
                                                                        <th>UPWORK ID</th>
                                                                        <th>TOTAL BUISNESS</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="wss">
                                                                    @foreach ($monthsale as $users)
                                                                        @if ($users->user_mnthf_id == $item->id)
                                                                            <tr>
                                                                                <td>{{ $users->client_name }}</td>
                                                                                <td>{{ $users->up_id }}</td>
                                                                                <td>{{ $users->total_bus }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                            <br>
                                                            <h5 class="modal-title text-center" id="staticBackdropLabel">
                                                                SALE DETAIL
                                                            </h5>
                                                            <p class="fw-bold">LAST MONTH SALE:
                                                                @foreach ($lms as $lastmsale)
                                                                    <?php
                                                                    $currentMonth = $lastmsale->month_name;
                                                                    $newd = Date('F', strtotime($currentMonth . ' last month'));
                                                                    $nn = $newd . ' ' . date('Y');
                                                                    ?>
                                                                    @if ($lastmsale->userid == $item->userid)
                                                                        {{ $lastmsale->total_bus }}
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                            <p class="fw-bold">THIS MONTH SALE: {{ $item->total_bus }}
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary wss"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <select class="form-select" aria-label="Default select example"
                                                name="up_id"
                                                onchange="update_leave_status('<?php echo $item->id; ?>',
                                                    this.options[this.selectedIndex].value)">
                                                <option value="0"
                                                    {{ $item->verify_report == '0' ? 'selected' : '' }}>
                                                    Rejected
                                                </option>
                                                <option value="1"
                                                    {{ $item->verify_report == '1' ? 'selected' : '' }}>
                                                    Approved
                                                </option>
                                            </select>

                                        </td>
                                        <td>
                                            <?php
                                            $total = $item->bus_target;
                                            $current = $item->total_bus;
                                            $percent = ($current / $total) * 100;

                                            ?>
                                            <div class="progress" title="<?php echo "$$current Achived Of Target $$total"; ?>">
                                                <div class="progress-bar
                                                <?php if ($percent < 10) {
                                                    echo 'bg-gradient-warning';
                                                } elseif ($percent < 50) {
                                                    echo 'bg-gradient-danger';
                                                } elseif ($percent < 80) {
                                                    echo 'bg-gradient-info';
                                                } else {
                                                    echo 'bg-gradient-success';
                                                }

                                                ?>"
                                                    role="progressbar" style="width: <?php echo $percent; ?>%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <canvas id="myChart" height="400px"></canvas>
        </div> --}}
        <script>
            function update_leave_status(id, select_value) {
                //alert(select_value);
                window.location.href = 'dashboard/' + id + '/' + select_value;
            }
        </script>
        {{-- DATE SCRIPTS --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"
            rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/notification.js') }}"></script>
        <script>
            $('.calendar').datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "d-m-yy"
            });

            $(".n").click(function() {
                $("#d1").focus();
            });
            $(".m").click(function() {
                $("#d2").focus();
            });
        </script>
        <?php
$date = date('d');
if($date == 2){
?>
        <script>
            if ($('select[name="up_id"]').children("option:selected").val() == 1) {

            } else {
                $(document).ready(function() {
                    alert($('select[name="up_id"]').children("option:selected").val());

                    setTimeout(function() {
                        $('select[name="up_id"]').val(1).change();
                    }, 2000);
                })
            }
        </script>
        <?php
}
?>


    </div>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
@endsection
