<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TodayFoodController;
use App\Http\Controllers\UserDietsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
//     Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

//     Route::group(['middleware' => 'adminauth'], function () {
//         Route::get('/', function () {
//             return view('admin.auth.welcome_admin');
//         })->name('adminDashboard');

//     });
// });


Route::get('/admin-dashboard/food', [AdminController::class, 'foodAdmin'])->name('food');


Route::get('/admin-dashboard/user', function () {
    return view('admin.auth.welcome_admin');
})->name('user');

Route::get('/admin-dashboard/food/create', function() {
    return view('admin.create_foodAdmin');
});

Route::post('/admin-dashboard/food/create/submit', [AdminController::class, 'createFood_admin']);

Route::get('/admin-dashboard/food/delete/{id}', [AdminController::class, 'delete']);

Route::get('/admin-dashboard/food/edit/{id}', [AdminController::class, 'viewEdit']);

Route::post('/admin-dashboard/food/edit/update', [AdminController::class, 'update']);

Route::get('/dashboard', [FoodController::class, 'all'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/foods_admin', [FoodController::class, 'index'])->middleware(['auth', 'verified'])->name('foods_admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard/food/{id}', [FoodController::class, 'single']);

Route::get('/dashboard/search', [FoodController::class, 'search']);
Route::get('/dashboard/saved', [FoodController::class, 'saved'])->name("saved");

Route::get('/foods_admin/create', [FoodController::class, 'create']);

Route::get('/makanan', [FoodController::class, 'all']);
Route::get('/like/{id}', [FoodController::class, 'like']);
Route::get('/save/{id}', [FoodController::class, 'save']);
Route::get('/unsave/{id}', [FoodController::class, 'unsave']);

Route::get('/user-diets', [UserDietsController::class, 'showForm'])->name("user_diets");
Route::get('/show-user-diets', [UserDietsController::class, 'show'])->name("show_user_diets");
Route::post('/user-diets/save', [UserDietsController::class, 'save']);
Route::get('/user-diets/edit', [UserDietsController::class, 'viewEdit']);
Route::post('/user-diets/update', [UserDietsController::class, 'update']);

// Route::get('/today-foods', function () {
//     return view('today_foods');
// })->name('today_foods');

Route::get('/today-foods', [TodayFoodController::class, 'date'])->name('today_foods');
Route::get('/today-foods/add', function () {
    return view('today_food_form');
});
Route::post('/today-foods/add-food', [TodayFoodController::class, 'add']);
Route::get('/today-foods/delete/{id}', [TodayFoodController::class, 'delete']);

Route::get('/today-foods/edit/{id}', [TodayFoodController::class, 'viewEdit']);
Route::post('/today-foods/update', [TodayFoodController::class, 'update']);





require __DIR__ . '/auth.php';
