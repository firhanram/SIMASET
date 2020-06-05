<div class="col-sm-6 m-auto">
    <div class="card shadow-sm">
        <div class="card-header bg-danger">
            <span class="text-light font-weight-bold">Update Ruang</span>
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
            <form wire:submit.prevent="updateRuang">
                <input type="text" class="form-control" wire:model="kd_ruang" hidden>
                <div class="form-group row">
                    <label for="ruang" class="col-form-label col-sm-2">Ruang</label>
                    <div class="col-sm-10">
                        <input type="text" name="ruang" class="form-control form-control-rounded" wire:model="nmRuang">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

