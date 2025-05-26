<div class="chat-popup-modal" id="chat-popup-modal">
    <div class="bg-primary p-3 d-flex align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="image flex-shrink-0">
                <img src="{{asset('frontend/')}}/assets/images/user/13.jpg" alt="img"
                     class="img-fluid avatar-45 rounded-circle object-cover">
            </div>
            <div class="content">
                <h6 class="mb-0 font-size-14 text-white">Bob Frapples</h6>
                <span class="d-inline-block lh-1 font-size-12 text-white"><span
                        class="d-inline-block rounded-circle bg-success border-5 p-1 align-baseline me-1"></span>Avaliable</span>
            </div>
        </div>
        <div class="chat-popup-modal-close lh-1" type="button">
                        <span class="material-symbols-outlined font-size-18 text-white">
                            close
                        </span>
        </div>
    </div>
    <div class="chat-popup-body p-3 border-bottom">
        <ul class="list-inline p-0 mb-0 chat">
            <li>
                <div class="text-center">
                    <span class="time font-size-12 text-primary">Today</span>
                </div>
            </li>
            <li class="mt-2">
                <div class="text-start">
                    <div
                        class="d-inline-block py-2 px-3 bg-gray-subtle chat-popup-message font-size-12 fw-medium">
                        Hello, How Are you Doing Today?
                    </div>
                    <span class="mt-1 d-block time font-size-10 fst-italic">03:41 PM</span>
                </div>
            </li>
            <li class="mt-3">
                <div class="text-end">
                    <div
                        class="d-inline-block py-2 px-3 bg-primary-subtle chat-popup-message message-right font-size-12 fw-medium">
                        Hello, I'm Doing Well.
                    </div>
                    <span class="mt-1 d-block time font-size-10 fst-italic">03:42 PM</span>
                </div>
            </li>
        </ul>
    </div>
    <div class="chat-popup-footer p-3">
        <div class="chat-popup-form">
            <form>
                <input type="text" class="form-control" placeholder="Start Typing...">
                <button type="submit" class="chat-popup-form-button btn btn-primary">
                                <span class="material-symbols-outlined font-size-18 icon-rtl">
                                    send
                                </span>
                </button>
            </form>
        </div>
    </div>
</div>
