<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
//何故か使わないuse App\Models\post が定義されていたため、削除

Route::resource('post', PostController::class);//Sec9-5P.283 リソースコントローラー
//ecxeptやonlyで対象範囲を限定できる(「7個も要らない」と言う話だと、作るときに限定する方法は無いものか。別の意味での有用性がありそう)

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', [TestController::class, 'test'])
->name('test');

//リソースコントローラー使用の為
// Route::post('post', [PostController::class, 'store'])
// ->name('post.store');

// Route::get('post', [PostController::class, 'index'])
// ->name('post.index');

// Route::get('post/create', [PostController::class, 'create']);

// Route::get('post/show/{post}', [PostController::class, 'show'])
// ->name('post.show');

// Route::get('post/{post}/edit', [PostController::class, 'edit'])
// ->name('post.edit');
// Route::patch('post/{post}', [PostController::class, 'update'])
// ->name('post.update');

// Route::delete('post/{post}', [PostController::class, 'destroy'])
// ->name('post.destroy');

require __DIR__.'/auth.php';
