<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Cetak Barang Masuk</title>
</head>
<body>
    <div class="container-fluid">
        <h3 class="text-center font-weight-bold"> Laporan Barang Masuk Bulan {{$bulan}}</h3>
        <h3 class="text-center font-weight-bold">PT Razaki Technology</h3>
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Vendor</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$row->tanggal_masuk}}</td>
                            <td>{{$row->tanggal_transaksi}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$formatRupiah->formatRupiah($row->harga)}}</td>
                            <td>{{$row->nm_jenis}}</td>
                            <td>{{$row->nm_vendor}}</td>
                            <td>{{$row->jumlah}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Dicetak Tanggal {{ date('Y-m-d H:i:s') }}</p>
                <p>Oleh : {{ session('name') }}</p>
                <p class="font-weight-bold pb-3">Total Pengeluaran {{$totalPengeluaran}}</p>
            </div>
        </div>  
    </div>
</body>
</html>