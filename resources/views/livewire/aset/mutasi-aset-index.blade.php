<div class="col-sm-12 mt-2">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Daftar Mutasi Aset</span>
        </div>
        <div class="card-body">
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
                            <th>Tanggal Mutasi</th>
                            <th>Lokasi Awal</th>
                            <th>Ruang Awal</th>
                            <th>Pemegang Awal</th>
                            <th>Lokasi Sekarang</th>
                            <th>Ruang Sekarang</th>
                            <th>Pemegang Sekarang</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->no_aset}}</td>
                                <td>{{$row->nm_barang}}</td>
                                <td>{{$row->tanggal_mutasi}}</td>
                                <td>{{$row->lokasi_awal}}</td>
                                <td>{{$row->ruang_awal}}</td>
                                <td>{{$row->pemegang_awal}}</td>
                                <td>{{$row->nm_lokasi}}</td>
                                <td>{{$row->nm_ruang}}</td>
                                <td>{{$row->pemegang_sekarang}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
