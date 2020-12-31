<?php

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

//Clear route cache:
 Route::get('/route-cache', function() {
     $exitCode = Artisan::call('route:cache');
     return 'Routes cache cleared';
 });

 //Clear config cache:
 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
     return 'Config cache cleared';
 }); 

// Clear application cache:
 Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

 // Clear view cache:
 Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return 'View cache cleared';
 });


Route::get('/', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/home', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/item-list/{id}', [App\Http\Controllers\PageController::class, 'ItemList']);
Route::get('/single-item/{id}', [App\Http\Controllers\PageController::class, 'singleItem']);
Route::get('/contact', [App\Http\Controllers\PageController::class, 'Contact']);
Route::get('/about', [App\Http\Controllers\PageController::class, 'About']);
Route::get('/customer-register', [App\Http\Controllers\PageController::class, 'CustomerRegister']);

Route::post('/save-customer', [App\Http\Controllers\PageController::class, 'SaveCustomer']);
Route::POST('/verify-customer', [App\Http\Controllers\PageController::class, 'verifyCustomer']);

Route::POST('/save-cart', [App\Http\Controllers\BookingController::class, 'saveCart']);
Route::POST('/save-address', [App\Http\Controllers\BookingController::class, 'saveAddress']);

Route::get('/order-page/{id}', [App\Http\Controllers\BookingController::class, 'orderPage']);

Route::get('/coupon-code-apply/{customer_id}/{code}/{value}', [App\Http\Controllers\BookingController::class, 'couponApply']);

Route::POST('/save-booking', [App\Http\Controllers\BookingController::class, 'saveBooking']);


