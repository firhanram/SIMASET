<div class="col-sm-12 mt-2">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Daftar Pemberhentian Aset</span>
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
                            <th>Tanggal Pemberhentian</th>
                            <th>Nomor Aset</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$row->tanggal_pemberhentian}}</td>
                                <td>{{$row->no_aset}}</td>
                                <td>{{$row->nm_barang}}</td>
                                <td>{{$row->keterangan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
