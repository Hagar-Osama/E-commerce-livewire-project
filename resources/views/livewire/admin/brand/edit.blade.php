<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
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
                        <label for="exampleSelectGender">Category Name</label>
                        <select wire:model.defer="category_id" class="form-control" id="exampleSelectGender">
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $brand->category->id ? 'selected': ""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
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
                    <div class="col-md-10">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="status" value="visible" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Visible
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="status" value="hidden" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Hidden
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