Route::get('/order-confirm/{id}', [App\Http\Controllers\BookingController::class, 'orderConfirm']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//AutoComplete
Route::get('/get-package', [App\Http\Controllers\AutoCompleteController::class, 'getPackage']);
Route::get('/get-package/{id}', [App\Http\Controllers\AutoCompleteController::class, 'getPackageID']);
Route::POST('/search-package', [App\Http\Controllers\AutoCompleteController::class, 'searchPackage']);


Route::group(['prefix' => 'admin'],function(){

	Route::get('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'login'])->name('admin.login.submit');
	Route::get('/logout', [App\Http\Controllers\AdminLogin\LoginController::class, 'logout'])->name('admin.logout');

	Route::post('/password/email', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
	Route::get('/password/reset', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
	Route::post('/password/reset', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'reset']);
	Route::get('/password/reset/{token}', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

	//dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');
    
    //category
    Route::get('/category', [App\Http\Controllers\Admin\ItemController::class, 'Category']);
    Route::post('/save-category', [App\Http\Controllers\Admin\ItemController::class, 'saveCategory']);
    Route::post('/update-category', [App\Http\Controllers\Admin\ItemController::class, 'updateCategory']);
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\ItemController::class, 'editCategory']);
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admin\ItemController::class, 'deleteCategory']);

    Route::get('/sub-category/{id}', [App\Http\Controllers\Admin\ItemController::class, 'SubCategory']);
    Route::post('/save-sub-category', [App\Http\Controllers\Admin\ItemController::class, 'saveSubCategory']);
    Route::post('/update-sub-category', [App\Http\Controllers\Admin\ItemController::class, 'updateSubCategory']);
    Route::get('/edit-sub-category/{id}', [App\Http\Controllers\Admin\ItemController::class, 'editSubCategory']);
    Route::get('/delete-sub-category/{id}', [App\Http\Controllers\Admin\ItemController::class, 'deleteSubCategory']);

    //item
    Route::get('/item', [App\Http\Controllers\Admin\ItemController::class, 'index']);
    Route::post('/save-item', [App\Http\Controllers\Admin\ItemController::class, 'saveItem']);
    Route::post('/update-item', [App\Http\Controllers\Admin\ItemController::class, 'updateItem']);
    Route::get('/edit-item/{id}', [App\Http\Controllers\Admin\ItemController::class, 'editItem']);
    Route::get('/delete-item/{id}', [App\Http\Controllers\Admin\ItemController::class, 'deleteItem']);

    //tags
    Route::get('/tags', [App\Http\Controllers\Admin\ItemController::class, 'Tags']);
    Route::post('/save-tags', [App\Http\Controllers\Admin\ItemController::class, 'saveTags']);
    Route::post('/update-tags', [App\Http\Controllers\Admin\ItemController::class, 'updateTags']);
    Route::get('/edit-tags/{id}', [App\Http\Controllers\Admin\ItemController::class, 'editTags']);
    Route::get('/delete-tags/{id}', [App\Http\Controllers\Admin\ItemController::class, 'deleteTags']);

    //FoodPackage
    Route::get('/add-food-package', [App\Http\Controllers\Admin\PackageController::class, 'addPackage']);
    Route::get('/food-package', [App\Http\Controllers\Admin\PackageController::class, 'foodPackage']);
    Route::post('/save-food-package', [App\Http\Controllers\Admin\PackageController::class, 'saveFoodPackage']);
    Route::post('/update-food-package', [App\Http\Controllers\Admin\PackageController::class, 'updateFoodPackage']);
    Route::get('/edit-food-package/{id}', [App\Http\Controllers\Admin\PackageController::class, 'editFoodPackage']);
    Route::get('/delete-food-package/{id}', [App\Http\Controllers\Admin\PackageController::class, 'deleteFoodPackage']);


    //kitchen
    Route::get('/kitchen', [App\Http\Controllers\Admin\KitchenController::class, 'Kitchen']);
    Route::post('/save-kitchen', [App\Http\Controllers\Admin\KitchenController::class, 'saveKitchen']);
    Route::post('/update-kitchen', [App\Http\Controllers\Admin\KitchenController::class, 'updateKitchen']);
    Route::get('/edit-kitchen/{id}', [App\Http\Controllers\Admin\KitchenController::class, 'editKitchen']);
    Route::get('/delete-kitchen/{id}', [App\Http\Controllers\Admin\KitchenController::class, 'deleteKitchen']);


    //customer
    Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'Customer']);
    Route::get('/customer-details/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'customerDetails']);

    // coupon Management
    Route::get('/coupon',[App\Http\Controllers\Admin\CouponController::class, 'index']);
    Route::get('/add-coupon',[App\Http\Controllers\Admin\CouponController::class, 'addCoupon']);
    Route::get('/view-coupon/{id}',[App\Http\Controllers\Admin\CouponController::class, 'viewCoupon']);
    Route::post('/coupon-save',[App\Http\Controllers\Admin\CouponController::class, 'CouponSave']);
    Route::post('/coupon-update',[App\Http\Controllers\Admin\CouponController::class, 'CouponUpdate']);
    Route::get('/coupon-edit/{id}',[App\Http\Controllers\Admin\CouponController::class, 'CouponEdit']);
    Route::get('/coupon-delete/{id}',[App\Http\Controllers\Admin\CouponController::class, 'CouponDelete']);
    Route::get('/get_coupon_user/{id}',[App\Http\Controllers\Admin\CouponController::class, 'get_coupon_user']);

    //city
    Route::get('/city', [App\Http\Controllers\Admin\HomeController::class, 'City']);
    Route::post('/save-city', [App\Http\Controllers\Admin\HomeController::class, 'saveCity']);
    Route::post('/update-city', [App\Http\Controllers\Admin\HomeController::class, 'updateCity']);
    Route::get('/edit-city/{id}', [App\Http\Controllers\Admin\HomeController::class, 'editCity']);
    Route::get('/delete-city/{id}', [App\Http\Controllers\Admin\HomeController::class, 'deleteCity']);


    //booking
    Route::get('/booking-details', [App\Http\Controllers\Admin\BookingController::class, 'bookingDetails']);
    


    Route::get('/edit-profile', [App\Http\Controllers\Admin\HomeController::class, 'editProfile']);
    Route::POST('/update-profile', [App\Http\Controllers\Admin\HomeController::class, 'updateProfile']);

    Route::get('/chat-to-customer', [App\Http\Controllers\Admin\ChatController::class, 'chatToCustomer']);
    Route::get('/get-customer-chat/{id}', [App\Http\Controllers\Admin\ChatController::class, 'getCustomerChat']);
    Route::post('/save-customer-chat', [App\Http\Controllers\Admin\ChatController::class, 'saveCustomerChat']);

});


