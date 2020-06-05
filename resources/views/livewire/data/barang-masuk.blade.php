<div class="col-sm-12">
    <div class="card shadow-sm">
        <div class="card-header text-light bg-danger font-weight-bold">
            <span>Data Barang Masuk</span>
        </div>
        <div class="card-body">
            <div class="form-row"><!-- filter tanggal -->
                <div class="form-group col-sm-3">
                    <label for="tanggalMasuk">Tanggal Awal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input wire:model="tanggalAwal" type="date" class="form-control form-control-rounded" name="tanggalAwal">
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <label for="tanggalAkhir">Tanggal Akhir</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input wire:model="tanggalAkhir" type="date" class="form-control form-control-rounded" name="tanggalAkhir">
                    </div>
                </div>
            </div><!-- filter tanggal -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-center font-weight-bold text-dark">
                            <th>No</th>
                            <th>Tanggal Masuk</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$row->tanggal_masuk}}</td>
                            <td>{{$row->kd_barang}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$this->formatRupiah($row->harga)}}</td>
                            <td class="text-center">{{$row->jumlah}}</td>
                            <td class="text-center">{{$row->satuan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
