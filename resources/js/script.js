$(document).ready(function () {
    $('#specs').select2({
        width: '100%'
    });
    $('#type_payment').select2({
        width: '100%',
        minimumResultsForSearch: -1
    });
    $('#current_status_id').select2({
        width: '100%',
        minimumResultsForSearch: -1
    });
    $('#current_employee_id').select2({
        width: '100%',
        minimumResultsForSearch: -1
    });
    $('#service_id').select2({
        width: '100%',
        minimumResultsForSearch: -1
    });
    $('#model_type').select2({
        width: '30%',
        minimumResultsForSearch: -1
    });
    $('#selectedDay').select2({
        width: '30%',
        minimumResultsForSearch: -1
    });
    $('#selectedMonth').select2({
        width: '30%',
        minimumResultsForSearch: -1
    });
    $('#selectedYear').select2({
        width: '30%',
        minimumResultsForSearch: -1
    });

    var elem = document.getElementById('history_block');
    elem.scrollTop = elem.scrollHeight;
});