<div>
    <div class="content-inner" id="page_layout">
        <div class="container">
            {{-- Check if no partners --}}
            @if($globalPartners->isEmpty())
                <p class="text-danger">Partner not found.</p>
            @else
                {{-- Bootstrap Grid Row --}}
                <div class="row">
                    @foreach($globalPartners as $partner)
                        <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                            <div class="card rounded h-100">
                                <div class="event-images">
                                    <a href="#">
                                        <img src="{{ asset('uploads/partner/' . $partner->image) }}"
                                             alt="Partner Image"
                                             loading="lazy"
                                             class="img-thumbnail rounded shadow"
                                             style="width: 100%; height: 300px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="events-detail ms-3">
                                            <h5>
                                                <a href="#">{{ "$partner->first_name $partner->last_name" ?? "N/A" }}</a>
                                            </h5>
                                            <p class="mb-0">
                                                {{ $partner->designation->title ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif

        </div>
    </div>
</div>
