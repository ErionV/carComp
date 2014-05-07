$(document).ready(function(){
    $('.form_error').tooltip();

    $('[rel=popover]').popover({
        html : true,
        content: function() {
            return $('#popover-content').html();
        }
    });

    $('#notificationMessage').delay(4000).fadeOut();
});

