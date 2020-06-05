<div class="col-sm-6 m-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Tambah Kategori</span>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="addKategori">
                <div class="form-group row">
                    <label for="kategori" class="col-form-label col-sm-2">Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" id="kategori" name="kategori" class="form-control form-control-rounded" wire:model="nmKategori">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
