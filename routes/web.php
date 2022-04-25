<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; 
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
Route::group(['middleware' => 'auth'], function () {
    // 本のダッシュボード表示
Route::get('/', [BookController::class, 'index']);

// 新「本」を追加
Route::post('/books', [BookController::class, 'store']);

//「本」の更新画面表示
Route::get('/booksedit/{book}',[BookController::class, 'edit']);

//「本」の更新処理
Route::post('books/update',[BookController::class, 'update']);

// 本を削除
Route::delete('/book/{book}', [BookController::class, 'destroy']);

// ログインユーザの本を取得
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

	
	Route::get('/admin', [BookController::class, 'adminIndex']);




});


// // 管理者ページ
// Route::middleware(['AdminMiddleware'])->group(function(){
//  	Route::get('/admin', [BookController::class, 'adminIndex']);
// });







Route::get('/mail', [MailController::class, 'index']);
Route::post('/mail', [MailController::class, 'send']);


Auth::routes();


// Route::get('/pivot', function(){ 
//     $user=User::find(1);
//     foreach ($user->roles as $role) {
//         echo $role->pivot;
//     }
// });
