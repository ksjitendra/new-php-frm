<?php

use App\Services\Routes;
use App\Middleware\{
    CheckAuth, 
    Guest
};

Routes::get('/', 'HomeController', 'dashboard', [CheckAuth::class]);
Routes::get('/login', 'AuthController', 'index',[Guest::class]);
Routes::post('/saveLogin', 'AuthController', 'login',[Guest::class]);
Routes::get('/register', 'AuthController', 'registerForm', [Guest::class]);
Routes::post('/saveUser', 'AuthController', 'register', [Guest::class]);

Routes::get('/dashboard', 'HomeController', 'dashboard', [CheckAuth::class]);
Routes::get('/logout', 'AuthController', 'logout', [CheckAuth::class]);

Routes::get('/add/category', 'CategoryController', 'addCategory', [CheckAuth::class]);
Routes::post('/save/category', 'CategoryController', 'saveCategory', [CheckAuth::class]);
Routes::get('/all/categories', 'CategoryController', 'fetchCategory', [CheckAuth::class]);

Routes::get('/products', 'ProductController', 'index',  [CheckAuth::class]);
Routes::get('/add/product', 'ProductController', 'add',  [CheckAuth::class]);
Routes::post('/save/product', 'ProductController', 'save',  [CheckAuth::class]);
Routes::post('/update/product', 'ProductController', 'update',  [CheckAuth::class]);
Routes::post('/delete/product', 'ProductController', 'destroy',  [CheckAuth::class]);