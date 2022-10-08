<!-- Modal -->
<div  class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.destroy')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div>Are You Sure You Want to delete this User?</div>
                    <div class="col">
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        <input type="hidden" name="userId" class="form-control" value="{{$user->id}}">

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
