<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\mailbox\MailboxController;
use App\Http\Controllers\tech_support\TechController;
use App\Http\Controllers\preview\PreviewController;
use App\Http\Controllers\profile\ProfileController;
use App\Http\Controllers\admin\AdminController;

Auth::routes();

Route::prefix('/')->group(function () {
    Route::get('', [MainPageController::class, 'index'])->name('home.index');
    Route::get('preview', [PreviewController::class, 'index'])->name('preview.index');
});

Route::prefix('/viewforum')->group(function () {
    Route::get('/forum-{id}', [MainPageController::class, 'viewforum'])->name('home.viewforum');
    Route::get('/forum-{id}/search', [MainPageController::class, 'viewforum_search'])->name('home.viewforum.search');
    Route::get('/forum-{id}/posting', [MainPageController::class, 'posting'])->name('viewforum.posting');
    Route::post('/forum-{id}/posting/create', [MainPageController::class, 'create_post'])->name('viewforum.posting.create');
    Route::get('/forum-{id}/topic-{topic_id}', [MainPageController::class, 'viewtopic'])->name('home.viewforum.topic');
    Route::post('/forum-{id}/topic-{topic_id}/message', [MainPageController::class, 'message_create'])->name('home.viewforum.topic.message');
});   

Route::prefix('/profile')->group(function () {
    Route::get('/id-{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/id-{id}/edit', [ProfileController::class, 'profile_edit'])->name('profile.index.edit');
});


Route::group(['namespace'=>'Mailbox'], function(){
    Route::prefix('/mailbox')->group(function () {
        Route::get('', [MailboxController::class, 'index'])->name('mailbox.index');
        Route::delete('/delete', [MailboxController::class, 'message_delete'])->name('mailbox.index.delete');
        Route::get('/message-{id}', [MailboxController::class, 'show_message'])->name('mailbox.message.show');
    });
    Route::prefix('/message/user-{id}')->group(function () {
        Route::get('', [MailboxController::class, 'index_message'])->name('mailbox.message');
        Route::post('send', [MailboxController::class, 'message_send'])->name('mailbox.message.send');
    });
});

Route::group(['middleware' => 'admin'], function(){
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::get('forums', [AdminController::class, 'forums'])->name('admin.forums');
        Route::post('forums/create', [AdminController::class, 'forums_create'])->name('admin.forums.create'); 
        Route::delete('forums/delete-{id}', [AdminController::class, 'forums_delete'])->name('admin.forums.delete');
          
        Route::get('posts', [AdminController::class, 'posts'])->name('admin.posts');
        Route::delete('posts/delete-{id}', [AdminController::class, 'posts_delete'])->name('admin.posts.delete');

        Route::get('messages', [AdminController::class, 'messages'])->name('admin.messages');
        Route::get('messages/delete-{id}', [AdminController::class, 'messages_delete'])->name('admin.messages.delete');

        Route::get('users', [AdminController::class, 'users'])->name('admin.users');  
        Route::delete('users/delete-{id}', [AdminController::class, 'users_delete'])->name('admin.users.delete'); 

        Route::get('users-messages', [AdminController::class, 'users_m'])->name('admin.usersmess');
        Route::get('users-messages/delete-{id}', [AdminController::class, 'users_m_delete'])->name('admin.usersmess.delete');        
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
