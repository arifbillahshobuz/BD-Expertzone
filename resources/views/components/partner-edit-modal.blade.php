<!-- Modal for Editing -->
<div class="modal fade" id="editModal{{ $partner->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $partner->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $partner->id }}">{{ __('Update Post Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('admin.partner.update', $partner->id) }}" method="post" class="ajax-form needs-validation" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('First Name') }}</label>
                            <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                                <span class="input-group-text bg-white border-0">
                                    <i class="ti ti-user text-primary"></i>
                                </span>
                                <input name="first_name" value="{{ old('first_name', $partner->first_name) }}" class="form-control border-0 px-2 py-2 @error('first_name') is-invalid @enderror" placeholder="John" />
                            </div>
                            @error('first_name')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Last Name') }}</label>
                            <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                                <span class="input-group-text bg-white border-0">
                                    <i class="ti ti-user text-primary"></i>
                                </span>
                                <input name="last_name" value="{{ old('last_name', $partner->last_name) }}" class="form-control border-0 px-2 py-2 @error('last_name') is-invalid @enderror" placeholder="Doe" />
                            </div>
                            @error('last_name')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Email Address') }}</label>
                            <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                                <span class="input-group-text bg-white border-0">
                                    <i class="ti ti-mail text-primary"></i>
                                </span>
                                <input name="email" value="{{ old('email', $partner->email) }}" class="form-control border-0 px-2 py-2 @error('email') is-invalid @enderror" placeholder="john@example.com" />
                            </div>
                            @error('email')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Phone Number') }}</label>
                            <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                                <span class="input-group-text bg-white border-0">
                                    <i class="ti ti-phone text-primary"></i>
                                </span>
                                <input name="phone" value="{{ old('phone', $partner->phone) }}" class="form-control border-0 px-2 py-2 @error('phone') is-invalid @enderror" placeholder="+1..." />
                            </div>
                            @error('phone')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold">{{ __('Company Name') }}</label>
                            <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                                <span class="input-group-text bg-white border-0">
                                    <i class="ti ti-building text-primary"></i>
                                </span>
                                <input name="company" value="{{ old('company', $partner->company) }}" class="form-control border-0 px-2 py-2 @error('company') is-invalid @enderror" placeholder="Acme Inc." />
                            </div>
                            @error('company')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold">{{ __('Office Address') }}</label>
                            <div class="input-group input-group-flat border rounded-3 overflow-hidden shadow-sm">
                                <span class="input-group-text bg-white border-0">
                                    <i class="ti ti-map-pin text-primary"></i>
                                </span>
                                <input name="address" value="{{ old('address', $partner->address) }}" class="form-control border-0 px-2 py-2 @error('address') is-invalid @enderror" placeholder="123 Street..." />
                            </div>
                            @error('address')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Partner Image') }}</label>
                            <input type="file" class="form-control border rounded-3 shadow-sm @error('image') is-invalid @enderror" id="image_edit_{{ $partner->id }}" name="image" onchange="previewImageEdit(this, '{{ $partner->id }}')">
                            @error('image')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                            <div class="mt-2 text-center">
                                <img id="image_preview_edit_{{ $partner->id }}" src="{{ asset('uploads/partner/' . $partner->image) }}" alt="Preview" class="img-thumbnail shadow-sm" style="max-height: 100px;">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Designation') }}</label>
                            <div class="input-group border rounded-3 overflow-hidden shadow-sm">
                                <span class="input-group-text bg-white border-0">
                                    <i class="ti ti-briefcase text-primary"></i>
                                </span>
                                <select name="designation_id" class="form-select border-0 px-2 @error('designation_id') is-invalid @enderror">
                                    <option value="">{{ __('Select Designation') }}</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ old('designation_id', $partner->designation_id) == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('designation_id')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-0 pb-0 mt-4">
                        <button type="button" class="btn btn-link text-muted" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill shadow">
                            <i class="ti ti-device-floppy me-1"></i> Update Partner
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    function previewImageEdit(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('image_preview_edit_' + id);
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
