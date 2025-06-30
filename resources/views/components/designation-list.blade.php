<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('All Designations') }}</h3>
                    <div class="card-actions">
                        <!-- Button to trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createDesignationModal">
                            <i class="ti ti-plus"></i>
                            {{ __('Add new') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designations as $designation)
                                        <tr>
                                            <td>{{ $designation->title }}</td>
                                            <td>{{ $designation->created_at->format('d M Y') }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $designation->id }}">
                                                    <i class="ti ti-edit"></i> {{ __('Edit') }}
                                                </button>
                                                <form
                                                    action="{{ route('admin.designation.destroy', $designation->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this designation?');"
                                                        class="btn btn-danger">
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

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

<link rel="stylesheet" href="/DataTables/datatables.css" />

<script src="/DataTables/datatables.js"></script>


<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
        console.log(DataTable());
    });
</script>
