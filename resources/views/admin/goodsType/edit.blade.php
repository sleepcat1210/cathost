@extends("admin.layout.main")
@section("content")
<div class="page-container">
    <form  method="Post" class="form form-horizontal" id="form-edit">  
         <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-3 col-sm-2">
                <span class="c-red">*</span>
                类型名称：</label>
            <div class="formControls col-xs-7 col-sm-5">
                <input type="text" class="input-text" value="{{$goodsType->type_name}}" placeholder="" id="user-name" name="type_name">
                <span style='color:red'>{{$errors->first('type_name')}}</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>上级分类：</label>
            <div class="formControls col-xs-7 col-sm-5"> <span class="select-box">
                    <select name="pid" class="select">
                        <option value="0">顶级分类</option>
                        @foreach($type as $k =>$v)
                        <option value="{{$v->id}}"
                                @if($goodsType->pid ==$v->id)
                                 selected='selected'
                                @endif
                                >{!!str_repeat('&nbsp&nbsp&nbsp&nbsp',$v->level)!!}├{{$v->type_name}}</option>
                        @endforeach
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
<script type="text/javascript">
$(function () {
    $("#form-edit").validate({
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                type: 'post',
                url: "/admin/type/edit/{{$goodsType->id}}",
                success: function (data) {
                    if(data.success){
                         layer.msg('修改成功!', {icon: 1, time: 1000},function(){
                          parent.location.reload();
                          var index = parent.layer.getFrameIndex(window.name);
                          parent.layer.close(index); 
                         });

                    }else{
                         layer.msg('修改失败！', {icon: 1, time: 1000},function(){
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
