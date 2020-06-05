<div class="col-sm-12 mt-2">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Daftar Barang</span>
        </div>
        <div class="card-body">
            <select name="kategori" id="kategori" wire:model="filterKategori" class="form-control custom-select col-sm-3">
                <option value="">--Filter Kategori--</option>
                @foreach($kategori as $row)
                    <option value="{{$row->kd_kategori}}">{{$row->nm_kategori}}</option>
                @endforeach
            </select>
            <select name="jenis" id="jenis" wire:model="filterJenis" class="form-control custom-select col-sm-3">
                <option value="">--Filter Jenis--</option>
                @foreach($jenis as $row)
                    <option value="{{$row->kd_jenis}}">{{$row->nm_jenis}}</option>
                @endforeach
            </select>
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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$row->kd_barang}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$row->nm_jenis}}</td>
                            <td>{{$row->nm_kategori}}</td>
                            <td class="text-center">{{$row->satuan}}</td>
                            <td class="text-center">
                                <a href="{{url('/transaksi/barang/edit_barang/'.$row->kd_barang)}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                              <button wire:click="deleteBarang('{{$row->kd_barang}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
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
