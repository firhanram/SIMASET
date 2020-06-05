<div class="col-sm-12">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Daftar Inventory</span>
        </div>
        <div class="card-body">
            <select name="kategori" id="kategori" wire:model="filterKategori" class="form-control custom-select col-sm-3 text-dark">
                <option value="">--Filter Kategori--</option>
                @foreach($kategori as $row)
                    <option value="{{$row->kd_kategori}}">{{$row->nm_kategori}}</option>
                @endforeach
            </select>
            <select name="jenis" id="jenis" wire:model="filterJenis" class="form-control custom-select col-sm-3 text-dark">
                <option value="">--Filter Jenis--</option>
                @foreach($jenis as $row)
                    <option value="{{$row->kd_jenis}}">{{$row->nm_jenis}}</option>
                @endforeach
            </select>
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-hover">
                    <thead class="text-center font-weight-bold text-dark">
                        <tr>
                            <th>No</th>
                            <th>No. Inventory</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$row->no_inventory}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$row->nm_jenis}}</td>
                            <td>{{$row->nm_kategori}}</td>
                            <td class="text-center">{{$row->jumlah}}</td>
                            <td class="text-center">{{$row->satuan}}</td>
                            <td class="text-center">
                                <a href="{{url('/manager/peminjaman_inventory/'.$row->no_inventory)}}" class="btn btn-info btn-sm font-weight-bold">
                                    Pinjam
                                </a>
                                <a href="{{url('/manager/pemakaian_inventory/'.$row->no_inventory)}}" class="btn btn-info btn-sm font-weight-bold">
                                    Pakai
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
