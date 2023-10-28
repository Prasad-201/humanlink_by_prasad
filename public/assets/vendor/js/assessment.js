$('document').ready(function () {
    var switchCount = 0;

    $(window).on('blur focus', function (e) {
        var prevType = $(this).data('prevType');
        if (prevType != e.type) {
            switch (e.type) {
                // case 'focus':
                case 'blur':
                    checkViolation();
                    break;
            }
        }
        $(this).data('prevType', e.type);
    })

    // $(window).on('beforeunload', function () {
    //     return "Are you sure you want to leave?";  //// prevent page refersh
    // });

    $(document).bind("contextmenu", function (e) {
        checkViolation();
        e.preventDefault();  // prevent right click
    });

    $(document).on('click', '.next-btn-element .next-btn', function () {
        tabPane = $(this).closest(".tab-pane");
        $(tabPane).removeClass('show active');
        $(tabPane).next().addClass('show active');
        activeNavLink = $('.nav-pills').find('.nav-link.active');
        $(activeNavLink).closest('.nav-item').next().find('.nav-link').addClass('active');
        $(activeNavLink).removeClass('active');
    });

    $(document).keydown(function (e) {
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            checkViolation();
            return false;        // inspect
        }

        if (e.ctrlKey && (e.which == 85)) {
            checkViolation();
            e.preventDefault();    // Control + U button
        }

        if (e.ctrlKey && e.shiftKey && e.which == 82) {
            checkViolation();
            e.preventDefault();     // Control + P button
        }

        if (e.keyCode == 116) {
            checkViolation();
            e.preventDefault();  // F5 click
        }
    });

    var timer2 = "10:00";
    var interval = setInterval(function () {
        var timer = timer2.split(':');
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        $('.stopwatch').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
        if (minutes == 0 && seconds == 00) {
            $('form').trigger('submit');
        }
    }, 1000);

    function checkViolation() {
        switchCount++;      //tab change in
        $('.violationCount').html(switchCount);
        if (switchCount == 3) {
            $('form').trigger('submit');
        }
    }
});