Route::group(['prefix' => 'kitchen'],function(){

	Route::get('/login', [App\Http\Controllers\KitchenLogin\LoginController::class, 'showLoginForm'])->name('kitchen.login');
	Route::post('/login', [App\Http\Controllers\KitchenLogin\LoginController::class, 'login'])->name('kitchen.login.submit');
	Route::get('/logout', [App\Http\Controllers\KitchenLogin\LoginController::class, 'logout'])->name('kitchen.logout');

	Route::post('/password/email', [App\Http\Controllers\KitchenLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('kitchen.password.email');
	Route::get('/password/reset', [App\Http\Controllers\KitchenLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('kitchen.password.request');
	Route::post('/password/reset', [App\Http\Controllers\KitchenLogin\ResetPasswordController::class, 'reset']);
	Route::get('/password/reset/{token}', [App\Http\Controllers\KitchenLogin\ResetPasswordController::class, 'showResetForm'])->name('kitchen.password.reset');

    Route::get('/dashboard', [App\Http\Controllers\Kitchen\HomeController::class, 'dashboard'])->name('kitchen.dashboard');

    Route::get('/customer', [App\Http\Controllers\Kitchen\CustomerController::class, 'index']);
    Route::get('/customer-profile/{id}', [App\Http\Controllers\Kitchen\CustomerController::class, 'customerProfile']);


    Route::get('/edit-profile', [App\Http\Controllers\Kitchen\HomeController::class, 'editProfile']);
    Route::POST('/update-profile', [App\Http\Controllers\Kitchen\HomeController::class, 'updateProfile']);

    Route::get('/change-password', [App\Http\Controllers\Kitchen\HomeController::class, 'viewChangePassword']);
    Route::POST('/change-password', [App\Http\Controllers\Kitchen\HomeController::class, 'updateChangePassword']);


});


Route::group(['prefix' => 'customer'],function(){


    Route::get('/dashboard', [App\Http\Controllers\Customer\HomeController::class, 'dashboard'])->name('customer.dashboard');

    Route::get('/view-profile', [App\Http\Controllers\Customer\ProfileController::class, 'viewProfile']);
    Route::post('/update-profile', [App\Http\Controllers\Customer\ProfileController::class, 'updateProfile']);

    Route::get('/view-location', [App\Http\Controllers\Customer\ProfileController::class, 'viewLocation']);
    Route::post('/save-location', [App\Http\Controllers\Customer\ProfileController::class, 'saveLocation']);

    Route::get('/booking', [App\Http\Controllers\Customer\BookingController::class, 'getBooking']);
    // Route::get('/customer-profile/{id}', [App\Http\Controllers\Customer\CustomerController::class, 'customerProfile']);

    Route::get('/view-package/{id}', [App\Http\Controllers\Customer\BookingController::class, 'viewPackage']);

    Route::get('/available-coupon', [App\Http\Controllers\Customer\ProfileController::class, 'availableCoupon']);

    Route::get('/chat-to-admin', [App\Http\Controllers\Customer\ChatController::class, 'chatToAdmin']);
    Route::get('/get-customer-chat/{id}', [App\Http\Controllers\Customer\ChatController::class, 'getCustomerChat']);
    Route::post('/save-customer-chat', [App\Http\Controllers\Customer\ChatController::class, 'saveCustomerChat']);


    Route::get('/change-password', [App\Http\Controllers\Customer\ProfileController::class, 'viewChangePassword']);
    Route::POST('/change-password', [App\Http\Controllers\Customer\ProfileController::class, 'updateChangePassword']);


});
