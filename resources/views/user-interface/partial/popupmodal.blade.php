<!-- Custom CSS for Enhanced SweetAlert Design -->
<style>
    /* Enhanced SweetAlert Toast Styles */
    .chat-success-toast {
        border-left: 4px solid #28a745 !important;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2) !important;
        border-radius: 10px !important;
    }

    .chat-error-modal {
        border-radius: 20px !important;
        box-shadow: 0 15px 50px rgba(220, 53, 69, 0.3) !important;
        border: 2px solid rgba(220, 53, 69, 0.1) !important;
    }

    .chat-warning-toast {
        border-left: 4px solid #ffc107 !important;
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.2) !important;
        border-radius: 10px !important;
    }

    .chat-info-toast {
        border-left: 4px solid #17a2b8 !important;
        box-shadow: 0 4px 15px rgba(23, 162, 184, 0.2) !important;
        border-radius: 10px !important;
    }

    /* Custom Button Styles for SweetAlert */
    .swal2-html-container .btn {
        font-size: 14px !important;
        padding: 10px 20px !important;
        border-radius: 8px !important;
        transition: all 0.3s ease !important;
        font-weight: 500 !important;
    }

    .swal2-html-container .btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2) !important;
    }

    /* Custom Close Button Styles */
    .swal2-html-container .btn-close {
        width: 30px !important;
        height: 30px !important;
        border-radius: 50% !important;
        background: rgba(0, 0, 0, 0.1) !important;
        color: #6c757d !important;
        font-weight: bold !important;
        transition: all 0.3s ease !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .swal2-html-container .btn-close:hover {
        background: rgba(220, 53, 69, 0.1) !important;
        color: #dc3545 !important;
        transform: scale(1.1) !important;
    }

    /* Icon Container Styles */
    .error-icon-container,
    .success-icon-container,
    .warning-icon-container,
    .info-icon-container {
        margin-bottom: 1rem !important;
    }

    /* Toast Content Alignment */
    .swal2-toast .swal2-html-container {
        text-align: left !important;
        padding: 1rem !important;
    }

    /* Animation Classes */
    @keyframes slideInRight {
        from {
            transform: translate3d(100%, 0, 0);
            visibility: visible;
        }

        to {
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes shakeX {

        from,
        to {
            transform: translate3d(0, 0, 0);
        }

        10%,
        30%,
        50%,
        70%,
        90% {
            transform: translate3d(-10px, 0, 0);
        }

        20%,
        40%,
        60%,
        80% {
            transform: translate3d(10px, 0, 0);
        }
    }

    .animate__animated {
        animation-duration: 0.5s;
        animation-fill-mode: both;
    }

    .animate__slideInRight {
        animation-name: slideInRight;
    }

    .animate__shakeX {
        animation-name: shakeX;
        animation-duration: 0.75s;
    }

    /* Toast positioning fix */
    .swal2-top-end {
        top: 20px !important;
        right: 20px !important;
        z-index: 9999 !important;
    }

    /* Center modal positioning */
    .swal2-center {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .chat-error-modal {
            width: 95% !important;
            margin: 0 auto !important;
        }

        .swal2-top-end {
            top: 10px !important;
            right: 10px !important;
            left: 10px !important;
        }
    }
</style>

<div class="chat-popup-modal" id="chat-popup-modal" data-user-id="">
    <div class="bg-primary p-3 d-flex align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="image flex-shrink-0">
                <img id="popup-user-avatar" src="/frontend/assets/images/user/13.jpg" alt="img"
                    class="img-fluid avatar-45 rounded-circle object-cover">
            </div>
            <div class="content">
                <h6 id="popup-user-name" class="mb-0 font-size-14 text-white">Select User</h6>
                <span class="d-inline-block lh-1 font-size-12 text-white">
                    <span id="popup-user-status-indicator"
                        class="d-inline-block rounded-circle bg-secondary border-5 p-1 align-baseline me-1"></span>
                    <span id="popup-user-status">Offline</span>
                </span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button id="popup-favorite-btn" class="btn btn-sm btn-outline-light" title="Add to favorites">
                <i class="fas fa-star"></i>
            </button>
            <div class="chat-popup-modal-close lh-1" type="button">
                <span class="material-symbols-outlined font-size-18 text-white">close</span>
            </div>
        </div>
    </div>
    <div class="chat-popup-body p-3 border-bottom" style="max-height: 300px; overflow-y: auto;">
        <div class="popup-loader text-center d-none">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <ul class="list-inline p-0 mb-0 chat" id="popup-messages-container">
            <li>
                <div class="text-center">
                    <span class="time font-size-12 text-primary">Start conversation</span>
                </div>
            </li>
        </ul>
    </div>
    <div class="chat-popup-footer p-3">
        <div class="chat-popup-form">
            <!-- Attachment Preview -->
            <div class="popup-attachment-block d-none mb-2">
                <div class="position-relative d-inline-block">
                    <img class="popup-attachment-preview img-fluid rounded" style="max-width: 100px; max-height: 100px;"
                        src="" alt="Preview">
                    <button type="button"
                        class="btn btn-sm btn-danger position-absolute top-0 end-0 popup-cancel-attachment"
                        style="transform: translate(50%, -50%);">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <form id="popup-message-form">
                @csrf
                <input type="hidden" id="popup-receiver-id" name="receiver_id" value="">
                <div class="d-flex gap-2">
                    <input type="text" id="popup-message-input" name="message" class="form-control"
                        placeholder="Start Typing...">
                    <label for="popup-attachment" class="btn btn-outline-primary" title="Send image">
                        <span class="material-symbols-outlined">attach_file</span>
                    </label>
                    <input type="file" id="popup-attachment" name="attachment" style="display: none;"
                        accept="image/*">
                    <button type="submit" class="chat-popup-form-button btn btn-primary" title="Send message">
                        <span class="material-symbols-outlined font-size-18 icon-rtl">send</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatPopup = document.getElementById('chat-popup-modal');
        const messageForm = document.getElementById('popup-message-form');
        const messageInput = document.getElementById('popup-message-input');
        const messagesContainer = document.getElementById('popup-messages-container');
        const receiverIdInput = document.getElementById('popup-receiver-id');
        const attachmentInput = document.getElementById('popup-attachment');
        const attachmentBlock = document.querySelector('.popup-attachment-block');
        const attachmentPreview = document.querySelector('.popup-attachment-preview');
        const favoriteBtn = document.getElementById('popup-favorite-btn');
        const popupLoader = document.querySelector('.popup-loader');

        let currentUserId = null;
        let isFavorite = false;
        let tempMessageId = 0;

        // Check if required elements exist
        function checkInitialization() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.warn(
                    'CSRF token meta tag not found. Please add <meta name="csrf-token" content="{{ csrf_token() }}"> to your layout.'
                );
                showError('Security token not found. Please refresh the page.');
                return false;
            }

            if (!chatPopup || !messageForm || !messageInput || !messagesContainer) {
                console.error('Required popup elements not found');
                return false;
            }

            return true;
        }

        // Initialize popup
        if (!checkInitialization()) {
            return;
        }

        // Debug mode (set to true for debugging)
        const DEBUG_MODE = false;

        function debugLog(message, data = null) {
            if (DEBUG_MODE) {
                console.log('[Chat Popup Debug]:', message, data);
            }
        }

        // Function to open chat popup for specific user
        window.openChatPopup = function(userId, userName, userAvatar, isOnline = false) {
            debugLog('Opening chat popup', {
                userId,
                userName,
                userAvatar,
                isOnline
            });

            // Check authentication first
            @if (!auth()->check())
                showWarning('Please log in to start chatting.');
                return;
            @endif

            currentUserId = userId;
            chatPopup.setAttribute('data-user-id', userId);
            receiverIdInput.value = userId;
            document.getElementById('popup-user-name').textContent = userName;
            document.getElementById('popup-user-avatar').src = userAvatar ||
                '/frontend/assets/images/user/13.jpg';

            // Update status indicator
            const statusIndicator = document.getElementById('popup-user-status-indicator');
            const statusText = document.getElementById('popup-user-status');
            if (isOnline) {
                statusIndicator.className =
                    'd-inline-block rounded-circle bg-success border-5 p-1 align-baseline me-1';
                statusText.textContent = 'Online';
            } else {
                statusIndicator.className =
                    'd-inline-block rounded-circle bg-secondary border-5 p-1 align-baseline me-1';
                statusText.textContent = 'Offline';
            }

            // Load messages and user info
            loadPopupMessages(userId);
            checkFavoriteStatus(userId);

            // Show popup
            chatPopup.classList.add('show');

            // Focus on input
            setTimeout(() => {
                messageInput.focus();
            }, 300);
        };

        // Function to load messages with loading state
        function loadPopupMessages(userId) {
            debugLog('Loading messages for user', userId);
            showLoader(true);

            // Check if CSRF token exists
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showLoader(false);
                showWarning('Security token not found. Please refresh the page.');
                return;
            }

            const fetchUrl = `{{ route('messenger.fetch-messages') }}?id=${userId}`;
            debugLog('Fetching messages from URL', fetchUrl);

            fetch(fetchUrl)
                .then(async response => {
                    // Get response text first for debugging
                    const responseText = await response.text();
                    debugLog('Raw response text', responseText);

                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                    }

                    // Try to parse as JSON
                    try {
                        return JSON.parse(responseText);
                    } catch (jsonError) {
                        console.error('JSON parse error:', jsonError);
                        console.error('Response text:', responseText);
                        throw new Error('Server returned invalid JSON response');
                    }
                })
                .then(data => {
                    debugLog('Messages data received', data);

                    // Check for different response formats
                    if (data.error) {
                        throw new Error(data.error);
                    }

                    // Handle different possible response structures
                    let messagesArray = [];
                    if (data.messages) {
                        messagesArray = data.messages;
                    } else if (Array.isArray(data)) {
                        messagesArray = data;
                    } else if (data.data && Array.isArray(data.data)) {
                        messagesArray = data.data;
                    } else {
                        console.error('Unexpected response format:', data);
                        throw new Error('Invalid response format from server');
                    }

                    displayPopupMessages(messagesArray);
                    showLoader(false);

                    // Mark messages as seen
                    markMessagesAsSeen(userId);
                })
                .catch(error => {
                    debugLog('Error loading messages', error);
                    console.error('Error loading messages:', error);
                    showLoader(false);

                    // More detailed error message
                    let errorMessage = 'Failed to load messages';
                    if (error.message.includes('JSON')) {
                        errorMessage += ': Server response error';
                        showError(errorMessage);
                    } else if (error.message.includes('HTTP 401')) {
                        showWarning('Please log in to continue');
                    } else if (error.message.includes('HTTP 403')) {
                        showWarning('Access denied - insufficient permissions');
                    } else if (error.message.includes('HTTP 404')) {
                        showInfo('User not found or conversation does not exist');
                    } else if (error.message.includes('HTTP 5')) {
                        errorMessage += ': Server error - please try again later';
                        showError(errorMessage);
                    } else {
                        errorMessage += `: ${error.message}`;
                        showError(errorMessage);
                    }
                });
        }

        // Function to show/hide loader
        function showLoader(show) {
            if (show) {
                popupLoader.classList.remove('d-none');
                messagesContainer.style.opacity = '0.5';
            } else {
                popupLoader.classList.add('d-none');
                messagesContainer.style.opacity = '1';
            }
        }

        // Function to display messages
        function displayPopupMessages(messages) {

            // Always show the notification at the top
            messagesContainer.innerHTML =
                '<li><div class="text-center text-muted"><span class="font-size-12">No messages yet. Start the conversation!</span></div></li>';

            // Robustly handle empty, null, or invalid formats
            if (!Array.isArray(messages)) {
                if (messages && typeof messages === 'object' && Object.keys(messages).length > 0) {
                    // Try to convert object to array if possible
                    messages = Object.values(messages);
                } else {
                    // If still not an array, treat as empty
                    messages = [];
                }
            }

            // Show messages below the notification if any
            if (messages && messages.length > 0) {
                messages.forEach(message => {
                    const messageHtml = createMessageHtml(message);
                    messagesContainer.insertAdjacentHTML('beforeend', messageHtml);
                });
            }

            // Initialize venobox for image viewing
            initVenobox();

            // Scroll to bottom
            scrollToBottom();
        }

        // Function to create message HTML with all features
        function createMessageHtml(message, isTemp = false) {
            const isOwn = message.from_id == {{ auth()->id() }};
            const alignClass = isOwn ? 'text-end' : 'text-start';
            const messageClass = isOwn ? 'bg-primary-subtle message-right' : 'bg-gray-subtle';
            const tempClass = isTemp ? 'temp-message' : '';
            const tempId = isTemp ? `temp-${tempMessageId}` : message.id;

            let messageContent = '';
            let loadingSpinner = '';

            // Add loading spinner for temp messages
            if (isTemp) {
                loadingSpinner = `
                    <div class="message-loader mb-1">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Sending...</span>
                        </div>
                    </div>
                `;
            }

            // Check if message has attachment
            if (message.attachment) {
                try {
                    const imagePath = typeof message.attachment === 'string' ? JSON.parse(message.attachment) :
                        message.attachment;
                    messageContent += `
                        <div class="mb-2">
                            <a class="venobox popup-image-link" data-gall="popup-gallery-${tempId}" href="${getAssetUrl(imagePath)}">
                                <img src="${getAssetUrl(imagePath)}" alt="attachment" 
                                     class="img-fluid rounded popup-message-image" 
                                     style="max-width: 150px; cursor: pointer;">
                            </a>
                        </div>
                    `;
                } catch (e) {
                    console.error('Error parsing attachment:', e);
                }
            }

            if (message.body) {
                messageContent += `
                    <div class="d-inline-block py-2 px-3 ${messageClass} chat-popup-message font-size-12 fw-medium">
                        ${escapeHtml(message.body)}
                    </div>
                `;
            }

            const deleteButton = isOwn && !isTemp ? `
                <button class="btn btn-sm btn-link text-danger p-0 ms-2 delete-popup-message" 
                        data-id="${message.id}" title="Delete message">
                    <i class="fas fa-trash" style="font-size: 10px;"></i>
                </button>
            ` : '';

            const timeDisplay = isTemp ?
                '<i class="fas fa-clock"></i> now' :
                formatTime(message.created_at);

            return `
                <li class="mt-2 message-item ${tempClass}" data-id="${tempId}">
                    <div class="${alignClass}">
                        ${loadingSpinner}
                        ${messageContent}
                        <div class="d-flex ${isOwn ? 'justify-content-end' : 'justify-content-start'} align-items-center">
                            <span class="mt-1 time font-size-10 fst-italic">${timeDisplay}</span>
                            ${deleteButton}
                        </div>
                    </div>
                </li>
            `;
        }

        // Function to get asset URL
        function getAssetUrl(path) {
            if (path.startsWith('http') || path.startsWith('/')) {
                return path;
            }
            return `/storage/${path}`;
        }

        // Function to escape HTML
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Function to format time
        function formatTime(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffInHours = (now - date) / (1000 * 60 * 60);

            if (diffInHours < 24) {
                return date.toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });
            } else {
                return date.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric'
                });
            }
        }

        // Function to scroll to bottom
        function scrollToBottom() {
            const chatBody = document.querySelector('.chat-popup-body');
            setTimeout(() => {
                chatBody.scrollTop = chatBody.scrollHeight;
            }, 100);
        }

        // Function to initialize venobox for image gallery
        function initVenobox() {
            // Initialize venobox if available
            if (typeof $.fn.venobox !== 'undefined') {
                $('.popup-image-link').venobox({
                    border: '10px',
                    bgcolor: '#5dade0',
                    numeratio: true
                });
            }
        }

        // Handle attachment input change
        attachmentInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    attachmentPreview.src = e.target.result;
                    attachmentBlock.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle attachment cancel
        document.querySelector('.popup-cancel-attachment').addEventListener('click', function() {
            attachmentInput.value = '';
            attachmentBlock.classList.add('d-none');
        });

        // Handle message form submission
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const messageText = messageInput.value.trim();
            const attachment = attachmentInput.files[0];

            if (!messageText && !attachment) {
                messageInput.focus();
                return;
            }

            // Create temporary message
            tempMessageId++;
            const tempMessage = {
                id: `temp-${tempMessageId}`,
                from_id: {{ auth()->id() }},
                body: messageText,
                attachment: attachment ? URL.createObjectURL(attachment) : null,
                created_at: new Date().toISOString()
            };

            // Add temp message to display
            const tempMessageHtml = createMessageHtml(tempMessage, true);
            messagesContainer.insertAdjacentHTML('beforeend', tempMessageHtml);

            // Clear form and scroll
            messageFormReset();
            scrollToBottom();

            // Send message
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                // Remove temp message
                const tempElement = messagesContainer.querySelector(
                    `[data-id="temp-${tempMessageId}"]`);
                if (tempElement) tempElement.remove();
                showError('Security token not found. Please refresh the page.');
                return;
            }

            fetch('{{ route('messenger.send-message') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                    }
                })
                .then(async response => {
                    // Get response text first
                    const responseText = await response.text();
                    console.log('Raw response:', responseText);

                    // Check if response is ok
                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                    }

                    // Try to parse as JSON
                    try {
                        return JSON.parse(responseText);
                    } catch (jsonError) {
                        console.error('JSON parse error:', jsonError);
                        console.error('Response text:', responseText);
                        throw new Error('Server returned invalid JSON response');
                    }
                })
                .then(data => {
                    console.log('Parsed response:', data);

                    if (data.status === 'success') {
                        // Remove temp message and add real message
                        const tempElement = messagesContainer.querySelector(
                            `[data-id="temp-${tempMessageId}"]`);
                        if (tempElement) {
                            const realMessageHtml = createMessageHtml(data.message);
                            tempElement.outerHTML = realMessageHtml;
                            initVenobox();
                        }

                        // Show success notification
                        showSuccess('Message sent successfully!');
                    } else {
                        // Remove temp message on error
                        const tempElement = messagesContainer.querySelector(
                            `[data-id="temp-${tempMessageId}"]`);
                        if (tempElement) tempElement.remove();
                        showError(data.message || 'Failed to send message');
                    }
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                    // Remove temp message on error
                    const tempElement = messagesContainer.querySelector(
                        `[data-id="temp-${tempMessageId}"]`);
                    if (tempElement) tempElement.remove();

                    // More detailed error message
                    let errorMessage = 'Failed to send message';
                    if (error.message.includes('JSON')) {
                        errorMessage += ': Server response error';
                    } else if (error.message.includes('HTTP 4')) {
                        errorMessage += ': Authentication required';
                    } else if (error.message.includes('HTTP 5')) {
                        errorMessage += ': Server error';
                    } else {
                        errorMessage += `: ${error.message}`;
                    }

                    showError(errorMessage);
                });
        });

        // Function to reset message form
        function messageFormReset() {
            messageInput.value = '';
            attachmentInput.value = '';
            attachmentBlock.classList.add('d-none');
        }

        // Handle message deletion with SweetAlert
        messagesContainer.addEventListener('click', function(e) {
            if (e.target.closest('.delete-popup-message')) {
                const messageId = e.target.closest('.delete-popup-message').getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteMessage(messageId);
                    }
                });
            }
        });

        // Function to delete message
        function deleteMessage(messageId) {
            fetch('{{ route('messenger.delete-message') }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        id: messageId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Remove message from display
                        const messageElement = messagesContainer.querySelector(`[data-id="${messageId}"]`);
                        if (messageElement) {
                            messageElement.remove();
                        }

                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your message has been deleted.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        showError('Failed to delete message');
                    }
                })
                .catch(error => {
                    console.error('Error deleting message:', error);
                    showError('Failed to delete message');
                });
        }

        // Handle favorite button
        favoriteBtn.addEventListener('click', function() {
            if (!currentUserId) {
                showError('Please select a user first');
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showError('Security token not found. Please refresh the page.');
                return;
            }

            fetch('{{ route('messenger.favorite') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                    },
                    body: JSON.stringify({
                        id: currentUserId
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'added') {
                        favoriteBtn.classList.add('active');
                        favoriteBtn.innerHTML = '<i class="fas fa-star text-warning"></i>';
                        favoriteBtn.title = 'Remove from favorites';
                        isFavorite = true;
                        showSuccess('Added to favorites! ⭐');
                    } else if (data.status === 'removed') {
                        favoriteBtn.classList.remove('active');
                        favoriteBtn.innerHTML = '<i class="far fa-star"></i>';
                        favoriteBtn.title = 'Add to favorites';
                        isFavorite = false;
                        showSuccess('Removed from favorites');
                    } else {
                        showError(data.message || 'Failed to update favorite status');
                    }
                })
                .catch(error => {
                    console.error('Error updating favorite:', error);
                    showError(`Failed to update favorite: ${error.message}`);
                });
        });

        // Function to check favorite status
        function checkFavoriteStatus(userId) {
            // This would need a new route to check if user is favorite
            // For now, we'll assume not favorite
            isFavorite = false;
            favoriteBtn.innerHTML = '<i class="far fa-star"></i>';
            favoriteBtn.title = 'Add to favorites';
        }

        // Function to mark messages as seen
        function markMessagesAsSeen(userId) {
            fetch('{{ route('messenger.make-seen') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        id: userId
                    })
                })
                .catch(error => {
                    console.error('Error marking messages as seen:', error);
                });
        }

        // Function to show success message with beautiful design
        function showSuccess(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    html: `
                        <div class="text-center position-relative">
                            <button type="button" class="btn-close position-absolute" 
                                    onclick="Swal.close()" 
                                    style="top: -5px; right: -5px; z-index: 1000; background: none; border: none; font-size: 1.2rem;"
                                    aria-label="Close">×</button>
                            <div class="success-icon-container mb-3">
                                <i class="fas fa-check-circle text-success" style="font-size: 2.5rem;"></i>
                            </div>
                            <h5 class="fw-bold text-success mb-2">Success!</h5>
                            <p class="text-muted mb-0" style="line-height: 1.4;">${message}</p>
                        </div>
                    `,
                    timer: 3500,
                    showConfirmButton: false,
                    showCloseButton: false,
                    toast: true,
                    position: 'top-end',
                    timerProgressBar: true,
                    customClass: {
                        popup: 'animate__animated animate__slideInRight chat-success-toast',
                        timerProgressBar: 'bg-success'
                    },
                    background: '#f8f9fa',
                    color: '#495057',
                    width: '350px',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
            } else {
                // Fallback for when SweetAlert is not loaded
                console.log('Success:', message);
            }
        }

        // Function to show error message with beautiful design
        function showError(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    html: `
                        <div class="text-center position-relative">
                            <button type="button" class="btn-close position-absolute top-0 end-0" 
                                    onclick="Swal.close()" 
                                    style="margin: -10px -10px 0 0; z-index: 1000;"
                                    aria-label="Close"></button>
                            <div class="error-icon-container mb-3">
                                <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="fw-bold text-danger mb-3">Oops! Something went wrong</h4>
                            <p class="text-muted mb-4" style="line-height: 1.5;">${message}</p>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-primary px-4 py-2" onclick="Swal.close()">
                                    <i class="fas fa-redo me-2"></i>Try Again
                                </button>
                                <button class="btn btn-outline-secondary px-4 py-2" onclick="Swal.close()">
                                    <i class="fas fa-times me-2"></i>Close
                                </button>
                            </div>
                        </div>
                    `,
                    showConfirmButton: false,
                    showCancelButton: false,
                    showCloseButton: false,
                    customClass: {
                        popup: 'animate__animated animate__shakeX chat-error-modal',
                        htmlContainer: 'p-4'
                    },
                    background: '#fff',
                    color: '#495057',
                    width: '450px',
                    padding: '1.5rem',
                    backdrop: 'rgba(0,0,0,0.5)',
                    allowOutsideClick: true,
                    allowEscapeKey: true,
                    position: 'center'
                });
            } else {
                // Fallback for when SweetAlert is not loaded
                alert('Error: ' + message);
            }
        }

        // Function to show warning message
        function showWarning(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    html: `
                        <div class="text-center position-relative">
                            <button type="button" class="btn-close position-absolute" 
                                    onclick="Swal.close()" 
                                    style="top: -5px; right: -5px; z-index: 1000; background: none; border: none; font-size: 1.2rem;"
                                    aria-label="Close">×</button>
                            <div class="warning-icon-container mb-3">
                                <i class="fas fa-exclamation-circle text-warning" style="font-size: 2.5rem;"></i>
                            </div>
                            <h5 class="fw-bold text-warning mb-2">Warning!</h5>
                            <p class="text-muted mb-0" style="line-height: 1.4;">${message}</p>
                        </div>
                    `,
                    timer: 4500,
                    showConfirmButton: false,
                    showCloseButton: false,
                    toast: true,
                    position: 'top-end',
                    timerProgressBar: true,
                    customClass: {
                        popup: 'animate__animated animate__slideInRight chat-warning-toast',
                        timerProgressBar: 'bg-warning'
                    },
                    background: '#fff3cd',
                    color: '#856404',
                    width: '350px',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
            } else {
                console.log('Warning:', message);
            }
        }

        // Function to show info message
        function showInfo(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    html: `
                        <div class="text-center position-relative">
                            <button type="button" class="btn-close position-absolute" 
                                    onclick="Swal.close()" 
                                    style="top: -5px; right: -5px; z-index: 1000; background: none; border: none; font-size: 1.2rem;"
                                    aria-label="Close">×</button>
                            <div class="info-icon-container mb-3">
                                <i class="fas fa-info-circle text-info" style="font-size: 2.5rem;"></i>
                            </div>
                            <h5 class="fw-bold text-info mb-2">Information</h5>
                            <p class="text-muted mb-0" style="line-height: 1.4;">${message}</p>
                        </div>
                    `,
                    timer: 4000,
                    showConfirmButton: false,
                    showCloseButton: false,
                    toast: true,
                    position: 'top-end',
                    timerProgressBar: true,
                    customClass: {
                        popup: 'animate__animated animate__slideInRight chat-info-toast',
                        timerProgressBar: 'bg-info'
                    },
                    background: '#d1ecf1',
                    color: '#0c5460',
                    width: '350px',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
            } else {
                console.log('Info:', message);
            }
        }

        // Close popup functionality
        document.querySelector('.chat-popup-modal-close').addEventListener('click', function() {
            chatPopup.classList.remove('show');
            messageFormReset();
        });

        // Handle Enter key for sending messages
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                messageForm.dispatchEvent(new Event('submit'));
            }
        });

        // Auto-resize textarea (if needed in future)
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
</script>
