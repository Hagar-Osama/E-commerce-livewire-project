
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" wire:model.defer="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail3">Slug</label>
                        <input type="text" wire:model.defer="slug" value="{{old('slug')}}" class="form-control" id="exampleInputEmail3" placeholder="Slug">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model.defer="status" id="membershipRadios1" value="visible">
                                        Visible
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model.defer="status" id="membershipRadios2" value="hidden">
                                        Hidden
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


