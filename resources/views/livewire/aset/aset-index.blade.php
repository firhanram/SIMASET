<div class="col-sm-12 mt-2">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Daftar Aset</span>
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
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <span>{{session('message')}}</span>
                    <button class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-hover">
                    <thead class="text-center font-weight-bold text-dark">
                        <tr>
                            <th>No</th>
                            <th>Nomor Aset</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Pemegang</th>
                            <th>Lokasi</th>
                            <th>Ruang</th>
                            <th>Nilai</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->no_aset}}</td>
                                <td>{{$row->nm_barang}}</td>
                                <td>{{$row->nm_jenis}}</td>
                                <td>{{$row->pemegang}}</td>
                                <td>{{$row->nm_lokasi}}</td>
                                <td>{{$row->nm_ruang}}</td>
                                <td>{{$this->formatRupiah($row->harga)}}</td>
                                <td class="text-center">{{$row->jumlah}}</td>
                                <td>{{$row->satuan}}</td>
                                <td class="text-center">
                                    @if($row->status == 'Aktif')
                                        <span class="btn btn-sm btn-outline-success">{{$row->status}}</span>
                                    @else
                                        <span class="btn btn-sm btn-outline-danger">{{$row->status}}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{url('/transaksi/aset/detail_aset/'.$row->no_aset)}}" class="btn btn-info btn-sm">
                                        <i class="far fa-eye"></i>
                                   </a>
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
