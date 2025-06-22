<div class="modal fade" id="createDesignationModal" tabindex="-1" aria-labelledby="createDesignationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createDesignationModalLabel">{{ __('Create Designation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.designation.store') }}" method="POST" class="x-form">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Designation title') }}</label>
                        <input name="title" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your title" />
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
