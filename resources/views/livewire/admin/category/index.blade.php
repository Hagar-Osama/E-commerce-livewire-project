@section('title')
Categories
@endsection

<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Category
                        <a href="{{route('category.create')}}" class="btn btn-primary float-end">Add Category</a>
                    </h2>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Category Name
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Meta Title
                                            </th>
                                            <th>
                                                Meta keyword
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($categories as $category)
                                        <tr>
                                            <td>
                                            {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$category->name}}
                                            </td>
                                            <td class="py-1">
                                                <img src="{{asset('storage/categories/'. $category->image)}}" alt="image" />
                                            </td>
                                            <td>
                                                {{mb_substr($category->description,0,50). '...'}}
                                            </td>
                                            <td>
                                                {{$category->meta_title}}
                                            </td>
                                            <td>
                                                {{$category->meta_keyword}}
                                            </td>
                                            <td>
                                                @if($category->status == 'visible')

                                                <p class="text-success">Visible</p>
                                                @else
                                                <p class="text-danger">Hidden</p>

                                                @endif
                                            </td>
                                            <td><a  href="{{route('category.edit',$category->id)}}" class="btn-sm btn btn-outline-dark btn-fw">
                                                    Edit
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                </a>
                                                <button  type="button" wire:click="delete({{$category->id}})" class="btn btn-outline-danger btn-fw btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCategory">
                                                <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                    Delete
                                                </button </td>

                                        </tr>
                                        @include('livewire.admin.category.delete')
                                        @empty
                                            <tr>
                                                <td class="text-danger">No Categories Found</td>
                                            </tr>
                                            @endforelse
                                    </tbody>
                                </table>
                                <div>
                                {{$categories->links()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteCategory').modal('hide');

            });
        </script>
        @endpush


