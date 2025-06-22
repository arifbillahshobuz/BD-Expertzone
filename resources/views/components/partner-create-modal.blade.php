<div class="modal fade" id="createPartnerModal" tabindex="-1" aria-labelledby="createPartnerModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createPartnerModal">{{ __('Create Partner') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.designation.store') }}" method="POST" class="x-form">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="title" class="form-label">{{ __('First Name') }}</label>
                                <input name="first_name" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your First Name" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="title" class="form-label">{{ __('Last Name') }}</label>
                                <input name="last_name" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your Last Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="title" class="form-label">{{ __('Email') }}</label>
                                <input name="email" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your Email" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="title" class="form-label">{{ __('Phone') }}</label>
                                <input name="phone" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your Phone" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <input name="address" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your Address" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="company" class="form-label">{{ __('Company') }}</label>
                                <input name="company" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your Company Name" />
                            </div>
                        </div>
                        <div class="row">
                            <input type="file" name="" id="">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
