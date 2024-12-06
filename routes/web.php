<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/my-account',[HomeController::class, 'myAccount'])->name('user.account');
Route::get('my-products', [HomeController::class, 'myProducts'])->name('my-products');


Route::group(["prefix" => "shop"], function() {
    Route::get('/', [HomeController::class, 'shop'])->name('shop');
    Route::get('/product/{id}', [HomeController::class, 'productDetails'])->name('shop.item');
});

Route::get('/dashboard', function () {
    $productsCount = Product::count();
    $categoriesCount = Category::count();
    $usersCount = User::count();

    return Inertia::render('Dashboard', [
        'productsCount' => $productsCount,
        'categoriesCount' => $categoriesCount,
        'usersCount' => $usersCount,
        'products' => Product::where('user_id', auth()->id())->take(5)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('create-product', [ProductController::class, 'create'])->name('create-product');
    Route::post('store-product', [ProductController::class, 'store'])->name('store-product');

    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('product.delete');

});

require __DIR__.'/auth.php';
