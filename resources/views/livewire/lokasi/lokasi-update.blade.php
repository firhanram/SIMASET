<div class="col-sm-7 m-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Update Lokasi</span>
        </div>
        <div class="card-body">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span>{{session('message')}}</span>
                    <button class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form wire:submit.prevent="updateLokasi">
                <input type="text" class="form-control" wire:model="kd_lokasi" hidden>
                <div class="form-group row">
                    <label for="lokasi" class="col-form-label col-sm-2">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text id="lokasi" name="lokasi" class="form-control form-control-rounded" wire:model="nmLokasi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-form-label col-sm-2">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" class="form-control form-control-rounded" wire:model="alamat"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

