<div class="col-sm-12">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-white font-weight-bold">Data Aset</span>
        </div>
        <div class="card-body">
            <div class="input-group">
                <div class="input-group-append">
                    <span class="btn btn-danger">
                        <i class="fas fa-search fa-sm"></i>
                    </span>
                </div>
                <input type="text" wire:model="search" class="form-control form-control-rounded col-sm-4" placeholder="Cari Aset...">
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-hover">
                    <thead class="text-center font-weight-bold text-dark">
                        <tr>
                            <th>No.</th>
                            <th>No. Aset</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Nilai Aset</th>
                            <th>Jumlah</th>
                            <th>Lokasi</th>
                            <th>Ruang</th>
                            <th>Pemegang</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->no_aset}}</td>
                            <td>{{$row->kd_barang}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$row->nm_jenis}}</td>
                            <td>{{$this->formatRupiah($row->harga)}}</td>
                            <td class="text-center">{{$row->jumlah}}</td>
                            <td>{{$row->nm_lokasi}}</td>
                            <td>{{$row->nm_ruang}}</td>
                            <td>{{$row->pemegang}}</td>
                            <td class="text-center">
                                @if($row->kondisi == 'Baik')
                                    <span class="btn btn-success btn-sm">{{$row->kondisi}}</span>
                                @else
                                    <span class="btn btn-danger btn-sm">{{$row->kondisi}}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($row->status == 'Aktif')
                                    <span class="btn btn-success btn-sm">{{$row->status}}</span>
                                @else
                                    <span class="btn btn-danger btn-sm">{{$row->status}}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>