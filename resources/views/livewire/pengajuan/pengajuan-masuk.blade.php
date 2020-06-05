<div class="col-sm-12">
    <div class="card">
        <div class="card-header bg-danger text-white font-weight-bold">
            <span>Pengajuan Barang</span>
        </div>
        <div class="card-body">
            @if(session()->has('approved'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <span>{{session('approved')}}</span>
                    <button class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session()->has('rejected'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <span>{{session('rejected')}}</span>
                    <button class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-white text-center text-dark font-weight-bold">
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <th>Pengaju</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Kategori Barang</th>
                            <th>Satuan Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->tanggal_pengajuan}}</td>
                                <td>{{$row->fullName}}</td>
                                <td>{{$row->nm_barang}}</td>
                                <td>{{$row->jenis_barang}}</td>
                                <td>{{$row->kategori_barang}}</td>
                                <td>{{$row->satuan_barang}}</td>
                                <td>{{$row->jumlah}}</td>
                                <td>{{$this->formatRupiah($row->harga)}}</td>
                                <td>{{$row->keterangan}}</td>
                                <td class="text-center">
                                    <span class="btn btn-sm btn-info font-weight-bold">{{$row->status_pengajuan}}</span>
                                </td>
                                <td class="text-center">
                                    <button wire:click="approved({{$row->id_pengajuan}})" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></button>
                                    <button wire:click="rejected({{$row->id_pengajuan}})" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>