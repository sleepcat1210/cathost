<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function index() {
        return view('admin.goods.index');
    }
     public function addGoods() {
        return view('admin.goods.add');
    }
}
