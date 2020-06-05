<div class="col-sm-8 m-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Tambah Vendor</span>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="addVendor">
                <div class="form-group row">
                    <label for="vendor" class="col-form-label col-sm-3">Nama Vendor</label>
                    <div class="col-sm-9">
                        <input type="text id="vendor" name="vendor" class="form-control form-control-rounded" wire:model="nmVendor">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-form-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <textarea name="alamat" id="alamat" class="form-control form-control-rounded" wire:model="alamat"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="noTelp" class="col-form-label col-sm-3">No. Telp</label>
                    <div class="col-sm-9">
                        <input type="text id="noTelp" name="noTelp" class="form-control form-control-rounded" wire:model="noTelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="noFax" class="col-form-label col-sm-3">No. Fax</label>
                    <div class="col-sm-9">
                        <input type="text id="noFax" name="noFax" class="form-control form-control-rounded" wire:model="noFax">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
