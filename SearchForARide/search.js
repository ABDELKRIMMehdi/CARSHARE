$(function () {
    var now = new Date(),
        minDate = now.toISOString().substring(0, 10);

    $('#date').prop('min', minDate);
});
$(function () {
    var now = new Date(),
        maxDate = now.toISOString().substring(0, 10);
        newyear = parseInt(maxDate.substring(0,4)) + 1;
        maxDate= maxDate.replace(maxDate.substring(0,4), newyear.toString());
    $('#date').prop('max', maxDate);
});