$(document).ready(function () {
    $('.editMerek').on('click', function () {

        $('#modalEditMerek').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        var kd_merek = $(this).data('id');

        $('#kd_merek').val(kd_merek);
        $('#nm_merek').val(data[0]);
    });
});
