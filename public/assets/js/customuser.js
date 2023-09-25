$(document).ready(function () {
    $('#myTable').DataTable({
        paging: true,
        ordering: false,
        info: false
    });
    $('#myTable1').DataTable({
        paging: false,
        ordering: false,
        info: false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#myTable2').DataTable({
        paging: true,
        ordering: false,
        info: false
    });
    $('input[type="radio"]').change(function () {
        if ($(this).attr("value") == "3") {
            $("#otherAnswer").show();
            var b = $(".tb2").val();
            $(".tb3").val(b);
        }
        if ($(this).attr("value") == "2") {
            $("#otherAnswer").hide();
            $(".tb3").val("0");
            $(".tb4").val("0");
        }
        if ($(this).attr("value") == "1") {
            $("#otherAnswer").hide();
            $(".tb3").val("0");
            $(".tb4").val("0");
        }
    })
        .filter(function () {
            return $(this).prop("checked");
        })
        .trigger("change");

});
//----------------Bid create------------------
$('#date').val(new Date().toJSON().slice(0, 10));
$(function () {
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    //alert(maxDate);
    $('#date').attr('max', maxDate);
});

//-----------------Bid Index------------------

$(document).on('click', '.deletebtn', function () {
    var stud_id = $(this).val();
    //alert(stud_id);
    $('#DeleteModal').modal('show');
    $('#deleteing_id').val(stud_id)
});

//-----------------Month Download Report------------
$("#parent").click(function () {
    $(".child").prop("checked", this.checked);
    if ($('.child:checked').length >= 1) {
        $(".add_btn").show();
    } else {
        $(".add_btn").hide();
        $(".final-report").hide();
    }

});
$(".add_btn").click(function () {
    $(".final-report").show();
    var lastname_id = $('.upusers input[type=text]').attr(
        'class');
    var split_id = lastname_id.split('_');
    var index = Number(split_id[1]) + 0;
    var newel = $('.upusers').closest("tr").clone('.gg');
    $(newel).find('input[type=text]').attr("class", "name_" +
        index);
    //$(this).closest("tr").find(".s").clone().appendTo(".gg");
    $('.gg').html(newel);
    $.each($(".final-report .child:not(:checked)"), function () {
        if ($(this).val() == 'on') {
            $(this).closest('tr').find('.name_0').val("0");
            $(this).closest('tr').css("display", "none");
        }
    });
    $('.name_0').prop('disabled', false);
    $('.name_0').css({
        'background-color': '#FFFFCC'
    });
    $('.name_0').closest('tr').find('.n').css({
        'display': 'none'
    });
    calculateSum();
});

$('.child').click(function () {
    if ($('.child:checked').length >= 1) {
        $(".add_btn").show();
    } else {
        $(".add_btn").hide();
        $(".final-report").hide();
    }
});
function calculateSum() {

    var sum = 0;
    //iterate through each textboxes and add the values
    $(".name_0").each(function () {

        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
        }

    });
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $("#para").html(" Total buisness is " + sum.toFixed(2));
}

// -----------------final report  delete ----------------------
$(document).on('click', '.deletebtn', function () {
    var stud_id = $(this).val();
    //alert(stud_id);
    $('#DeleteModal').modal('show');
    $('#deleteing_id').val(stud_id);
});
