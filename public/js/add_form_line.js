$(document).ready(function () {

    $('#slider').on('input', function () {
        $val = $(this).val();
        $('.progress-bar').width($val + '%').html($val + '%');

        if ($val > 66) {
            $('.progress-bar').addClass('bg-success');
            $('.progress-bar').removeClass('bg-danger bg-warning');
        } else if ($val > 33) {
            $('.progress-bar').addClass('bg-warning');
            $('.progress-bar').removeClass('bg-succcess bg-danger');
        } else {
            $('.progress-bar').addClass('bg-danger');
            $('.progress-bar').removeClass('bg-succcess bg-warning');
        }
    });

    let line = $('.line:first').prop('outerHTML');
    let options = $('.line:first option').length;
    $('.line:first .remove_line').remove();
    $('.line:first td').children().prop('disabled', true);
    $('.line:first td:not(:first)').empty();
    if (options <= 0) {
        $('#add_line').hide();
    }

    $('#add_line').click(function () {
        if ($('tr.line').length - 1 < options) {
            $('#new_ingredients').prepend(line);
            $('.line:first #add_line').remove();
        }
    });

}).on('click', function () {
    $('.remove_line').click(function () {
        $(this).parent().parent().remove();
    });
});