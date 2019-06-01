@extends("admin.layout.main")
@section("content")
<article class="page-container">
    <form  method="Post" class="form form-horizontal" id="form-attr-add">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>属性名称：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <input type="text" class="input-text" value="" placeholder="" id="attr_name" name="attr_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属商品类型：</label>
            <div class="formControls col-xs-5 col-sm-6"> <span class="select-box">
                    <select class="select" size="1" name="cat_id">
                        <option value="" selected>请选择所属类型</option>
                        @foreach($type as $k=>$v)
                        <option value="{{$v->id}}"
                                @if($goodsType->id ==$v->id)
                                 selected='selected'
                                @endif                                
                                >{!!str_repeat('&nbsp&nbsp&nbsp&nbsp',$v->level)!!}├{{$v->type_name}}</option>
                        @endforeach
                    </select>
                </span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>能否进行检索：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="attr_index" type="radio" id="attr_index-1" checked value="0">
                    <label for="attr_index-1">不需要检索</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="attr_index-2" name="attr_index" value="1">
                    <label for="attr_index-2">关键字检索</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="attr_index-3" name="attr_index" value="2">
                    <label for="attr_index-3">范围检索</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>属性是否可选：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="attr_type" type="radio" id="attr_type-1" checked value="0">
                    <label for="attr_type-1">唯一属性</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="attr_type-2" name="attr_type" value="1">
                    <label for="attr_type-2">单选属性</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="attr_type-3" name="attr_type" value="2">
                    <label for="attr_type-3">复选属性</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>该属性值的录入方式：</label>
            <div class="formControls col-xs-5 col-sm-6 skin-minimal">
                <div class="radio-box">
                    <input name="attr_input_type" type="radio" id="attr_input_type-1" checked value="0">
                    <label for="attr_input_type-1">手工输入</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="attr_input_type-2" name="attr_input_type" value="1">
                    <label for="attr_input_type-2">从下面列表中选择</label>
                </div>

            </div>
        </div>       
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">可选值列表：</label>
            <div class="formControls col-xs-5 col-sm-6">
                <textarea name="attr_values" cols="" rows="" class="textarea"  placeholder="一行代表一个可选值"></textarea>               
            </div>
        </div>
        <input type="hidden" name="cat_id" value="{{$goodsType->id}}">
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

@endsection
@section("footerjs")

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function () {
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#form-attr-add").validate({
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                type: 'post',
                url: '/admin/attribute/add', 
                success: function (data) {
                    if (data.success) {
                        layer.msg('添加成功!', {icon: 1, time: 1000}, function () {
                            parent.location.reload();
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        });

                    } else {
                        layer.msg('添加失败！', {icon: 1, time: 1000}, function () {
                            parent.location.reload();
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        });
                    }

                },
                error: function (XmlHttpRequest, textStatus, errorThrown) {
                    layer.msg('error!', {icon: 1, time: 1000});
                }
            });
        }
    });
});
</script> 
@endsection
