<div class="col-sm-7 m-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Tambah Lokasi</span>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="addLokasi">
                <div class="form-group row">
                    <label for="lokasi" class="col-form-label col-sm-2">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" id="kategori" name="kategori" class="form-control form-control-rounded" wire:model="nmLokasi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-form-label col-sm-2">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" class="form-control form-control-rounded" wire:model="alamat"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
