$(document).ready(function () {
    $('.editRuang').on('click', function () {

        $('#modalEditRuang').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var id_ruang = $(this).data('id');

        $('#id_ruang').val(id_ruang);
        $('#nm_ruang').val(data[1]);
        $('#lantai').val(data[2]);
    });
});
