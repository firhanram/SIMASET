<div>
    <div class="row">
        @if($update)
            @livewire('kategori.kategori-update')
        @else
            @livewire('kategori.form-kategori')
        @endif
    </div>
    <div class="row mt-3">
        <div class="col-sm-6 m-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-danger">
                    <span class="text-light font-weight-bold">Daftar Kategori</span>
                </div>
                <div class="card-body">
                    <input wire:model="search" type="text" class="form-control form-control-rounded col-sm-6" placeholder="Cari kategori...">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <span>{{session('message')}}</span>
                            <button class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center font-weight-bold text-dark">
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->nm_kategori}}</td>
                                        <td class="text-center">
                                            <button wire:click="getKategori({{$row->kd_kategori}})" class="btn-sm btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button wire:click="deleteKategori({{$row->kd_kategori}})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
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
    </div>
</div>

