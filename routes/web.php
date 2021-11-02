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
// Route::get('/', function () {
//     return "TEST";
// });

Route::get('/admin/login', [
    'uses' => 'Web\BackendController@login',
    'as' => 'login'
]);

Route::post('/admin/login/ct', [
    'uses' => 'Web\UserController@login',
    'as' => 'login.ct'
]);

// Route::get('/admin/testing', [
//     'uses' => 'Web\BackendController@testing',
//     'as' => 'testing'
// ]);

Route::post('/admin/paypal/pay', [
    'uses' => 'Web\PayPalController@pay',
    'as' => 'paypal.pay'
]);

Route::get('/admin/paypal/approval', [
    'uses' => 'Web\PayPalController@approval',
    'as' => 'paypal.approval'
]);

Route::get('/admin/paypal/cancel', [
    'uses' => 'Web\PayPalController@cancel',
    'as' => 'paypal.cancelled'
]);


// Route::get('/login', [
//     'uses' => 'Web\BackendController@login',
//     'as' => 'loginView'
// ]);


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth','admin'],
    'namespace' => 'Web'
], function () {
    Route::get('/', [
        'uses' => 'BackendController@index',
        'as' => 'home'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@logout',
        'as' => 'logout'
    ]);


    /// CATEGORIES MODULE ///////////////
    Route::get('categories', [
        'uses' => 'BackendController@categories',
        'as' => 'categories'
    ]);

    Route::post('categories/controller', [
        'uses' => 'CategoryController@controller',
        'as' => 'categories.controller'
    ]);

    Route::post('categories/list', [
        'uses' => 'CategoryController@list',
        'as' => 'categories.list'
    ]);

    Route::post('categories/find', [
        'uses' => 'CategoryController@find',
        'as' => 'categories.find'
    ]);

    Route::post('categories/delete', [
        'uses' => 'CategoryController@delete',
        'as' => 'categories.delete'
    ]);
    /// END CATEGORIES MODULE ///////////////
    /// ENTERPRISES MODULE ///////////////
    Route::get('enterprises', [
        'uses' => 'BackendController@enterprises',
        'as' => 'enterprises'
    ]);

    Route::post('enterprises/controller', [
        'uses' => 'EnterpriseController@controller',
        'as' => 'enterprises.controller'
    ]);

    Route::post('enterprises/list', [
        'uses' => 'EnterpriseController@list',
        'as' => 'enterprises.list'
    ]);

    Route::post('enterprises/find', [
        'uses' => 'EnterpriseController@find',
        'as' => 'enterprises.find'
    ]);

    Route::post('enterprises/delete', [
        'uses' => 'EnterpriseController@delete',
        'as' => 'enterprises.delete'
    ]);
    /// END ENTERPRISES MODULE ///////////////
    /// BLOG MODULE ///////////////
    Route::get('blog', [
        'uses' => 'BackendController@blog',
        'as' => 'blog'
    ]);

    Route::post('blog/controller', [
        'uses' => 'BlogController@controller',
        'as' => 'blog.controller'
    ]);

    Route::post('blog/saveImage', [
        'uses' => 'BlogImageController@controller',
        'as' => 'blogImage.controller'
    ]);

    Route::post('blog/list', [
        'uses' => 'BlogController@list',
        'as' => 'blog.list'
    ]);

    Route::post('blog/find', [
        'uses' => 'BlogController@find',
        'as' => 'blog.find'
    ]);

    Route::post('blog/delete', [
        'uses' => 'BlogController@delete',
        'as' => 'blog.delete'
    ]);
    /// END BLOG MODULE ///////////////
    /// TESTIMONIAL MODULE ///////////////
    Route::get('testimoniales', [
        'uses' => 'BackendController@testimonials',
        'as' => 'testimonials'
    ]);

    Route::post('testimoniales/controller', [
        'uses' => 'TestimonialController@controller',
        'as' => 'testimonials.controller'
    ]);

    Route::post('testimoniales/list', [
        'uses' => 'TestimonialController@list',
        'as' => 'testimonials.list'
    ]);

    Route::post('testimoniales/find', [
        'uses' => 'TestimonialController@find',
        'as' => 'testimonials.find'
    ]);

    Route::post('testimoniales/delete', [
        'uses' => 'TestimonialController@delete',
        'as' => 'testimonials.delete'
    ]);
    /// END TESTIMONIAL MODULE ///////////////
    /// VIDEOS MODULE ///////////////
    Route::get('videos', [
        'uses' => 'BackendController@videos',
        'as' => 'videos'
    ]);

    Route::post('videos/controller', [
        'uses' => 'VideoController@controller',
        'as' => 'videos.controller'
    ]);
    /// END VIDEOS MODULE ///////////////
    ////// USERS MODULE
    Route::get('usuarios', [
        'uses' => 'BackendController@users',
        'as' => 'users'
    ]);

    Route::post('usuarios/controller', [
        'uses' => 'UserController@controller',
        'as' => 'users.controller'
    ]);

    Route::post('usuarios/list', [
        'uses' => 'UserController@list',
        'as' => 'users.list'
    ]);

    Route::post('usuarios/delete', [
        'uses' => 'UserController@delete',
        'as' => 'users.delete'
    ]);

    Route::post('usuarios/find', [
        'uses' => 'UserController@find',
        'as' => 'users.find'
    ]);
    /// END USERS MODULE ///////////////
});

