<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodsType;
class AttributeController extends Controller
{
    public function index(GoodsType $goodsType) {
        return view('admin.attribute.index');
    }
}
