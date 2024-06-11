<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('tweets');
});

Auth::routes(['verify' => true]);

// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    // ユーザ関連
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

    // ユーザー検索ルートを追加
    Route::get('users/search', 'UsersController@search')->name('users.search');

    Route::resource('comments', 'CommentsController', ['only' => ['store']]);

    Route::resource('favorites', 'FavoritesController', ['only' => ['store', 'destroy']]);

    // ツイート関連
    Route::resource('tweets', 'TweetsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('about/about','aboutController@about');
    Route::get('about/rule','rulecontroller@rule');
    Route::get('footer', 'footerController@footer');
    Route::get('First', 'FirstController@First');

    Route::get('profile', function () {
        // Only verified users may enter...
    })->middleware('verified');

    // Twitterログイン関連
    Route::get('/login/{social}', 'Auth\OAuthLoginController@socialLogin')->where('social', 'twitter');
    Route::get('/login/{social}/callback', 'Auth\OAuthLoginController@handleProviderCallback')->where('social', 'twitter');

});
