$(document).on('click', '.count-indicator', function (e) {
    e.preventDefault();
    var $this = $(this);
    var url = $("input[name=notfication_route]").val();
    //alert(url);
    var data = {
        'not_status': $this.find(".notfication").val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $this.find('span').hide("");
                console.log(response);
                if ($(".notificationdiv").hasClass("show")) {
                    $(document).mouseup(function (e) {
                        var container = $(".belldiv");
                        if (!container.is(e.target) && container.has(e
                            .target).length === 0) {
                            $(".notify_drpdwn").removeClass(
                                "notification_color").delay(
                                    2000).show(0);
                        }
                    });
                } else {
                    $(".notify_drpdwn").removeClass("notification_color").delay(
                        2000).show(0);
                }
            }
        }
    });
});
