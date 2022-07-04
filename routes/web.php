<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


// Route::get('/', function () {

//     return Inertia::render('Welcome', [
//         'foo' => 'home',
//     ]);
// });



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



// Route::get('/users', [UsersController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
// Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
// Route::get('/users/{user_id}/edit', [UsersController::class, 'edit']);
// Route::patch('/users/update/{user_id}', [UsersController::class, 'update']);



/* Posts & Blogs */
Route::get('posts', [HomeController::class, 'posts'])->name('posts');
Route::get('posts/category/{any}',[HomeController::class, 'posts']);
Route::get('posts/read/{any}', [HomeController::class, 'read'])->name('blog.single');
Route::post('posts/comment', [HomeController::class, 'comment']);
Route::get('posts/remove/{id?}/{id2?}/{id3?}', [HomeController::class, 'remove']);



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service/single/{id}', [HomeController::class, 'singleService'])->name('service.single');
Route::post('/message', [HomeController::class, 'message'])->name('message');

Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/404', [HomeController::class, 'notFoundPage'])->name('not.found');
Route::post('/message', [HomeController::class, 'message'])->name('message');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/our-team', [HomeController::class, 'team'])->name('team');
Route::get('/career', [HomeController::class, 'career'])->name('career');
Route::get('/our-portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/get-category-portfolio/{id}', [HomeController::class, 'category_portfolio'])->name('category.portfolio');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [HomeController::class, 'termsConditions'])->name('terms-and-conditions');



//Product
Route::get('/single-product/{slug}', [ProductController::class, 'SingleProduct'])->name('single.product');
Route::get('/products', [ProductController::class, 'allProduct'])->name('all.product');


//Cart
Route::get('/cart', [ProductController::class, 'cartPage'])->name('cart.page');