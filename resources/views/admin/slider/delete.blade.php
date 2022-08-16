<!-- Modal -->
<div  class="modal fade" id="deleteSlider{{$slider->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('slider.destroy')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div>Are You Sure You Want to delete this Slider?</div>
                    <div class="col">
                        <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                        <input type="hidden" name="sliderId" class="form-control" value="{{$slider->id}}">

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
