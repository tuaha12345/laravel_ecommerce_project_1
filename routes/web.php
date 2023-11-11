<?php

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum','verified'])->get('/dashboard', function(){
        return view('/dashboard');
})->name('dashboard');


Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');

// Route::get('/', function () {
    
//     $data=Product::all();
//     $data=Product::paginate(3);

//     $user=Auth::user();

//         $count=Cart::where('phone',$user->phone)->count();
//         return view('User.home',compact('data','count'));

//     // Route::get('/', [HomeController::class, 'index']);
// });


Route::get('/', function () {
    $data = Product::paginate(3);
    $count = 0; // Default count to 0

    // Check if the user is authenticated
    if (Auth::check()) {
        $user = Auth::user();
        
        // Check if there are cart items for the user
        $count = Cart::where('phone', $user->phone)->count();
    }

    return view('User.home', compact('data', 'count'));
});

Route::get('/product', [AdminController::class, 'product']);
Route::post('/upload_product', [AdminController::class, 'upload_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']); 
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
Route::post('/update_product/{id}', [AdminController::class, 'update_product']);
Route::get('/show_orders', [AdminController::class, 'show_orders']);
Route::get('/update_status/{id}', [AdminController::class, 'update_status']);



//Route::get('/search', [HomeController::class, 'search']);
Route::get('/search', [HomeController::class, 'search'])->name('product.search');
Route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/delete_item/{id}', [HomeController::class, 'delete_item']);
Route::post('/confirm_order', [HomeController::class, 'confirm_order']);