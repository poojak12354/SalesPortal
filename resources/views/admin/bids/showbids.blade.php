@extends('layouts.master')
@section('content')
    <div class="row">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ url('admin/bids') }}" class="btn btn-block btn-lg  wssb mt-4"><svg width="24"
                                height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.42887 5.37327C8.55854 5.95879 6.12732 7.59313 4.02615 9.00524C1.60815 10.6302 0.167121 11.6271 0.100371 11.7211C-0.033457 11.9094 -0.033457 12.083 0.100371 12.272C0.167355 12.3666 1.50596 13.2949 3.76834 14.8157C5.72771 16.1328 8.15842 17.7669 9.16989 18.4471C11.0853 19.7352 11.1267 19.757 11.4103 19.6278C11.6649 19.5118 11.6668 19.4943 11.6668 17.1783V15.0432L12.3582 15.0432C14.9294 15.0433 17.2306 15.3572 18.7282 15.9122C20.6245 16.615 22.1196 17.7837 22.878 19.1563C23.1008 19.5594 23.2416 19.6838 23.4752 19.6838C23.8033 19.6838 23.9949 19.436 23.9949 19.0114C23.9949 18.6077 23.9073 17.829 23.8017 17.2932C23.5854 16.1961 23.0641 14.9826 22.4123 14.0588C22.0064 13.4835 20.8772 12.3456 20.2594 11.8894C18.221 10.3841 15.4242 9.28457 12.3699 8.78779L11.7371 8.68485L11.7137 6.6726C11.688 4.47131 11.6909 4.49263 11.4061 4.36288C11.1316 4.23777 11.0702 4.26918 9.42887 5.37327Z"
                                    fill="white" />
                            </svg>
                            BACK
                            TO
                            PROFILE
                        </a>
                    </h4>
                    @if ($id == 0)
                        <h4 class="text-center text-uppercase fw-bold mb-2 mt-2">All bids</h4>
                    @else
                        <h4 class="text-center text-uppercase fw-bold mb-2 mt-2 text-decoration-underline">
                            @foreach ($user as $item)
                                @if ($item->id == $id)
                                    {{ $item->name }}
                                @endif
                            @endforeach

                        </h4>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="filtersec border border-1 border-light rounded bg-light  p-2 shadow p-3  bg-body">
                        <div class="row">
                            <?php
                            $b = '';
                            if (isset($radiobid)) {
                                $b = $radiobid;
                            }
                            ?>

                            <form action="{{ url('admin/showbids/' . $id) }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="filterdiv row">
                                        <div class="col-md-2 d-flex align-items-center">
                                            <span class="fw-bolder  text-uppercase align-middle">Search By Bid:</span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiobid"
                                                    id="exampleRadios1" value="1" <?php
                                                    if ($b == '1') {
                                                        echo 'checked';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>>
                                                <label class="form-check-label ml-0" for="exampleRadios1">
                                                    Bid
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiobid"
                                                    id="exampleRadios2" value="2" <?php
                                                    if ($b == '2') {
                                                        echo 'checked';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>>
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Reply
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radiobid"
                                                    id="exampleRadios3" value="3" <?php
                                                    if ($b == '3') {
                                                        echo 'checked';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>>
                                                <label class="form-check-label" for="exampleRadios3">
                                                    Hire
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2 d-flex align-items-center">
                                <p class="fw-bolder text-uppercase">Search By Date:</p>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text wss text-white">Start Date</span>
                                    <input placeholder="Select your date" type="text" name="fromDate"
                                        class="calendar form-control" id="d1"
                                        value="<?php if (isset($fromDate)) {
                                            if ($fromDate == '1970-01-01') {
                                                echo '';
                                            } else {
                                                echo date('d-m-Y', strtotime($fromDate));
                                            }
                                        } ?>
                                        "><i
                                        class="fast mdi mdi-calendar n"></i>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text wss text-white">End Date</span>
                                    <input placeholder="Select your date" type="text" name="endDate" id="d2"
                                        value="<?php if (isset($endDate)) {
                                            echo date('d-m-Y', strtotime($endDate));
                                        } else {
                                            echo date('d-m-Y');
                                        } ?>
                                        "
                                        class="calendar form-control"><i class="fast mdi mdi-calendar m"></i>

                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="main-button">
                                    <button type="submit" class="btn wssb">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="table-responsive mt-5">
                        <?php if ($b != ''){?>
                        <p class="text-center">Showing results for search by
                            <?php
                            if ($b == 1) {
                                echo ' <b>Bid</bid ';
                            } elseif ($b == 2) {
                                echo ' <b>Reply</b> ';
                            } elseif ($b == 3) {
                                echo ' <b>Hired</b> ';
                            }
                            if (isset($fromDate)) {
                                if ($fromDate == '1970-01-01') {
                                    echo '';
                                } else {
                                    echo " and date from <b>$fromDate</b> to  <b>$endDate</b>";
                                }
                            }
                            ?>
                        </p>
                        <?php
                    }
                    ?>
                        <table class="table table-hover alltable" id="showbidTable">
                            <thead>
                                <tr>
                                    <th class="fw-bolder">#</th>
                                    <th class="fw-bolder">JOB LINK</th>
                                    <?php
                                    if ($id == 0) {
                                        ?>
                                    <th class="fw-bolder">NAME</th>
                                    <?php
                                    }
                                    ?>
                                    <th class="fw-bolder">CLIENT NAME</th>
                                    <th class="fw-bolder">UPWORK ID</th>
                                    <th class="fw-bolder">STATUS</th>
                                    <th class="fw-bolder">BUDGET</th>
                                    <th class="fw-bolder">BID DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                <?php if(isset($query)){?>
                                @foreach ($query as $qu)
                                    <tr>
                                        <td class="fw-bolder">{{ $i++ }}</td>
                                        <td><a href="{{ $qu->job_link }}" class="text-decoration-none"
                                                target="_blank"><?php echo substr($qu->job_link, 0, 50) . '...'; ?></a></td>
                                        <?php
                                    if ($id == 0) {
                                        ?>
                                        <td>
                                            @foreach ($user as $items)
                                                @if ($items->id == $qu->userid)
                                                    {{ $items->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <?php } ?>
                                        <td>{{ $qu->client_name }}</td>
                                        <td>{{ $qu->up_id }}</td>
                                        <td>
                                            <?php
                                            if ($qu->reply == 1) {
                                                echo 'Bid';
                                            } elseif ($qu->reply == 2) {
                                                echo 'Reply';
                                            } elseif ($qu->reply == 3) {
                                                echo 'Hire';
                                            }
                                            ?>
                                        </td>
                                        <td>{{ $qu->budget }}</td>
                                        <td>{{ $qu->date }}</td>
                                    </tr>
                                @endforeach
                                <?php
                                }else{
                                    ?>
                                @foreach ($bid as $item)
                                    @if ($item->userid == $id)
                                        <tr>
                                            <td class="fw-bolder">{{ $i++ }}</td>
                                            <td><a href="{{ $item->job_link }}" class="text-decoration-none"
                                                    target="_blank"><?php echo substr($item->job_link, 0, 50) . '...'; ?></a></td>
                                            <td>{{ $item->client_name }}</td>
                                            <td>{{ $item->up_id }}</td>
                                            <td>
                                                <?php
                                                if ($item->reply == 1) {
                                                    echo 'Bid';
                                                } elseif ($item->reply == 2) {
                                                    echo 'Reply';
                                                } elseif ($item->reply == 3) {
                                                    echo 'Hire';
                                                }
                                                ?>

                                            </td>
                                            <td>{{ $item->budget }}</td>
                                            <td>{{ $item->date }}</td>
                                        </tr>
                                    @elseif ($id == 0)
                                        <tr>
                                            <td class="fw-bolder">{{ $item->id }}</td>
                                            <td>
                                                @foreach ($user as $items)
                                                    @if ($items->id == $item->userid)
                                                        {{ $items->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td><a href="{{ $item->job_link }}" class="text-decoration-none"
                                                    target="_blank"><?php echo substr($item->job_link, 0, 50) . '...'; ?></a></td>
                                            <td>{{ $item->client_name }}</td>
                                            <td>{{ $item->up_id }}</td>
                                            <td>
                                                <?php
                                                if ($item->reply == 1) {
                                                    echo 'Bid';
                                                } elseif ($item->reply == 2) {
                                                    echo 'Reply';
                                                } elseif ($item->reply == 3) {
                                                    echo 'Hire';
                                                }
                                                ?>

                                            </td>
                                            <td>{{ $item->budget }}</td>
                                            <td>{{ $item->date }}</td>
                                        </tr>
                                    @endif
                                @endforeach

                                <?php

                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- DATE SCRIPTS --}}
    <script></script>
    {{-- END SCRIPTS --}}
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
