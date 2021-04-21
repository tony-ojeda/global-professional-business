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

Route::get('/admin/testing', [
    'uses' => 'Web\BackendController@testing',
    'as' => 'testing'
]);

Route::post('/adminpaypal/pay', [
    'uses' => 'Web\PayPalController@pay',
    'as' => 'paypal.pay'
]);

Route::get('/adminpaypal/approval', [
    'uses' => 'Web\PayPalController@approval',
    'as' => 'paypal.approval'
]);

Route::get('/adminpaypal/cancel', [
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
], function(){

    Route::get('/', [
        'uses' => 'BackendController@index',
        'as' => 'home'
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


Route::group([
    'as' => 'frontend.',
    'namespace' => 'Frontend'
], function(){
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

    /**
     * Login
     */
    Route::get('iniciar-sesion', [
        'uses' => 'LoginController@index',
        'as' => 'login'
    ]);

    Route::post('iniciar-sesion/validar', [
        'uses' => 'LoginController@login',
        'as' => 'login.validate'
    ]);

    /**
     * Registro
     */
    Route::get('registro', [
        'uses' => 'LoginController@register',
        'as' => 'register'
    ]);

    Route::post('registro/validar', [
        'uses' => 'LoginController@newUser',
        'as' => 'register.validate'
    ]);

    /**
     * Directorio
     */
    Route::get('directorio', [
        'uses' => 'DirectoryController@index',
        'as' => 'directory'
    ]);

    Route::get('directorio/registro', [
        'uses' => 'DirectoryController@newBusiness',
        'as' => 'directory.register'
    ]);
});
