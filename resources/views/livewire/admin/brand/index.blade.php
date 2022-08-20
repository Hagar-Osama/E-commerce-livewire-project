@section('title')
Brands
@endsection
<div>
    @include('livewire.admin.brand.create')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Brand
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addBrand">
                                Add Brand
                            </button </h2>
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
                                                    Brand Name
                                                </th>
                                                <th>
                                                    slug Name
                                                </th>
                                                <th>
                                                    Category Name
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
                                            @forelse($brands as $brand)
                                            <tr>
                                                <td>
                                                    {{$loop->iteration}}
                                                </td>
                                                <td>
                                                    {{$brand->name}}
                                                </td>

                                                <td>
                                                    {{$brand->slug}}
                                                </td>
                                                <td>
                                                    {{$brand->category->name}}
                                                </td>
                                                <td>
                                                    @if($brand->status == 'visible')

                                                    <p class="text-success">Visible</p>
                                                    @else
                                                    <p class="text-danger">Hidden</p>

                                                    @endif
                                                </td>
                                                <td> <button type="button" wire:click="edit({{$brand->id}})" class="btn-sm btn btn-outline-dark btn-fw" data-bs-toggle="modal" data-bs-target="#editBrand">
                                                        Edit
                                                        <i class="mdi mdi-file-check btn-icon-append"></i>
                                                    </button>

                                                    <button type="button" wire:click="delete({{$brand->id}})" class="btn btn-outline-danger btn-fw btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBrand{{$brand->id}}">
                                                        <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                        Delete
                                                    </button </td>

                                            </tr>
                                            @include('livewire.admin.brand.edit')
                                            @include('livewire.admin.brand.delete')
                                            @empty
                                            <tr>
                                                <td class="text-danger">No Brands Found</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{$brands->links()}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @foreach($brands as $brand)
        @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#addBrand').modal('hide');
                $('#editBrand').modal('hide');
                $('#deleteBrand{{$brand->id}}').modal('hide');

            });
        </script>
        @endpush
@endforeach
