<div class="col-sm-6 m-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Update Jenis</span>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="updateJenis">
                <input type="text" class="form-control" wire:model="kd_jenis" hidden>
                <div class="form-group row">
                    <label for="jenis" class="col-form-label col-sm-2">Jenis</label>
                    <div class="col-sm-10">
                        <input type="text" id="jenis" name="jenis" class="form-control form-control-rounded" wire:model="nmJenis">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

