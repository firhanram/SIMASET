$(document).ready(function () {
    $('.editSatuan').on('click', function () {

        $('#modalEditSatuan').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var kd_satuan = $(this).data('id');

        console.log(data);

        $('#kd_satuan').val(kd_satuan);
        $('#satuan').val(data[0]);
    });
});
