$(document).ready(function () {
    $(document).on('click', '#select', function () {
        let aset = {
            no_aset: $(this).data('kode'),
            pemegang: $(this).data('pemegang'),
            lokasi: $(this).data('lokasi'),
            ruang: $(this).data('ruang'),
        }

        $('#noAset').val(aset.no_aset);
        $('#lokasiAwal').val(aset.lokasi);
        $('#ruangAwal').val(aset.ruang);
        $('#pemegangAwal').val(aset.pemegang);

        $('#modalNoAset').modal('hide');
    });
});
