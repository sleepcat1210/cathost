<?php

//Route::get('/', function () {
//    return view('welcome');
//});
//后台
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
           Route::get('/', 'IndexController@index');
           Route::get('index', 'IndexController@index');
           Route::get('welcome', 'IndexController@welcome');
//           产品分类
            Route::get('goodscate', 'GoodsCategoryController@index');
            Route::get('addcategory', 'GoodsCategoryController@addCategory');
            Route::post('addcategory', 'GoodsCategoryController@insertCategory');
            //编辑分类
            Route::get('goodscate/edit/{goodscategory}', 'GoodsCategoryController@edit');
            Route::put('goodscate/edit/{goodscategory}', 'GoodsCategoryController@update');
            //删除分类
            Route::get('goodscate/delete/{goodscategory}', 'GoodsCategoryController@delete');

});
//Route::get('index', 'IndexController@index');
//Route::get('user', 'UserController@user');
////文章列表
//Route::get('posts', 'PostsController@index');
////文章详情
//Route::get('posts/show/{posts}', 'PostsController@show');
////创建文章
//Route::get('posts/create', 'PostsController@create');
//Route::post('posts', 'PostsController@store');
////编辑文章
//Route::get('posts/edit/{posts}', 'PostsController@edit');
//Route::put('posts/update/{posts}', 'PostsController@update');
////删除文章
//Route::get('posts/delete/{posts}', 'PostsController@delete');
Route::post('posts/image/upload', 'PostsController@uploadImg');
////发表评论
//Route::post('posts/comments', 'PostsController@comments');
////注册页面
//Route::get('register', 'RegisterController@index');
////注册行为
//Route::post('register', 'RegisterController@register');
////登录页面
//Route::get('login', 'LoginController@index');
////登录行为
//Route::post('login', 'LoginController@login');
////退出
//Route::get('logout', 'LoginController@logout');
////个人设置
//Route::get('user/setting', 'UserController@setting');
////个人操作
//Route::post('user/setting', 'UserController@setstore');
////攒操作
//Route::get('posts/zan/{posts}', 'PostsController@zan');
//Route::get('posts/unzan/{posts}', 'PostsController@unzan');
//// 个人主页
//Route::get('user/{user}', 'UserController@show');
//Route::post('user/{user}/fan', 'UserController@fan');
//Route::post('user/{user}/unfan', 'UserController@unfan');

