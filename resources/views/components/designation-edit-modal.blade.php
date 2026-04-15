<!-- Modal for Editing -->
<div class="modal fade" id="editModal{{ $designation->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $designation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $designation->id }}">{{ __('Update Designation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('admin.designation.update', $designation->id) }}" method="POST" class="ajax-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="form-label fw-bold">{{ __('Designation Title') }}</label>
                        <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                            <span class="input-group-text bg-white border-0">
                                <i class="ti ti-briefcase text-primary"></i>
                            </span>
                            <input name="title" value="{{ old('title', $designation->title) }}" class="form-control border-0 px-2 py-2 @error('title') is-invalid @enderror" placeholder="Marketing Manager" />
                        </div>
                        @error('title')
                        <div class="small text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="modal-footer border-0 px-0 pb-0 mt-3">
                        <button type="button" class="btn btn-link text-muted" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill shadow">
                            <i class="ti ti-device-floppy me-1"></i> Update Designation
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

