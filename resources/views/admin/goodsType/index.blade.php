@extends("admin.layout.main")
@section("content")
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品类型 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">            
            <a class="btn btn-primary radius" href="javascript:;" onclick="add_type('添加类型', '/admin/type/add', '600')">
                <i class="Hui-iconfont">&#xe600;</i> 添加类型</a> 
        </span> 
    </div>
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr>
                <th scope="col" colspan="5">类型管理</th>
            </tr>
            <tr class="text-c">              
                <th width="40">ID</th>
                <th width="200">类型名称</th>
                <th width="200">上级类型</th>
                <th>商家名称</th>              
                <th width="70">操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($goodstype as $k=>$v)
            <tr class="text-c">               
                <td>{{$v->id}}</td>
                <td style="text-align: left;text-indent: 2em">{!!str_repeat('&nbsp;&nbsp;',$v->level)!!}|-{{$v->type_name}}</td>
                <td>
                    @if($v->pid)
                    {{$v->parents->type_name}}
                    @else
                    顶级分类
                    @endif
                </td>              
                <td>{{$v->uid}}</td>
                <td class="f-14">
                    <a title="编辑" href="javascript:;" onclick="edit_category('编辑类型', '/admin/goodstype/edit/{{$v->id}}', '600')" style="text-decoration:none">
                        <i class="Hui-iconfont">&#xe6df;</i></a> 
                    <a title="删除" href="javascript:;" onclick="del_type(this, '{{$v->id}}')" class="ml-5" style="text-decoration:none">
                        <i class="Hui-iconfont">&#xe6e2;</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>   

    </table>
</div>
@endsection
@section("footerjs")
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

                                    $('.table-sort').dataTable({
                                        searching: false,
                                        bLengthChange: false,
                                        ordering: false,
                                        bPaginate: true,
                                    });
                                    /*管理员-角色-添加*/
                                    function add_type(title, url, w, h) {
                                        layer_show(title, url, w, h);
                                    }
                                    /*管理员-角色-编辑*/
                                    function edit_category(title, url, id, w, h) {
                                        layer_show(title, url, w, h);
                                    }
                                    /*管理员-角色-删除*/
                                    function del_category(obj, id) {
                                        layer.confirm('分类删除须谨慎，确认要删除吗？', function (index) {
                                            $.ajax({
                                                type: 'get',
                                                url: '/admin/goodscate/delete/'+id,
                                                dataType: 'json',
                                                success: function (data) {
                                                    if(data.success){
                                                         $(obj).parents("tr").remove();
                                                      layer.msg(data.msg, {icon: 1, time: 1000});
                                                    }else{                                                        
                                                    layer.msg(data.msg, {icon: 1, time: 1000});
                                                    }
                                                   
                                                   
                                                },
                                                error: function (data) {
                                                    console.log(data.msg);
                                                },
                                            });
                                        });
                                    }
</script>
@endsection