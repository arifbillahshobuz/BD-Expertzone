<style>
    .chat-popup-window {
        position: fixed;
        bottom: 0;
        right: 20px;
        width: 320px;
        height: 430px;
        background: #fff;
        border-radius: 12px 12px 0 0;
        box-shadow: 0 -4px 30px rgba(0, 0, 0, 0.18);
        display: flex;
        flex-direction: column;
        z-index: 9999;
        overflow: hidden;
        animation: slideUp .25s ease;
    }

    @keyframes slideUp {
        from {
            transform: translateY(100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    [data-bs-theme="dark"] .chat-popup-window {
        background: #1e1e2e;
        color: #e4e6eb;
    }

    .chat-popup-header {
        background: var(--bs-primary, #50b5ff);
        color: #fff;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 12px 12px 0 0;
        flex-shrink: 0;
    }

    .chat-popup-header img {
        width: 36px;
        height: 36px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, .5);
    }

    .chat-popup-header .name {
        flex: 1;
        font-weight: 600;
        font-size: .9rem;
    }

    .chat-popup-header .status {
        font-size: .75rem;
        opacity: .85;
    }

    .chat-popup-close {
        background: none;
        border: none;
        color: #fff;
        font-size: 1.3rem;
        line-height: 1;
        cursor: pointer;
        padding: 0 4px;
    }

    .chat-popup-body {
        flex: 1;
        overflow-y: auto;
        padding: 12px 12px 4px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        background: #f5f7fb;
    }

    [data-bs-theme="dark"] .chat-popup-body {
        background: #17182a;
    }

    .chat-bubble {
        max-width: 78%;
        padding: 8px 12px;
        border-radius: 16px;
        font-size: .875rem;
        line-height: 1.4;
        position: relative;
        word-break: break-word;
    }

    .chat-bubble.me {
        background: var(--bs-primary, #50b5ff);
        color: #fff;
        align-self: flex-end;
        border-bottom-right-radius: 4px;
    }

    .chat-bubble.them {
        background: #fff;
        color: #1c1e21;
        align-self: flex-start;
        border-bottom-left-radius: 4px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
    }

    [data-bs-theme="dark"] .chat-bubble.them {
        background: #2d2d3f;
        color: #e4e6eb;
    }

    .chat-bubble .msg-time {
        font-size: .68rem;
        opacity: .65;
        display: block;
        text-align: right;
        margin-top: 2px;
    }

    .chat-popup-footer {
        padding: 8px 10px;
        border-top: 1px solid #e4e6eb;
        background: #fff;
        flex-shrink: 0;
    }

    [data-bs-theme="dark"] .chat-popup-footer {
        background: #1e1e2e;
        border-color: #3a3b3c;
    }

    .chat-popup-footer form {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .chat-popup-footer input {
        flex: 1;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 7px 14px;
        font-size: .875rem;
        outline: none;
        background: #f0f2f5;
    }

    [data-bs-theme="dark"] .chat-popup-footer input {
        background: #3a3b3c;
        color: #e4e6eb;
        border-color: #555;
    }

    .chat-popup-footer button {
        background: var(--bs-primary, #50b5ff);
        border: none;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        cursor: pointer;
        flex-shrink: 0;
        transition: opacity .2s;
    }

    .chat-popup-footer button:hover {
        opacity: .85;
    }

    .chat-empty {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #90949c;
        font-size: .85rem;
    }
</style>

<div class="chat-popup-window" id="chat-popup-inner">
    {{-- Header --}}
    <div class="chat-popup-header">
        <img src="{{ $otherUser->avatar ? asset($otherUser->avatar) : asset('frontend/assets/images/user/1.jpg') }}"
            alt="{{ $otherUser->name }}">
        <div>
            <div class="name">{{ $otherUser->name }}</div>
            <div class="status">
                {{ $otherUser->isOnline() ? '🟢 Online' : '⚫ Offline' }}
            </div>
        </div>
        <a href="{{ route('messenger.index') }}" class="chat-popup-close" title="Open in messenger"
            style="font-size:.95rem;margin-right:4px;">
            <span class="material-symbols-outlined" style="font-size:18px;vertical-align:-4px">open_in_full</span>
        </a>
        <button class="chat-popup-close" onclick="closeChatPopup()" title="Close">×</button>
    </div>

    {{-- Messages --}}
    <div class="chat-popup-body" id="popup-msg-body">
        @if($messages->isEmpty())
            <div class="chat-empty">
                <span class="material-symbols-outlined" style="font-size:40px">chat_bubble_outline</span>
                <span>Say "Hi" and start chatting!</span>
            </div>
        @else
            @foreach($messages as $msg)
                <div class="chat-bubble {{ $msg->from_id === auth()->id() ? 'me' : 'them' }}" id="msg-{{ $msg->id }}">
                    {{ $msg->body }}
                    <span class="msg-time">{{ $msg->created_at->format('h:i A') }}</span>
                </div>
            @endforeach
        @endif
    </div>

    {{-- Footer --}}
    <div class="chat-popup-footer">
        <form id="popup-send-form" onsubmit="return false;">
            @csrf
            <input type="text" id="popup-msg-input" placeholder="Write a message..." autocomplete="off">
            <button type="submit" title="Send">
                <span class="material-symbols-outlined" style="font-size:18px">send</span>
            </button>
        </form>
    </div>
</div>

<script>
    (function () {
        const currentUserId = {{ auth()->id() }};
        const toUserId = {{ $otherUser->id }};
        const csrfToken = '{{ csrf_token() }}';

        // Ensure the global listener knows which user we are chatting with
        window.activePopupUserId = toUserId;

        // Scroll to bottom on load
        const body = document.getElementById('popup-msg-body');
        if (body) body.scrollTop = body.scrollHeight;

        function appendBubble(text, isMe, time) {
            // Remove empty state if exists
            const empty = body.querySelector('.chat-empty');
            if (empty) empty.remove();

            const div = document.createElement('div');
            div.className = 'chat-bubble ' + (isMe ? 'me' : 'them');
            div.innerHTML = escapeHtml(text) + '<span class="msg-time">' + time + '</span>';
            body.appendChild(div);
            body.scrollTop = body.scrollHeight;
        }

        function escapeHtml(text) {
            return text.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        }

        // Send message
        const form = document.getElementById('popup-send-form');
        const input = document.getElementById('popup-msg-input');

        form.addEventListener('submit', function () {
            const msg = input.value.trim();
            if (!msg) return;

            input.value = '';
            appendBubble(msg, true, 'Sending…');

            fetch('{{ route("messenger.quick-send") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ to_id: toUserId, message: msg })
            })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        // Update the last bubble time
                        const bubbles = body.querySelectorAll('.chat-bubble.me');
                        const last = bubbles[bubbles.length - 1];
                        if (last) {
                            last.querySelector('.msg-time').textContent = data.message.created_at;
                        }
                    }
                })
                .catch(() => { });
        });

        // Send on Enter
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                form.dispatchEvent(new Event('submit'));
            }
        });

        // Focus input
        input.focus();
    })();

    function closeChatPopup() {
        const modal = document.getElementById('chat-popup-modal');
        if (modal) {
            modal.style.display = 'none';
            modal.classList.remove('show');
            modal.innerHTML = '';
        }
    }
</script>