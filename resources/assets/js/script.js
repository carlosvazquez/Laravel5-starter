$(function () {
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        locale: 'es'

    });
});

$(function () {
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        locale: 'es'
    });
});

function ConfirmDelete() {
    var x = confirm("¿Seguro que quiere cancelar la orden?");
    if (x)
        return true;
    else
        return false;
};