$(document).ready(function () {
    $('.editKategori').on('click', function () {

        $('#modalEditKategori').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var kd_kategori = $(this).data('id');

        $('#kd_kategori').val(kd_kategori);
        $('#nm_kategori').val(data[0]);
    });
});
