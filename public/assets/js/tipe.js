$(document).ready(function () {
    $('.editTipe').on('click', function () {

        $('#modalEditTipe').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var kd_tipe = $(this).data('id');

        $('#kd_tipe').val(kd_tipe);
        $('#nm_tipe').val(data[0]);
    });
});
