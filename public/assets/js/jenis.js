$(document).ready(function () {
    $('.editJenis').on('click', function () {

        $('#modalEditJenis').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var kd_jenis = $(this).data('id');

        $('#kd_jenis').val(kd_jenis);
        $('#nm_jenis').val(data[0]);
    });
});
