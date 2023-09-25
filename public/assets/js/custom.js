$(document).ready(function () {
    $('#myTable').DataTable({
        paging: true,
        ordering: false,
        info: false,
    });
    $('#bde').DataTable({
        paging: true,
        ordering: false,
        info: false,
    });
    $('#upworkTable').DataTable({
        paging: true,
        ordering: false,
        info: false,
    });
    $('#showbidTable').DataTable({
        paging: true,
        ordering: false,
        info: false,
    });
    $('.dashboardTable .dataTables_filter input').attr('data-toggle', 'tooltip')
        .attr('data-placement', 'top')
        .attr('title', 'Type here to search by name, month, year, sale etc in the table')
        .tooltip();
});
// ----------------BDE INDEX----------------------
$(document).on('click', '.deletebtn', function () {
    var stud_id = $(this).val();
    //alert(stud_id);
    $('#DeleteModal').modal('show');
    $('#deleteing_id').val(stud_id)
});
$(document).on('click', '.edit_status', function (e) {
    e.preventDefault();
    var $this = $(this);
    var stud_id = $(this).val();
    var data = {
        'login_status': $this.closest('tr').find('.login_status').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "bde/" + stud_id,
        data: data,
        dataType: "json",
        success: function (response) {
            //console.log(response.status);
            if (response.status == 200) {
                // console.log('val', response.login_status);
                $this.closest('tr').find('.login_status').val(response
                    .login_status);
                var icon = response.login_status == 1 ?
                    '<i class="mdi mdi-thumb-down"></i>' :
                    '<i class="mdi mdi-thumb-up"></i>'
                $this.closest('td').find(".edit_status").html(icon);
                console.log(icon);

            }
        }
    });
});
//---------------------Show Bids-----------------------
$('.calendar').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: "d-m-yy"
});

$(".n").click(function () {
    $("#d1").focus();
});
$(".m").click(function () {
    $("#d2").focus();
});
//---------------------Upwork--------------------------
$(document).on('click', '.deletebtn', function () {
    var stud_id = $(this).val();
    // alert(stud_id);
    $('#DeleteModal').modal('show');
    $('#deleteing_id').val(stud_id)
});
