<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Create Designation') }}</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.designation.index') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i>
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.designation.store') }}" method="POST" class="x-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title" class="form-label">{{ __('Designation title') }}</label>
                                <input name="title" class="form-control px-3 py-2 rounded border border-secondary shadow-sm" placeholder="Enter your title" />
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
