<div class="col-sm-6 m-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Tambah Ruang</span>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="addRuang">
                <div class="form-group row">
                    <label for="ruang" class="col-form-label col-sm-2">Ruang</label>
                    <div class="col-sm-10">
                        <input type="text" name="ruang" class="form-control form-control-rounded" wire:model="nmRuang">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lantai" class="col-form-label col-sm-2">Lantai</label>
                    <div class="col-sm-10">
                        <input type="text" name="lantai" class="form-control form-control-rounded" wire:model="lantai">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
