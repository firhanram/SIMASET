$(document).ready(function () {
    $('.editLokasi').on('click', function () {

        $('#modalEditLokasi').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var id_lokasi = $(this).data('id');

        $('#id_lokasi').val(id_lokasi);
        $('#nm_lokasi').val(data[1]);
        $('#alamat').val(data[2]);
    });
});
