@extends("admin.layout.main")
@section("content")
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 类型属性 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">            
            <a class="btn btn-primary radius" href="javascript:;" onclick="add_attr('添加属性', '/admin/attribute/add/{{$goodsType->id}}', '800')">
                <i class="Hui-iconfont">&#xe600;</i> 添加属性</a> 
        </span> 
    </div>
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr>
                <th scope="col" colspan="7">属性管理</th>
            </tr>
            <tr class="text-c">              
                <th width="40">ID</th>
                <th width="200">属性名称</th>
                <th width="200">类型名称</th>
                <th>属性是否可选</th>
                <th width="200">录入方式</th>
                <th width="200">可选值列表</th>
                <th width="70">操作</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach($attr as $k=>$v)
                <tr class="text-c">
                <td>{{$v->id}}</td>
                <td>{{$v->attr_name}}</td>
                <td>{{$v->goodsType->type_name}}</td>
                <td>               
                    @if($v->attr_type == 0)
                    唯一属性
                    @elseif($v->attr_type == 1)
                    单选属性
                    @elseif($v->attr_type == 2)
                    复选属性
                    @endif
                </td>
                <td>
                    @if($v->attr_input_type == 0)
                    手工输入
                    @elseif($v->attr_input_type == 1)
                    从列表中选择           
                    @endif
                </td>
                <td>{{$v->attr_values}}</td>
                <td>
                    <a title="编辑" href="javascript:;" onclick="edit_attr('编辑属性', '/admin/attribute/edit/{{$v->id}}', '800')" style="text-decoration:none">
                        <i class="Hui-iconfont">&#xe6df;</i></a> 
                    <a title="删除" href="javascript:;" onclick="del_attr(this, '{{$v->id}}')" class="ml-5" style="text-decoration:none">
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
                                        /*添加属性*/
                                                function add_attr(title, url, w, h) {
                                                layer_show(title, url, w, h);
                                                }
                                        /*属性-编辑*/
                                        function edit_attr(title, url, id, w, h) {
                                        layer_show(title, url, w, h);
                                        }
                                        /*属性-删除*/
                                        function del_attr(obj, id) {
                                        layer.confirm('确认要删除吗？', function (index) {
                                        $.ajax({
                                        type: 'get',
                                                url: '/admin/attribute/delete/' + id,
                                                dataType: 'json',
                                                success: function (data) {
                                                if (data.success){
                                                $(obj).parents("tr").remove();
                                                        layer.msg(data.msg, {icon: 1, time: 1000});
                                                } else{
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