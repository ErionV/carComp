//Pop message with timer for website alerts
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

//HTML5 code to show chosen image on upload new car advert page
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent)
    {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};