/**
 * Recuperar contraseña
 */
Route::post('user/recoverPassword', [
    'uses' => 'Web\UserController@recoverPassword',
    'as' => 'admin.users.recoverPassword'
]);


Route::group([
    'as' => 'frontend.',
    'namespace' => 'Frontend'
], function () {
    /**
     * Home
     */
    Route::get('/', [
        'uses' => 'IndexController@index',
        'as' => 'index'
    ]);

    Route::post('formulario-contacto', [
        'uses' => 'IndexController@sendMessage',
        'as' => 'send_message'
    ]);

    Route::get('privacy-policy', [
        'uses' => 'IndexController@privacyPolicy',
        'as' => 'privacy_policy'
    ]);

    Route::get('terms-and-conditions', [
        'uses' => 'IndexController@termsConditions',
        'as' => 'terms_conditions'
    ]);

    Route::get('search', [
        'uses' => 'SearchController@index',
        'as' => 'search'
    ]);

    /**
     * Login
     */
    Route::get('sign-in', [
        'uses' => 'LoginController@index',
        'as' => 'login'
    ]);

    Route::post('sign-in/validar', [
        'uses' => 'LoginController@login',
        'as' => 'login.validate'
    ]);

    Route::get('logout', [
        'uses' => 'LoginController@logout',
        'as' => 'logout'
    ]);

    /**
     * Registro
     */
    Route::get('sign-up', [
        'uses' => 'LoginController@register',
        'as' => 'register'
    ]);

    Route::post('sign-up/validar', [
        'uses' => 'LoginController@newUser',
        'as' => 'register.validate'
    ]);

    /**
     * Products
     */
    Route::get('products', [
        'uses' => 'ProductsController@index',
        'as' => 'products'
    ]);

    /**
     * Plans
     */
    Route::get('plans', [
        'uses' => 'PlansController@index',
        'as' => 'plans'
    ]);
    /**
     * About Us
     */
    Route::get('about-us', [
        'uses' => 'AboutUsController@index',
        'as' => 'about-us'
    ]);
    /**
     * Blog
     */
    Route::get('blog', [
        'uses' => 'BlogController@index',
        'as' => 'blog'
    ]);

    Route::get('blog/{slug}', [
        'uses' => 'BlogController@post',
        'as' => 'blog.post'
    ]);

    Route::group(['middleware' => 'auth'], function () {
        /**
         * Directorio
         */
        Route::get('directory', [
            'uses' => 'DirectoryController@index',
            'as' => 'directory'
        ]);

        Route::get('directory/my-business', [
            'uses' => 'DirectoryController@myBusiness',
            'as' => 'directory.my_business'
        ]);

        Route::post('directory/my-business/list', [
            'uses' => 'EnterpriseController@list',
            'as' => 'directory.my_business.list'
        ]);

        Route::post('directory/my-business/delete', [
            'uses' => 'EnterpriseController@delete',
            'as' => 'directory.my_business.delete'
        ]);

        Route::get('directory/new-business', [
            'uses' => 'DirectoryController@newBusiness',
            'as' => 'directory.register'
        ]);

        Route::get('directory/update/{enterprise_id}', [
            'uses' => 'DirectoryController@newBusiness',
            'as' => 'directory.update'
        ]);

        Route::post('directory/controller', [
            'uses' => 'EnterpriseController@controller',
            'as' => 'enterprises.controller'
        ]);

        Route::post('directory/controller/delete_banner_image', [
            'uses' => 'EnterpriseController@deleteBannerImage',
            'as' => 'enterprises.controller.delete_banner_image'
        ]);

        Route::get('directory/{slug}', [
            'uses' => 'DirectoryController@business',
            'as' => 'directory.business'
        ]);

        Route::post('directory/send-message', [
            'uses' => 'DirectoryController@sendMessage',
            'as' => 'directory.send_message'
        ]);
    });
});
