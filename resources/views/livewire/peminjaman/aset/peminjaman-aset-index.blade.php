<div class="col-sm-12">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="font-weight-bold text-white">Pengajuan Peminjaman Aset</span>
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
                    <thead class="text-center text-dark font-weight-bold">
                        <tr>
                            <th>No</th>
                            <th>No. Aset</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Jumlah Tersedia</th>
                            <th>Jumlah Peminjaman</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->no_aset}}</td>
                            <td>{{$row->tanggal_peminjaman}}</td>
                            <td>{{$row->tanggal_pengembalian}}</td>
                            <td>{{$row->fullName}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$row->nm_jenis}}</td>
                            <td class="text-center">{{$row->jumlah}}</td>
                            <td class="text-center">{{$row->qty}}</td>
                            <td>{{$row->keterangan}}</td>
                            <td class="text-center">
                                <button wire:click="approved({{$row->id_peminjaman_aset}})" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></button>
                                <button wire:click="rejected({{$row->id_peminjaman_aset}})" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></i></button>
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

