jQuery(document).ready(function($) {
    $('.et_pb_slide_description').each(function() {
        $(this).html( '<div class="et_pb_slide_description_inner">' + $(this).html() + '</div>' );
    });
});