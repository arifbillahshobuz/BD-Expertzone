<!-- Modal for Editing -->
<div class="modal fade" id="editModal{{ $designation->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $designation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $designation->id }}">{{ __('Update Designation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.designation.update', $designation->id) }}" method="POST" class="x-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Designation title') }}</label>
                        <input name="title" class="form-control" value="{{ $designation->title }}" required />
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

