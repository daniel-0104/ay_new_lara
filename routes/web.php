<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ajaxController;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\GloveController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\trendController;
use App\Http\Controllers\HelmetController;
use App\Http\Controllers\JacketController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::middleware(['admin_auth'])->group(function(){
    Route::redirect('/','loginPage');
    Route::get('loginPage',[authController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[authController::class,'registerPage'])->name('auth#registerPage');
});


Route::middleware(['auth'])->group(function(){
    //dashboard
    Route::get('dashboard',[authController::class,'dashboard'])->name('dashboard');

    //admin middleware start
    Route::middleware('admin_auth')->group(function(){
        // admin > home
        Route::prefix('admin')->group(function(){
            //account
            Route::prefix('account')->group(function(){
                Route::get('profile',[adminController::class,'accountProfile'])->name('account#profile');
                Route::get('edit',[adminController::class,'accountEdit'])->name('account#edit');
                Route::post('update/{id}',[adminController::class,'accountUpdate'])->name('account#update');
            });

            //password
            Route::prefix('password')->group(function(){
                Route::get('change',[adminController::class,'passChangePage'])->name('pass#changePage');
                Route::post('change/{id}',[adminController::class,'passChange'])->name('pass#change');
            });

            //user list
            Route::prefix('user')->group(function(){
                Route::get('list',[adminController::class,'userList'])->name('user#list');
                Route::get('change/role',[adminController::class,'userChangeRole'])->name('user#changeRole');
                Route::get('delete/{id}',[adminController::class,'userDelete'])->name('user#delete');
            });

            //admin list
            Route::prefix('list')->group(function(){
                Route::get('page',[adminController::class,'listPage'])->name('list#page');
                Route::get('change/role',[adminController::class,'changeRole'])->name('change#role');
                Route::get('delete/{id}',[adminController::class,'listDelete'])->name('list#delete');
            });

            //category
            Route::prefix('category')->group(function(){
                Route::get('create',[CategoryController::class,'createPage'])->name('create#page');
                Route::post('create',[CategoryController::class,'categoryCreate'])->name('category#create');
                Route::get('list',[CategoryController::class,'categoryList'])->name('admin#homePage');
                Route::get('edit/{id}',[CategoryController::class,'categoryEdit'])->name('category#edit');
                Route::post('update',[CategoryController::class,'categoryUpdate'])->name('category#update');
                Route::get('delete,{id}',[CategoryController::class,'categoryDelete'])->name('category#delete');
            });

            //trend
            Route::prefix('trend')->group(function(){
                Route::get('list',[trendController::class,'trendList'])->name('trend#list');
                Route::get('create',[trendController::class,'trendCreatePage'])->name('trend#createPage');
                Route::post('create',[trendController::class,'trendCreate'])->name('trend#create');
                Route::get('edit/{id}',[trendController::class,'trendEdit'])->name('trend#edit');
                Route::post('update',[trendController::class,'trendUpdate'])->name('trend#update');
                Route::get('delete/{id}',[trendController::class,'trendDelete'])->name('trend#delete');
            });

            //product
            Route::prefix('product')->group(function(){
                Route::get('list',[ProductController::class,'productList'])->name('product#list');
                Route::get('create',[ProductController::class,'createPage'])->name('product#createPage');
                Route::post('create',[ProductController::class,'productCreate'])->name('product#create');
                Route::get('view/{id}',[ProductController::class,'productView'])->name('product#view');
                Route::get('edit/{id}',[ProductController::class,'productEdit'])->name('product#edit');
                Route::post('update',[ProductController::class,'productUpdate'])->name('product#update');
                Route::get('delete/{id}',[ProductController::class,'productDelete'])->name('product#delete');
            });

            Route::prefix('accessories')->group(function(){
                //helmet
                Route::prefix('helmet')->group(function(){
                    Route::get('list',[HelmetController::class,'helmetList'])->name('helmet#list');
                    Route::get('create',[HelmetController::class,'helmetCreatePage'])->name('helmet#createPage');
                    Route::post('create',[HelmetController::class,'helmetCreate'])->name('helmet#create');
                    Route::get('view/{id}',[HelmetController::class,'helmetView'])->name('helmet#view');
                    Route::get('edit/{id}',[HelmetController::class,'helmetEdit'])->name('helmet#edit');
                    Route::post('update',[HelmetController::class,'helmetUpdate'])->name('helmet#update');
                    Route::get('delete/{id}',[HelmetController::class,'helmetDelete'])->name('helmet#delete');
                });

                //jacket
                Route::prefix('jacket')->group(function(){
                    Route::get('list',[JacketController::class,'jacketList'])->name('jacket#list');
                    Route::get('create',[JacketController::class,'jacketCreatePage'])->name('jacket#createPage');
                    Route::post('create',[JacketController::class,'jacketCreate'])->name('jacket#create');
                    Route::get('view/{id}',[JacketController::class,'jacketView'])->name('jacket#view');
                    Route::get('edit/{id}',[JacketController::class,'jacketEdit'])->name('jacket#edit');
                    Route::post('update',[JacketController::class,'jacketUpdate'])->name('jacket#update');
                    Route::get('delete/{id}',[JacketController::class,'jacketDelete'])->name('jacket#delete');
                });

                //Glove
                Route::prefix('glove')->group(function(){
                    Route::get('list',[GloveController::class,'gloveList'])->name('glove#list');
                    Route::get('create',[GloveController::class,'gloveCreatePage'])->name('glove#createPage');
                    Route::post('create',[GloveController::class,'gloveCreate'])->name('glove#create');
                    Route::get('view/{id}',[GloveController::class,'gloveView'])->name('glove#view');
                    Route::get('edit/{id}',[GloveController::class,'gloveEdit'])->name('glove#edit');
                    Route::post('update',[GloveController::class,'gloveUpdate'])->name('glove#update');
                    Route::get('delete/{id}',[GloveController::class,'gloveDelete'])->name('glove#delete');
                });
            });

            //order
            Route::prefix('order')->group(function(){
                Route::get('list',[OrderController::class,'orderList'])->name('order#list');
                Route::get('view/{orderCode}',[OrderController::class,'orderView'])->name('order#view');
                Route::get('status/change',[OrderController::class,'orderStatus'])->name('order#status');
                Route::match(['get', 'post'], 'status/search', [OrderController::class, 'orderSearch'])->name('order#Search');
                Route::get('list/delete/{orderCode}',[OrderController::class,'orderDelete'])->name('order#listDelete');
            });

            //contact
            Route::prefix('contact')->group(function(){
                Route::get('list',[ContactController::class,'contactList'])->name('contact#list');
                Route::get('delete/{id}',[ContactController::class,'contactDelete'])->name('contact#delete');
            });

            //rating comments
            Route::prefix('rating')->group(function(){
                Route::get('list',[RatingController::class,'ratingList'])->name('rating#list');
            });
        });
    });
    //admin middleware end

    //user middleware start
    Route::middleware('user_auth')->group(function(){
        // user > home
        Route::prefix('user')->group(function(){
            Route::get('homePage',[userController::class,'userHomePage'])->name('user#homePage');
            Route::get('trend/product/{name}',[userController::class,'userProduct'])->name('user#product');

            // account
            Route::prefix('account')->group(function(){
                Route::get('profile',[userController::class,'userAcc'])->name('user#accountpfp');
                Route::post('profileUpdate/{id}',[userController::class,'userpfpUpdate'])->name('user#accountpfpUpdate');
            });

            //password
            Route::prefix('password')->group(function(){
                Route::get('change',[userController::class,'changePassPage'])->name('user#changePassPage');
                Route::post('change',[userController::class,'changePass'])->name('user#changePass');
            });

            //product
            Route::prefix('product')->group(function(){
                Route::get('list',[userController::class,'productList'])->name('user#productList');
                Route::get('fliter/{id}',[userController::class,'productFliter'])->name('user#productFliter');
                Route::get('history',[userController::class,'productHistory'])->name('user#productHistory');
            });

            //accessories
            Route::prefix('accessories')->group(function(){
                Route::prefix('helemt')->group(function(){
                    Route::get('view/{id}',[userController::class,'helmetView'])->name('user#helmetView');
                });

                Route::prefix('jacket')->group(function(){
                    Route::get('view/{id}',[userController::class,'jacketView'])->name('user#jacketView');
                });

                Route::prefix('glove')->group(function(){
                    Route::get('view/{id}',[userController::class,'gloveView'])->name('user#gloveView');
                });
            });

            //cart
            Route::prefix('cart')->group(function(){
                Route::get('list',[userController::class,'cartList'])->name('cart#list');
            });

            //detail
            Route::prefix('detail')->group(function(){
                Route::get('view/{id}',[userController::class,'detailView'])->name('detail#view');

                //rating
                Route::prefix('rating')->group(function(){
                    Route::get('count',[RatingController::class,'ratingCount'])->name('user#ratingCount');
                    Route::get('review',[RatingController::class,'ratingReview'])->name('user#ratingReview');
                });
            });

            //ajax
            Route::prefix('ajax')->group(function(){
                Route::get('sorting',[ajaxController::class,'ajaxSorting'])->name('ajax#sorting');
                Route::get('products/category', [ajaxController::class,'getProductsByCategory'])->name('ajax#productCategory');
                Route::get('cart',[ajaxController::class,'addToCart'])->name('ajax#addToCart');
                Route::get('cart/remove',[ajaxController::class,'cartRemove'])->name('ajax#cartRemove');
                Route::get('cart/clear',[ajaxController::class,'cartClear'])->name('ajax#cartClear');
                Route::get('cart/order',[ajaxController::class,'cartOrder'])->name('ajax#cartOrder');
            });

            //about us
            Route::prefix('about')->group(function(){
                Route::get('read',[userController::class,'aboutPage'])->name('user#aboutPage');
            });

            //contact
            Route::prefix('contact')->group(function(){
                Route::get('map',[ContactController::class,'contactPage'])->name('user#contactPage');
                Route::post('message',[ContactController::class,'contactMessage'])->name('user#contactMessage');
            });
        });
    });
    //user middleware end

});
