<div class="row mt-2">
    <div class="col-sm-12">
        <div class="card shadow-sm">
            <div class="card-header text-light bg-danger font-weight-bold">
                <span>Daftar Barang Keluar</span>
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
                               <th>Tanggal Keluar</th>
                               <th>Kode Barang</th>
                               <th>Nama Barang</th>
                               <th>Jumlah</th>
                               <th>Satuan</th>
                               <th>Keterangan</th>
                           </tr>
                       </thead>
                       <tbody class="text-dark">
                           @foreach($data as $row)
                           <tr>
                               <td class="text-center">{{$loop->iteration}}</td>
                               <td>{{$row->tanggal_keluar}}</td>
                               <td>{{$row->kd_barang}}</td>
                               <td>{{$row->nm_barang}}</td>
                               <td class="text-center">{{$row->jumlah}}</td>
                               <td class="text-center">{{$row->satuan}}</td>
                               <td class="text-center">{{$row->keterangan}}</td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   {{$data->links()}}
               </div>
            </div>
        </div>
    </div>
</div>