<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('All Designations') }}</h3>
                    <div class="card-actions">
                        <!-- Button to trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDesignationModal">
                            <i class="ti ti-plus"></i>
                            {{ __('Add new') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($designations as $designation)
                                    <tr>
                                        <td>{{ $designation->title }}</td>
                                        <td>{{ $designation->created_at->format('d M Y') }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $designation->id }}">
                                                <i class="ti ti-edit"></i> {{ __('Edit') }}
                                            </button>
                                            <form action="{{ route('admin.designation.destroy', $designation->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="ti ti-trash"></i>
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                            @include('components.designation-edit-modal')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-ecommerce-category">
    <!-- Category List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-center row pt-4 gap-4 gap-md-0">
                <div class="col-md-4 user_plan">
                    <h5 class="card-title mb-0">Filters</h5>
                </div>
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 category_status"></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-category-list table">
                <thead class="border-top">
                <tr>
                    <th></th>
                    <th></th>
                    <th>Category</th>
                    <th>Total Products</th>
                    <th>Feature Category</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- modal to add new customer -->
{{--    @include('content.ecommerce.category.category-add-modal')--}}
{{--    @include('content.ecommerce.category.category-edit-modal')--}}
</div>
