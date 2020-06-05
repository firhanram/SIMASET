$(document).ready(function () {
    $('.editVendor').on('click', function () {

        $('#modalEditVendor').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var kd_vendor = $(this).data('id');

        $('#kd_vendor').val(kd_vendor);
        $('#namaVendor').val(data[0]);
        $('#kota').val(data[1]);
        $('#alamat').val(data[2]);
        $('#no_telp').val(data[3]);
    });
});
