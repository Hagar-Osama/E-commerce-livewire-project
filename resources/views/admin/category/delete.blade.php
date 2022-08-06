<!-- Modal -->
<div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>Are You Sure You Want to delete this Category?</div>
                <form action="{{route('category.destroy')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="catId" value="{{$category->id}}">
                    <div class="col">
                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>
