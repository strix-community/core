<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */


declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Strix\Http\Controllers\Auth\OAuthController;
use Strix\Http\Controllers\Forums\Board\BoardController;
use Strix\Http\Controllers\Forums\Category\CategoryController;
use Strix\Http\Controllers\Forums\ForumController;
use Strix\Http\Controllers\Forums\Thread\ThreadController;

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


Route::get('/test', function () {
    return view('pages.test');
});

Route::post('/test', function () {
    dd(clean(request()->get('content')));
});

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('oauth/{provider}', [OAuthController::class, 'redirectToProvider'])
        ->name('oauth.redirect');

    Route::get('oauth/callback/{provider}', [OAuthController::class, 'handleProviderCallback'])
        ->name('oauth.callback');
});


Route::group(['prefix' => 'forums'], function () {
    Route::get('/', [ForumController::class, '__invoke'])
        ->name('index');

    Route::get('category/some-category', [CategoryController::class, '__invoke'])
        ->name('category.show');

    Route::get('board/some-board', [BoardController::class,  '__invoke'])
        ->name('board.show');

    Route::get('thread/some-thread', [ThreadController::class, 'show'])
        ->name('thread.show');
});
