<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FollowController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ReactionController;
use App\Http\Controllers\Frontend\UserPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Frontend\UserProfileController;

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/partner', [HomeController::class, 'partnerList'])->name('partner.list');
Route::middleware(['auth', 'verified'])->group(function () {
    //    User Profile Routes
    Route::get('profile', [UserProfileController::class, 'userProfile'])->name('user.profile');
    Route::get('profile/edit', [UserProfileController::class, 'editProfile'])->name('user.edit-profile');
    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.profile-update');
    Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('user.change-password');

    Route::post('update-cover-photo', [UserProfileController::class, 'updateCoverPhoto'])->name('user.update-cover-photo');
    Route::post('update-profile-photo', [UserProfileController::class, 'updateProfilePhoto'])->name('user.update-profile-photo');

    //    User Post Routes
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

    Route::post('/follow/{user}', [FollowController::class, 'follow']);
    Route::post('/unfollow/{user}', [FollowController::class, 'unfollow']);
    Route::post('/toggle-notification/{user}', [FollowController::class, 'toggleNotification']);


    Route::post('/notifications/mark-read', function () {
        if (Auth::check()) {
            Auth::user()->unreadNotifications->markAsRead();
        }
        return response()->json(['success' => true]);
    })->name('mark.notifications.read');



    // Messenger Routes
    Route::get('messenger', [MessageController::class, 'index'])->name('messenger.index');
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

});



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
