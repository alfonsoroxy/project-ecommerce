<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\FaqComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;

//User Components
use App\Http\Livewire\User\UserDashboardComponent;

//User Order Components
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;

//User Review Components
use App\Http\Livewire\User\UserReviewComponent;


//Admin Components
use App\Http\Livewire\Admin\AdminDashboardComponent;

//Admin Category Components
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;

//Admin Product Components
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;

//Admin Order Components
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;

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
//     return view('welcome');
// });

Route::get('/about', AboutComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/contact', ContactComponent::class)->name('contact');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/faq', FaqComponent::class);

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Authentication
// For User or Customer
  Route::middleware(['auth:sanctum', 'verified'])->group(function(){
      Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

      Route::get('user/orders', UserOrdersComponent::class)->name('user.orders');
      Route::get('user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.ordersdetails');

      Route::get('user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
  });

// For Admin
  Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
      Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

      Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
      Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
      Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');

      Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
      Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
      Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

      Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
      Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.ordersdetails');
  });
