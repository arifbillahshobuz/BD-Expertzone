<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MessageController;
use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FollowController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ReactionController;
use App\Http\Controllers\Frontend\UserPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\FriendController;
use App\Http\Controllers\Frontend\SearchController;
use App\Models\User;


//catch clear
Route::get('clear', function () {
    \Artisan::call('optimize:clear');
    return "Optimize cache cleared!";
});
Route::post('/send-otp', [AuthenticationController::class, 'userSendOTP']);
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search/recent/save', [SearchController::class, 'saveRecent'])->name('search.recent.save');
Route::post('/search/recent/delete', [SearchController::class, 'deleteRecent'])->name('search.recent.delete');
Route::post('/search/recent/clear', [SearchController::class, 'clearRecent'])->name('search.recent.clear');
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/partner', [HomeController::class, 'partnerList'])->name('partner.list');

// Demo route for chat popup
Route::get('/chat-popup-demo', function () {
    return view('demo.chat-popup-demo');
})->name('chat.popup.demo');

// Demo route for SweetAlert test
Route::get('/sweetalert-test', function () {
    return view('demo.sweetalert-test');
})->name('sweetalert.test');

// Demo route for SweetAlert alignment test
Route::get('/sweetalert-alignment-test', function () {
    return view('demo.sweetalert-alignment-test');
})->name('sweetalert.alignment.test');

Route::middleware(['auth', 'verified'])->group(function () {
    // User Profile Routes (specific first)
    Route::get('profile/edit', [UserProfileController::class, 'editProfile'])->name('user.edit-profile');
    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.profile-update');
    Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('user.change-password');
    Route::get('/profile/cv/download', [UserProfileController::class, 'downloadCV'])->name('user.cv.download');
    Route::post('update-cover-photo', [UserProfileController::class, 'updateCoverPhoto'])->name('user.update-cover-photo');
    Route::post('update-profile-photo', [UserProfileController::class, 'updateProfilePhoto'])->name('user.update-profile-photo');

    // Own profile
    Route::get('profile', [UserProfileController::class, 'userProfile'])->name('user.profile');

    // Unified profile route: accepts numeric id OR username
    Route::get('profile/{identifier}', [UserProfileController::class, 'showByIdentifier'])
        ->where('identifier', '[A-Za-z0-9._-]+') // reserved words like 'edit' already matched above
        ->name('user.profile.show');

    Route::get('profile/{identifier}/photos', [UserProfileController::class, 'allPhotos'])
        ->where('identifier', '[A-Za-z0-9._-]+')
        ->name('user.profile.photos');

    //    User Post Routes
    Route::get('/posts/{post}', [UserPostController::class, 'show'])->name('posts.show');
    Route::post('/user/post/store', [UserPostController::class, 'store'])->name('user.post.store');
    Route::put('/user/posts/{post}', [UserPostController::class, 'update'])->name('user.post.update');
    Route::delete('/user/posts/{post}', [UserPostController::class, 'destroy'])->name('user.post.destroy');


    // Reaction Routes
    Route::match(['POST', 'DELETE'], '/react/post/{post}', [ReactionController::class, 'reactPost'])
        ->name('reactions.react.post');
    Route::match(['POST', 'DELETE'], '/react/comment/{comment}', [ReactionController::class, 'reactComment'])
        ->name('reactions.react.comment');

    // Comment Routes
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->name('posts.comments.store');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])
        ->name('comments.reply');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');
    Route::post('/comments/{comment}/hide', [CommentController::class, 'hide'])
        ->name('comments.hide');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])
        ->name('comments.update');

    Route::post('/follow/{user}', [FollowController::class, 'follow']);
    Route::post('/unfollow/{user}', [FollowController::class, 'unfollow']);
    Route::post('/toggle-notification/{user}', [FollowController::class, 'toggleNotification']);

    // Friend Request Routes
    Route::post('/friend-request/send/{receiverId}', [FriendController::class, 'sendRequest'])->name('friend.request.send');
    Route::post('/friend-request/accept/{requestId}', [FriendController::class, 'acceptRequest'])->name('friend.request.accept');
    Route::post('/friend-request/decline/{requestId}', [FriendController::class, 'declineRequest'])->name('friend.request.decline');
    Route::get('/friends/list', [FriendController::class, 'getFriends'])->name('friends.list');
    Route::get('/friends/relative', [FriendController::class, 'getRelativeFriends'])->name('friends.relative');
    Route::get('/friends/requests', [FriendController::class, 'getPendingRequests'])->name('friend.requests');


    Route::post('/notifications/mark-read', function () {
        if (Auth::check()) {
            Auth::user()->unreadNotifications->markAsRead();
        }
        return response()->json(['success' => true]);
    })->name('mark.notifications.read');

    Route::post('/notifications/mark-read/{id}', function ($id) {
        if (Auth::check()) {
            $notification = Auth::user()->unreadNotifications()->find($id);
            if ($notification) {
                $notification->markAsRead();
            }
        }
        return response()->json(['success' => true]);
    })->name('mark.notification.read');



    // Messenger Routes
    Route::get('messenger', [MessageController::class, 'index'])->name('messenger.index');
    Route::get('messenger/popup', [MessageController::class, 'popup'])->name('messenger.popup');
    Route::post('messenger/quick-send', [MessageController::class, 'quickSend'])->name('messenger.quick-send');
    Route::get('messenger/user-search', [MessageController::class, 'userSearch'])->name('messenger.user-search');

    Route::post('profile', [UserProfileController::class, 'update'])->name('profile.update');
    // search route
    Route::get('messenger/search', [MessageController::class, 'search'])->name('messenger.search');
    // fetch user by id
    Route::get('messenger/id-info', [MessageController::class, 'fetchIdInfo'])->name('messenger.id-info');
    // send message
    Route::post('messenger/send-message', [MessageController::class, 'sendMessage'])->name('messenger.send-message');
    // fetch message
    Route::get('messenger/fetch-messages', [MessageController::class, 'fetchMessages'])->name('messenger.fetch-messages');
    // fetch contacts
    Route::get('messenger/fetch-contacts', [MessageController::class, 'fetchContacts'])->name('messenger.fetch-contacts');
    Route::get('messenger/update-contact-item', [MessageController::class, 'updateContactItem'])->name('messenger.update-contact-item');
    Route::post('messenger/make-seen', [MessageController::class, 'makeSeen'])->name('messenger.make-seen');
    // favorite routes
    Route::post('messenger/favorite', [MessageController::class, 'favorite'])->name('messenger.favorite');
    Route::get('messenger/fetch-favorite', [MessageController::class, 'fetchFavoritesList'])->name('messenger.fetch-favorite');
    Route::delete('messenger/delete-message', [MessageController::class, 'deleteMessage'])->name('messenger.delete-message');

    // Comment Notification Redirect Route
    Route::get('/notification/comment/{post}/{comment}', function ($postId, $commentId) {
        // Optionally, mark notification as read here if notification id is passed as query param
        return redirect()->route('posts.show', ['post' => $postId]) . '#comment-' . $commentId;
    })->name('notification.comment');
});
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
