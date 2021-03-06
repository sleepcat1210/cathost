<?php

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
            //商品类型
            Route::get('type', 'GoodsTypeController@index');
            //添加
            Route::get('type/add', 'GoodsTypeController@add');
            Route::post('type/add', 'GoodsTypeController@insertType');
            Route::get('type/edit/{goodsType}', 'GoodsTypeController@editType');
            Route::put('type/edit/{goodsType}', 'GoodsTypeController@update');
            Route::get('type/delete/{goodsType}', 'GoodsTypeController@delete');
            //属性列表
            Route::get('attribute/{goodsType}', 'AttributeController@index');
            Route::get('attribute/add/{goodsType}', 'AttributeController@addAttr');
            Route::post('attribute/add', 'AttributeController@insertAttr');
            Route::get('attribute/edit/{attr}', 'AttributeController@editAttr');
            Route::put('attribute/edit/{attr}', 'AttributeController@updateAttr');
            Route::get('attribute/delete/{attr}', 'AttributeController@delete');
            //商品管理
            Route::get('goods','GoodsController@index');
            Route::get('goods/add','GoodsController@addGoods');
            //获取商品属性
            Route::get('goods/ajaxSpac','GoodsController@ajaxGetGoodsSpac');
            Route::get('goods/ajaxAttr','GoodsController@ajaxGetGoodsAttr');
            Route::post('goods/ajaxSpac','GoodsController@ajaxGetSpecInput');
            Route::post('goods/add','GoodsController@insertGoods');
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
Route::get('api/v1/index','Api\V1\IndexController@index')->middleware('token');
Route::get('api/v1/login','Api\V1\IndexController@login');

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

