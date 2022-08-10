<!-- Modal -->
<div  class="modal fade" id="deleteColor{{$color->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('color.destroy')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div>Are You Sure You Want to delete this color?</div>
                    <div class="col">
                        <input type="text" name="name" class="form-control" value="{{$color->name}}">
                        <input type="hidden" name="colorId" class="form-control" value="{{$color->id}}">

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
