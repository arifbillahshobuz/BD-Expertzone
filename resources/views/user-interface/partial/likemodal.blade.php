<div class="modal fade likemodal" id="likemodal" tabindex="-1" aria-labelledby="likemodalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs liked-tabs" id="liked-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                                            <span class="nav-link active" id="reaction-tab-1" data-bs-toggle="tab"
                                                  data-bs-target="#reaction-tab-all" type="button" role="tab"
                                                  aria-controls="reaction-tab-all" aria-selected="true">
                                                <span class="align-middle">All</span>
                                            </span>
                    </li>
                    <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-2" data-bs-toggle="tab"
                                                  data-bs-target="#reaction-tab-like" type="button" role="tab"
                                                  aria-controls="reaction-tab-like" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                                     class="img-fluid reaction-img" alt="like" loading="lazy">
                                                <span class="align-middle">2</span>
                                            </span>
                    </li>
                    <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-3" data-bs-toggle="tab"
                                                  data-bs-target="#reaction-tab-love" type="button" role="tab"
                                                  aria-controls="reaction-tab-love" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                                     class="img-fluid reaction-img" alt="love" loading="lazy">
                                                <span class="align-middle">3</span>
                                            </span>
                    </li>
                    <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-4" data-bs-toggle="tab"
                                                  data-bs-target="#reaction-tab-happy" type="button" role="tab"
                                                  aria-controls="reaction-tab-happy" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                                     class="img-fluid reaction-img" alt="happy" loading="lazy">
                                                <span class="align-middle">3</span>
                                            </span>
                    </li>
                    <li class="nav-item" role="presentation">
                                            <span class="nav-link" id="reaction-tab-5" data-bs-toggle="tab"
                                                  data-bs-target="#reaction-tab-haha" type="button" role="tab"
                                                  aria-controls="reaction-tab-haha" aria-selected="false">
                                                <img src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                                     class="img-fluid reaction-img" alt="haha" loading="lazy">
                                                <span class="align-middle">1</span>
                                            </span>
                    </li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="tab-content liked-tabs-content" id="liked-tabs-content">
                    <div class="tab-pane fade show active" id="reaction-tab-all" role="tabpanel"
                         aria-labelledby="reaction-tab-1" tabindex="0">
                        <ul class="list-inline m-0 p-0">
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Anna Sthesia</h6>
                                            <span>@anna</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                            class="img-fluid reaction-img" alt="like"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Paul Molive</h6>
                                            <span>@paul</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                            class="img-fluid reaction-img" alt="like"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Anna Mull</h6>
                                            <span>@annamull</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                            class="img-fluid reaction-img" alt="love"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Paige Turner</h6>
                                            <span>@paige</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                            class="img-fluid reaction-img" alt="love"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/11.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Bob Frapples</h6>
                                            <span>@bob</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                            class="img-fluid reaction-img" alt="love"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/12.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Ira Membrit</h6>
                                            <span>@ira</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                            class="img-fluid reaction-img" alt="happy"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Bob Frapples</h6>
                                            <span>@bob</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                            class="img-fluid reaction-img" alt="happy"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/14.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Greta Life</h6>
                                            <span>@greta</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                            class="img-fluid reaction-img" alt="happy"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/15.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Pete Sariya</h6>
                                            <span>@pete</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                            class="img-fluid reaction-img" alt="haha"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="reaction-tab-like" role="tabpanel"
                         aria-labelledby="reaction-tab-2" tabindex="0">
                        <ul class="list-inline m-0 p-0">
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/01.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Anna Sthesia</h6>
                                            <span>@anna</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                            class="img-fluid reaction-img" alt="like"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/02.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Paul Molive</h6>
                                            <span>@paul</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/01.png"
                                            class="img-fluid reaction-img" alt="like"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="reaction-tab-love" role="tabpanel"
                         aria-labelledby="reaction-tab-3" tabindex="0">
                        <ul class="list-inline m-0 p-0">
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/03.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Anna Mull</h6>
                                            <span>@annamull</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                            class="img-fluid reaction-img" alt="love"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/04.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Paige Turner</h6>
                                            <span>@paige</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                            class="img-fluid reaction-img" alt="love"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/11.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Bob Frapples</h6>
                                            <span>@bob</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/02.png"
                                            class="img-fluid reaction-img" alt="love"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="reaction-tab-happy" role="tabpanel"
                         aria-labelledby="reaction-tab-4" tabindex="0">
                        <ul class="list-inline m-0 p-0">
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/12.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Ira Membrit</h6>
                                            <span>@ira</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                            class="img-fluid reaction-img" alt="happy"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/13.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Bob Frapples</h6>
                                            <span>@bob</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                            class="img-fluid reaction-img" alt="happy"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/14.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Greta Life</h6>
                                            <span>@greta</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/03.png"
                                            class="img-fluid reaction-img" alt="happy"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="reaction-tab-haha" role="tabpanel"
                         aria-labelledby="reaction-tab-5" tabindex="0">
                        <ul class="list-inline m-0 p-0">
                            <li>
                                <div
                                    class="reaction-user-container d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center gap-3 flex-shrnik-0">
                                        <div class="reaction-user-image flex-shrnik-0">
                                            <img class="border border-2 rounded-circle avatar-50"
                                                 src="{{asset('frontend/')}}/assets/images/user/15.jpg"
                                                 alt="user" loading="lazy">
                                        </div>
                                        <div class="reaction-user-meta">
                                            <h6 class="mb-0">Pete Sariya</h6>
                                            <span>@pete</span>
                                        </div>
                                    </div>
                                    <div class="reaction flex-shrnik-0">
                                        <img
                                            src="{{asset('frontend/')}}/assets/images/icon/04.png"
                                            class="img-fluid reaction-img" alt="haha"
                                            loading="lazy">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
