@extends("admin.layout.main")
@section("content")
<div class="page-container">
    <form action="/admin/type/add" method="post" class="form form-horizontal" id="form-user-add">  
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-3 col-sm-2">
                <span class="c-red">*</span>
                类型名称：</label>
            <div class="formControls col-xs-7 col-sm-5">
                <input type="text" class="input-text" value="" placeholder="" id="user-name" name="type_name">
                <span style='color:red'>{{$errors->first('type_name')}}</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>上级分类：</label>
            <div class="formControls col-xs-7 col-sm-5"> <span class="select-box">
                    <select name="pid" class="select">
                        <option value="0">顶级分类</option>
                        @foreach($goodstype as $k =>$v)
                        <option value="{{$v->id}}">{!!str_repeat('&nbsp&nbsp&nbsp&nbsp',$v->level)!!}├{{$v->type_name}}</option>
                        @endforeach
<!--                        <option value="11">├二级分类</option>
                        <option value="12">├二级分类</option>
                        <option value="13">├二级分类</option>-->
                    </select>
                </span> </div>
            <span style='color:red'>{{$errors->first('pid')}}</span>
        </div>   
        <div class="row cl">
            <div class="col-7 col-offset-4">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</div>
@endsection
@section("footerjs")
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript" src="/admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
@endsection
