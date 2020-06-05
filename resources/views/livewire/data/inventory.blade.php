<div class="col-sm-12">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-white font-weight-bold">Data Inventory</span>
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
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-hover">
                    <thead class="text-center font-weight-bold text-dark">
                        <tr>
                            <th>No.</th>
                            <th>No. Inventory</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Kategori Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($data as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->no_inventory}}</td>
                            <td>{{$row->kd_barang}}</td>
                            <td>{{$row->nm_barang}}</td>
                            <td>{{$row->nm_jenis}}</td>
                            <td>{{$row->nm_kategori}}</td>
                            <td class="text-center">{{$row->jumlah}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>