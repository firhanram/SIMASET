$(document).ready(function () {
    $(document).on('click', '#select', function () {
        let stockBarang = {
            kd_barang: $(this).data('kode'),
            nm_barang: $(this).data('barang'),
            jenis: $(this).data('jenis'),
            kategori: $(this).data('kategori'),
            stock: $(this).data('stock'),
            satuan: $(this).data('satuan')
        }

        $('#kdBarang').val(stockBarang.kd_barang);
        $('#nmBarang').val(stockBarang.nm_barang);
        $('#jenis').val(stockBarang.jenis);
        $('#kategori').val(stockBarang.kategori);
        $('#satuan').val(stockBarang.satuan);
        $('#stock').val(stockBarang.stock);

        console.log(stockBarang.nm_barang);

        $('#modalKodeBarang').modal('hide');
    });
});
