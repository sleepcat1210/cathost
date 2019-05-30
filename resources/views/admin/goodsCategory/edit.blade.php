@extends("admin.layout.main")
@section("content")
<div class="page-container">
    <form  method="Post" class="form form-horizontal" id="form-edit"> 
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                分类名称：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="{{$goodscategory->category_name}}" placeholder="" id="user-name" name="category_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上级分类：</label>
            <div class="formControls col-xs-6 col-sm-6"> <span class="select-box">
                    <select name="pid" class="select">
                        <option value="0">顶级分类</option>
                        @foreach($goodscate as $k =>$v)
                        <option value="{{$v->id}}" 
                                @if($goodscategory->pid ==$v->id)
                                selected='selected'
                                @endif
                                >
                                {!!str_repeat('&nbsp&nbsp&nbsp&nbsp',$v->level)!!}├{{$v->category_name}}
                    </option>
                    @endforeach
                </select>
            </span> </div>
    </div>     
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
        <div class="formControls col-xs-6 col-sm-6">
            <div class="uploader-thum-container">
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker">选择图片</div>
                <!--                    <button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>-->
            </div>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2">备注：</label>
        <div class="formControls col-xs-6 col-sm-6">
            <textarea name="content" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" >{{$goodscategory->content}}</textarea>
            <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
        </div>
    </div>
    <div class="row cl">
        <div class="col-9 col-offset-2">
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
    var token = "{{csrf_token()}}";
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    $list = $("#fileList"),
            $btn = $("#btn-star"),
            state = "pending",
            uploader;

    var uploader = WebUploader.create({
        auto: true,
        swf: '/admin/lib/webuploader/0.1.5/Uploader.swf',
        // 文件接收服务端。
        server: '/posts/image/upload',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',
        formData: {
            _token: token
        },
        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false,
        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });
    // 文件上传过程中创建进度条实时显示。
    uploader.on('uploadProgress', function (file, percentage) {
        var $li = $('#' + file.id),
                $percent = $li.find('.progress-box .sr-only');

        // 避免重复创建
        if (!$percent.length) {
            $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo($li).find('.sr-only');
        }
        $li.find(".state").text("上传中");
        $percent.css('width', percentage * 100 + '%');
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on('uploadSuccess', function (file, response) {
        var $li = $(
                '<div id="' + file.id + '" class="item">' +
                '<div class="pic-box"><img  style="width:100px" src="/' + response.data + '"></div>' +
                '<div class="info">' + file.name + '</div>' +
                '<p class="state">等待上传...</p>' +
                '<input type="hidden" name="img" value="' + response.data + '" >' +
                '</div>');
        $list.append($li);
        $('#' + file.id).addClass('upload-state-success').find(".state").text("已上传");
    });

    // 文件上传失败，显示上传出错。
    uploader.on('uploadError', function (file) {
        $('#' + file.id).addClass('upload-state-error').find(".state").text("上传出错");
    });

    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on('uploadComplete', function (file) {

        $('#' + file.id).find('.progress-box').fadeOut();
    });
    uploader.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn.text('暂停上传');
        } else {
            $btn.text('开始上传');
        }
    });

    $btn.on('click', function () {
        if (state === 'uploading') {
            uploader.stop();
        } else {
            uploader.upload();

        }
    });
    $("#form-edit").validate({
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function (form) {
//			$(form).ajaxSubmit();
            $(form).ajaxSubmit({
                type: 'post',
                url: "/admin/goodscate/edit/{{$goodscategory->id}}",//action="/admin/goodscate/edit/{{$goodscategory->id}}"
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