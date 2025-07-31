<!doctype html>
<html lang="en" dir="ltr" class="theme-fs-md">

<head>
    <div class="messanger-box position-relative d-inline-block">
        <img :src="user.avatar || '/frontend/assets/images/chat/avatar/01.png'"
            class="avatar-48 object-cover rounded-circle" alt="messanger-image">
    </div>
    <p class="mt-2 mb-0 font-size-14 custom-ellipsis text-body">@{{ user.name }}</p>
    </div><!-- Your existing head content -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SocialV | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- End Config Options -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/socialv097b.css?v=5.2.0') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <!-- flatpickr css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/flatpickr/dist/flatpickr.min.css') }}" />
    <!-- Sweetalert2 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" />

    <!-- vanillajs css -->
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css') }}">

    <!-- zuck -->

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom097b.css?v=5.2.0') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/customizer097b.css?v=5.2.0') }}" />
    <!-- Add Vue.js -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- Add Axios for HTTP requests -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Add Pusher for real-time -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body class="iq-chat-theme">
    <div id="chat-app">
        <aside class="sidebar sidebar-chat sidebar-base border-end shadow-none"
            :class="{ 'sidebar-show': showSidebar }">
            <!-- Chat sidebar content -->
            <div class="chat-search pt-4 px-4">
                <h5 class="fw-500">Chats</h5>
                <div class="sidebar-toggle d-block d-xl-none" @click="toggleSidebar">
                    <i class="icon">
                        <svg class="icon-20 icon-rtl" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </i>
                </div>
                <div class="chat-searchbar mt-3 pt-1 mb-4">
                    <div class="form-group chat-search-data m-0">
                        <input type="text" class="form-control round" v-model="searchQuery"
                            placeholder="Search for messages or users...">
                        <i class="material-symbols-outlined">search</i>
                    </div>
                </div>
                <div class="swiper swiper-general messenger-swiper overflow-hidden mb-4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide text-center" v-for="user in sortedUsers" :key="user.id"
                            @click.prevent="startChat(user)">
                            <div class="messanger-box position-relative d-inline-block">
                                <img :src="user.avatar || '/frontend/assets/images/chat/avatar/01.png'"
                                    class="avatar-48 object-cover rounded-circle" alt="messanger-image">
                                <div class="iq-profile-badge" :class="{ 'bg-success': user.is_online }"></div>
                            </div>
                            <p class="mt-2 mb-0 font-size-14 custom-ellipsis text-body">@{{ user.name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar-body pt-0 data-scrollbar mb-5 pb-5 px-4">
                <ul class="nav navbar-nav iq-main-menu mb-5 pb-5" id="sidebar-menu" role="tablist">
                    <h6 class="mb-3 pb-1">Recent Chats</h6>
                    <li class="nav-item iq-chat-list mb-3 ps-0" v-for="chat in chats" :key="chat.id"
                        :class="{ 'active': activeChat && activeChat.id === chat.id }">
                        <a href="#" class="nav-link d-flex gap-3 rounded-2 zoom-in"
                            @click.prevent="loadChat(chat)">
                            <div class="position-relative">
                                <img :src="chat.other_user.avatar || '/frontend/assets/images/chat/avatar/01.png'"
                                    :alt="chat.other_user.name" class="avatar-48 object-cover rounded-circle"
                                    loading="lazy">
                                <div class="iq-profile-badge" :class="{ 'bg-success': chat.other_user.is_online }">
                                </div>
                            </div>
                            <div class="d-flex align-items-top w-100 iq-userlist-data">
                                <div class="d-flex flex-grow-1 flex-column">
                                    <div class="d-flex align-items-center gap-1">
                                        <h6
                                            class="mb-0 iq-userlist-name font-size-14 fw-semibold mb-0 text-ellipsis short-1 flex-grow-1">
                                            @{{ chat.other_user.name }}
                                        </h6>
                                        <span class="mb-0 font-size-12">@{{ formatTime(chat.last_message.created_at) }}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <p class="text-ellipsis short-1 flex-grow-1 font-size-14 mb-0">
                                            @{{ chat.last_message.message }}
                                        </p>
                                        <div class="btn-group dropdown-user">
                                            <button class="bg-transparent dropdown-toggle border-0 text-white"
                                                data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li><button class="dropdown-item font-size-14 text-dark px-2"
                                                        type="button"><span
                                                            class="material-symbols-outlined mx-1 font-size-20 align-middle text-body">share</span>Share
                                                        Contact</button></li>
                                                <li><button class="dropdown-item font-size-14 text-dark px-2"
                                                        type="button"><span
                                                            class="material-symbols-outlined mx-1 font-size-20 align-middle text-body">content_copy</span>Copy
                                                        Contact</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="main-content">
            <div class="container-fluid content-inner p-0" id="page_layout">
                <div class="tab-content" id="myTabContent">
                    <div class="card tab-pane mb-0 fade show active" id="user-content-101" role="tabpanel"
                        v-if="activeChat">
                        <div class="chat-head">
                            <header class="d-flex justify-content-between align-items-center pt-3 ps-3 pe-3 pb-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-block d-xl-none">
                                        <button class="btn btn-sm btn-primary rounded btn-icon"
                                            @click="toggleSidebar">
                                            <span class="btn-inner">
                                                <svg class="icon-rtl" width="20px" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="avatar chat-user-profile m-0">
                                        <img :src="activeChat.other_user.avatar || '/frontend/assets/images/chat/avatar/01.png'"
                                            alt="avatar" class="avatar-50 rounded-pill">
                                        <div class="iq-profile-badge"
                                            :class="{ 'bg-success': activeChat.other_user.is_online }"></div>
                                    </div>
                                    <div>
                                        <h5 class="mb-0">@{{ activeChat.other_user.name }}</h5>
                                        <small class="text-capitalize fw-500">
                                            @{{ activeChat.other_user.is_online ? 'Online' : 'Offline' }}
                                        </small>
                                    </div>
                                </div>

                                <div class="chat-header-icons d-inline-flex ms-auto">
                                    <a href="#"
                                        class="chat-icon-phone bg-primary-subtle d-flex align-items-center justify-content-center">
                                        <i class="material-symbols-outlined md-18">phone</i>
                                    </a>
                                    <a href="#"
                                        class="chat-icon-video bg-primary-subtle d-flex align-items-center justify-content-center">
                                        <i class="material-symbols-outlined md-18">videocam</i>
                                    </a>
                                    <a href="#"
                                        class="chat-icon-delete bg-primary-subtle d-flex align-items-center justify-content-center">
                                        <i class="material-symbols-outlined md-18">delete</i>
                                    </a>
                                    <span
                                        class="dropdown bg-primary-subtle d-flex align-items-center justify-content-center">
                                        <svg class="icon-20 nav-hide-arrow cursor-pointer pe-0"
                                            id="dropdownMenuButton-09" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" role="menu" width="24"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10 20.6788C10 21.9595 11.0378 23 12.3113 23C13.5868 23 14.6265 21.9595 14.6265 20.6788C14.6265 19.3981 13.5868 18.3576 12.3113 18.3576C11.0378 18.3576 10 19.3981 10 20.6788ZM10 12.0005C10 13.2812 11.0378 14.3217 12.3113 14.3217C13.5868 14.3217 14.6265 13.2812 14.6265 12.0005C14.6265 10.7198 13.5868 9.67929 12.3113 9.67929C11.0378 9.67929 10 10.7198 10 12.0005ZM12.3113 5.64239C11.0378 5.64239 10 4.60192 10 3.3212C10 2.04047 11.0378 1 12.3113 1C13.5868 1 14.6265 2.04047 14.6265 3.3212C14.6265 4.60192 13.5868 5.64239 12.3113 5.64239Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <span class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton-09">
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                    class="material-symbols-outlined md-18 me-1">push_pin</i>Pin to
                                                top</a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                    class="material-symbols-outlined md-18 me-1">delete_outline</i>Delete
                                                chat</a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                    class="material-symbols-outlined md-18 me-1">watch_later</i>Block</a>
                                        </span>
                                    </span>
                                </div>
                            </header>
                        </div>

                        <div class="card-body chat-body bg-body" ref="chatBody">
                            <div class="chat-day-title">
                                <span class="main-title">@{{ formatDate(new Date()) }}</span>
                            </div>

                            <div v-for="message in messages" :key="message.id"
                                :class="{
                                    'iq-message-body iq-current-user': message.sender_id === currentUser.id,
                                    'iq-message-body iq-other-user': message.sender_id !== currentUser.id
                                }">
                                <div class="chat-profile text-center">
                                    <img :src="message.sender.avatar || '/frontend/assets/images/chat/avatar/01.png'"
                                        alt="chat-" class="avatar-40 rounded-pill">
                                    <small class="iq-chating p-0 mb-0 d-block">@{{ formatTime(message.created_at) }}</small>
                                </div>
                                <div class="iq-chat-text">
                                    <div class="d-flex align-items-center"
                                        :class="{
                                            'justify-content-end gap-1 gap-md-2': message.sender_id === currentUser.id,
                                            'justify-content-start gap-md-2': message.sender_id !== currentUser.id
                                        }">
                                        <div v-if="message.sender_id === currentUser.id"
                                            class="dropdown cursor-pointer more">
                                            <div class="lh-1" id="post-option" data-bs-toggle="dropdown">
                                                <span class="material-symbols-outlined text-dark">more_vert</span>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="post-option">
                                                <a class="dropdown-item" href="#"
                                                    @click.prevent="copyMessage(message.message)">
                                                    <span
                                                        class="material-symbols-outlined align-middle font-size-20 me-1">content_copy</span>Copy
                                                    message text
                                                </a>
                                                <a class="dropdown-item" href="#"
                                                    @click.prevent="editMessage(message)">
                                                    <span
                                                        class="material-symbols-outlined align-middle font-size-20 me-1">edit</span>Edit
                                                </a>
                                            </div>
                                        </div>

                                        <div class="iq-chating-content d-flex align-items-center">
                                            <p class="mr-2 mb-0">@{{ message.message }}</p>
                                        </div>

                                        <a v-if="message.sender_id !== currentUser.id" href="#"
                                            class="material-symbols-outlined font-size-20 text-dark reply"
                                            @click.prevent="replyToMessage(message)">
                                            reply
                                        </a>

                                        <div v-if="message.sender_id !== currentUser.id"
                                            class="dropdown cursor-pointer more">
                                            <div class="lh-1" id="post-option" data-bs-toggle="dropdown">
                                                <span class="material-symbols-outlined text-dark">more_vert</span>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="post-option">
                                                <a class="dropdown-item" href="#"
                                                    @click.prevent="copyMessage(message.message)">
                                                    <span
                                                        class="material-symbols-outlined align-middle font-size-20 me-1">content_copy</span>Copy
                                                    message text
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer px-3 py-3 border-top rounded-0">
                            <form class="d-flex align-items-center" @submit.prevent="sendMessage">
                                <div class="chat-attagement d-flex">
                                    <a href="#" class="d-flex align-items-center pe-3">
                                        <svg class="icon-24" width="24" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_156_599)">
                                                <path
                                                    d="M20.4853 4.01473C18.2188 1.74823 15.2053 0.5 12 0.5C8.79469 0.5 5.78119 1.74823 3.51473 4.01473C1.24819 6.28119 0 9.29469 0 12.5C0 15.7053 1.24819 18.7188 3.51473 20.9853C5.78119 23.2518 8.79469 24.5 12 24.5C15.2053 24.5 18.2188 23.2518 20.4853 20.9853C22.7518 18.7188 24 15.7053 24 12.5C24 9.29469 22.7518 6.28119 20.4853 4.01473ZM12 23.0714C6.17091 23.0714 1.42856 18.3291 1.42856 12.5C1.42856 6.67091 6.17091 1.92856 12 1.92856C17.8291 1.92856 22.5714 6.67091 22.5714 12.5C22.5714 18.3291 17.8291 23.0714 12 23.0714Z"
                                                    fill="currentcolor"></path>
                                                <path
                                                    d="M9.40398 9.3309C8.23431 8.16114 6.33104 8.16123 5.16136 9.3309C4.88241 9.60981 4.88241 10.0621 5.16136 10.3411C5.44036 10.62 5.89266 10.62 6.17157 10.3411C6.78432 9.72836 7.78126 9.7284 8.39392 10.3411C8.53342 10.4806 8.71618 10.5503 8.89895 10.5503C9.08171 10.5503 9.26457 10.4806 9.40398 10.3411C9.68293 10.0621 9.68293 9.60986 9.40398 9.3309Z"
                                                    fill="currentcolor"></path>
                                                <path
                                                    d="M18.8384 9.3309C17.6688 8.16123 15.7655 8.16114 14.5958 9.3309C14.3169 9.60981 14.3169 10.0621 14.5958 10.3411C14.8748 10.62 15.3271 10.62 15.606 10.3411C16.2187 9.72836 17.2156 9.72831 17.8284 10.3411C17.9679 10.4806 18.1506 10.5503 18.3334 10.5503C18.5162 10.5503 18.699 10.4806 18.8384 10.3411C19.1174 10.0621 19.1174 9.60986 18.8384 9.3309Z"
                                                    fill="currentcolor"></path>
                                                <path
                                                    d="M18.3335 13.024H5.6668C5.2723 13.024 4.95251 13.3438 4.95251 13.7383C4.95251 17.6243 8.11409 20.7859 12.0001 20.7859C15.8862 20.7859 19.0477 17.6243 19.0477 13.7383C19.0477 13.3438 18.728 13.024 18.3335 13.024ZM12.0001 19.3573C9.14366 19.3573 6.77816 17.215 6.42626 14.4525H17.574C17.2221 17.215 14.8566 19.3573 12.0001 19.3573Z"
                                                    fill="currentcolor"></path>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="#" class="d-flex align-items-center pe-3">
                                        <svg class="icon-24" width="18" height="23" viewBox="0 0 18 23"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.00021 21.5V18.3391" stroke="currentcolor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.00021 14.3481V14.3481C6.75611 14.3481 4.9384 12.5218 4.9384 10.2682V5.58095C4.9384 3.32732 6.75611 1.5 9.00021 1.5C11.2433 1.5 13.061 3.32732 13.061 5.58095V10.2682C13.061 12.5218 11.2433 14.3481 9.00021 14.3481Z"
                                                stroke="currentcolor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M17 10.3006C17 14.7394 13.418 18.3383 9 18.3383C4.58093 18.3383 1 14.7394 1 10.3006"
                                                stroke="currentcolor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path d="M11.0689 6.25579H13.0585" stroke="currentcolor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M10.0704 9.59344H13.0605" stroke="currentcolor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                                <input type="text" class="form-control me-3" v-model="newMessage"
                                    placeholder="Type your message">
                                <button type="submit" class="btn btn-primary d-flex align-items-center">
                                    <svg class="icon-20" width="18" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.8325 6.67463L8.10904 12.4592L1.59944 8.38767C0.66675 7.80414 0.860765 6.38744 1.91572 6.07893L17.3712 1.55277C18.3373 1.26963 19.2326 2.17283 18.9456 3.142L14.3731 18.5868C14.0598 19.6432 12.6512 19.832 12.0732 18.8953L8.10601 12.4602"
                                            stroke="currentcolor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    <span class="d-none d-lg-block ms-1">Send</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div v-else class="card tab-pane mb-0 fade show active" id="no-chat-selected" role="tabpanel">
                        <div class="card-body d-flex align-items-center justify-content-center"
                            style="min-height: 500px;">
                            <div class="text-center">
                                <h4>Select a chat to start messaging</h4>
                                <p>Choose from your existing conversations or start a new one</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Your existing scripts -->

    <!-- Wrapper End-->
    <!-- Lodash Utility -->
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('frontend/assets/js/libs.min.js') }}"></script>
    <!-- Utilities Functions -->
    <script src="{{ asset('frontend/assets/js/setting/utility.js') }}"></script>
    <!-- Settings Script -->
    <script src="{{ asset('frontend/assets/js/setting/setting.js') }}"></script>
    <!-- Settings Init Script -->
    <script src="{{ asset('frontend/assets/js/setting/setting-init.js') }}" defer></script>
    <!-- slider JavaScript -->
    <script src="{{ asset('frontend/assets/js/slider.js') }}"></script>
    <!-- masonry JavaScript -->
    <script src="{{ asset('frontend/assets/js/masonry.pkgd.min.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('frontend/assets/js/enchanter.js') }}"></script>
    <!-- Sweet-alert Script -->
    <script src="{{ asset('frontend/assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}" async></script>
    <script src="{{ asset('frontend/assets/js/sweet-alert.js') }}" defer></script>
    <!-- Chart Custom JavaScript -->
    <!-- app JavaScript -->
    <script src="{{ asset('frontend/assets/js/utility.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
    <!-- Flatpickr Script -->
    <script src="{{ asset('frontend/assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <!-- fslightbox Script -->
    <script src="{{ asset('frontend/assets/js/fslightbox.js') }}" defer></script>
    <!-- vanilla Script -->
    <script src="{{ asset('frontend/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
    <!--lottie Script -->
    <script src="{{ asset('frontend/assets/js/lottie.js') }}"></script>
    <!--select2 Script -->
    <script src="{{ asset('frontend/assets/js/select2.js') }}"></script>
    <!--ecommerce Script -->
    <script src="{{ asset('frontend/assets/js/ecommerce.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/chat.js') }}" defer></script>


    <script>
        // Pusher configuration
        window.pusherKey = '{{ env('PUSHER_APP_KEY') }}';
        window.pusherCluster = '{{ env('PUSHER_APP_CLUSTER') }}';
        window.pusherPort = {{ env('PUSHER_PORT', 443) }};
        window.pusherScheme = '{{ env('PUSHER_SCHEME', 'https') }}';

        const {
            createApp,
            ref,
            computed,
            onMounted,
            nextTick
        } = Vue;

        createApp({
            setup() {
                // State
                const showSidebar = ref(true);
                const searchQuery = ref('');
                const chats = ref([]);
                const users = ref([]);
                const activeChat = ref(null);
                const messages = ref([]);
                const newMessage = ref('');
                const currentUser = ref(@json(auth()->user()));
                const chatBody = ref(null);

                // Pusher setup
                const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                    encrypted: true,
                    authEndpoint: '/broadcasting/auth',
                    auth: {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }
                });

                // Computed
                const sortedUsers = computed(() => {
                    const filtered = users.value.filter(user =>
                        user.name.toLowerCase().includes(searchQuery.value.toLowerCase())
                    );

                    return filtered.sort((a, b) => {
                        // First sort by online status
                        if (a.is_online && !b.is_online) return -1;
                        if (!a.is_online && b.is_online) return 1;

                        // Then sort by last interaction
                        const aTime = a.last_interaction ? new Date(a.last_interaction) : new Date(
                            0);
                        const bTime = b.last_interaction ? new Date(b.last_interaction) : new Date(
                            0);
                        return bTime - aTime;
                    });
                });

                // Methods
                const toggleSidebar = () => {
                    showSidebar.value = !showSidebar.value;
                };

                const formatTime = (dateString) => {
                    const date = new Date(dateString);
                    return date.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                };

                const formatDate = (date) => {
                    return date.toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    });
                };

                const scrollToBottom = () => {
                    nextTick(() => {
                        if (chatBody.value) {
                            chatBody.value.scrollTop = chatBody.value.scrollHeight;
                        }
                    });
                };

                const loadChats = async () => {
                    try {
                        const response = await axios.get('/chats');
                        chats.value = response.data;
                    } catch (error) {
                        console.error('Error loading chats:', error);
                    }
                };

                const loadUsers = async () => {
                    try {
                        const response = await axios.get('/users');
                        users.value = response.data;
                    } catch (error) {
                        console.error('Error loading users:', error);
                    }
                };

                const loadChat = async (chat) => {
                    try {
                        const response = await axios.get(`/chats/${chat.id}`);
                        activeChat.value = response.data.chat;
                        messages.value = response.data.messages.data.reverse();

                        // Subscribe to the chat channel
                        const channel = pusher.subscribe(`private-chat.${chat.id}`);
                        channel.bind('MessageSent', (data) => {
                            if (data.message.sender_id !== currentUser.value.id) {
                                messages.value.push(data.message);
                                scrollToBottom();
                            }
                        });

                        scrollToBottom();
                    } catch (error) {
                        console.error('Error loading chat:', error);
                    }
                };

                const startChat = async (user) => {
                    try {
                        const response = await axios.post(`/chats/find-or-create/${user.id}`);
                        await loadChat(response.data);
                        showSidebar.value = false;
                    } catch (error) {
                        console.error('Error starting chat:', error);
                    }
                };

                const sendMessage = async () => {
                    if (!newMessage.value.trim() || !activeChat.value) return;

                    try {
                        const response = await axios.post(`/chats/${activeChat.value.id}/messages`, {
                            message: newMessage.value
                        });

                        messages.value.push(response.data);
                        newMessage.value = '';
                        scrollToBottom();
                    } catch (error) {
                        console.error('Error sending message:', error);
                    }
                };

                const copyMessage = (text) => {
                    navigator.clipboard.writeText(text);
                    // Show a toast notification here
                };

                const editMessage = (message) => {
                    // Implement message editing
                };

                const replyToMessage = (message) => {
                    newMessage.value = `Replying to "${message.message}": `;
                    // Focus the input field
                };

                // Lifecycle hooks
                onMounted(() => {
                    loadChats();
                    loadUsers();

                    // Initialize Pusher
                    // This should be properly configured with your Laravel backend
                });

                return {
                    showSidebar,
                    searchQuery,
                    chats,
                    users,
                    activeChat,
                    messages,
                    newMessage,
                    currentUser,
                    chatBody,
                    filteredUsers,
                    toggleSidebar,
                    formatTime,
                    formatDate,
                    loadChat,
                    startChat,
                    sendMessage,
                    copyMessage,
                    editMessage,
                    replyToMessage
                };
            }
        }).mount('#chat-app');
    </script>
</body>

</html>
