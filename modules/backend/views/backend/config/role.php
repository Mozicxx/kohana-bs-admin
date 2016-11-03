<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="box">
<!--            <div class="box-header">-->
<!--                <h3 class="box-title"></h3>-->
<!--            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:15px"><input type="checkbox" id='checkAll'></th>
                        <th>角色名称</th>
                        <th>角色描述</th>
                        <th>添加时间</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->
<script>
    //初始化表格
    var url = "/backend/config/role?method=list";
    var oTable;
    $(document).ready(function () {


        oTable = initTable();
//        $("#btnEdit").hide();
//        $("#btnSave").click(_addFun);
//        $("#btnEdit").click(_editFunAjax);
        //全选功能
        $(document).on("click","#checkAll",function () {
            if ($(this).prop("checked")) {
                $("input[name='checkList']").prop("checked", true);
                $("input[name='checkList']").parent().parent().addClass('row_selected');
            } else {
                $("input[name='checkList']").prop("checked", false);
                $("input[name='checkList']").parent().parent().removeClass('row_selected');
            }
        });
    });
    /**
            * 表格初始化
            * @returns {*|jQuery}
    */
    function initTable() {
        var table = $("#table1").dataTable({
            "oLanguage": {
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            },
            "draw": 1,//校验参数,和服务器返回的draw必须一致
            "iDisplayLength": 10,//每页显示条目数
            "sAjaxSource": url,//请求的地址
            'bPaginate': true,//分页选项
            "bDestory": true,
            "bRetrieve": true,
            "bFilter": false,
            "bSort": false,//排序选项
            "bProcessing": true,//数据量较大时加载动画选项
            "aoColumns": [
                {
                    "mDataProp": "role_id",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<input type='checkbox' name='checkList' value='" + sData + "'>");
                    }
                },
                {"mDataProp": "role_name"},
                {"mDataProp": "role_desc"},
                {"mDataProp": "add_time"},
    //                {
    //                    "mDataProp": "role_id",
    //                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
    //                        $(nTd).html("<a href='javascript:void(0);' " +
    //                                "onclick='_editFun(\"" + oData.id + "\",\"" + oData.name + "\",\"" + oData.job + "\",\"" + oData.note + "\")'>编辑</a>&nbsp;&nbsp;")
    //                            .append("<a href='javascript:void(0);' onclick='_deleteFun(" + sData + ")'>删除</a>");
    //                    }
    //                },
            ],
            "sDom": "<'row-fluid'<'span6 myBtnBox'><'span6'f>r>t<'row'<'col-sm-5'i><'col-sm-7 'p>>",
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
            //add selected class
            $(nRow).click(function () {
//                console.log($(this).children().find('input')[0].checked);
                var check = $(this).children().find('input')[0].checked;
                if (check) {
                    $(this).addClass('row_selected');
                } else {
                    $(this).removeClass('row_selected');
                }
            });
            },
            "fnInitComplete": function (oSettings, json) {
                $('<div class="btn-group" >' +
                    '<a href="#myModal" id="addFun" class="btn btn-primary" data-toggle="modal">添加</a>' +
                    '<a href="#" class="btn btn-primary" id="editFun">编辑</a>' +
                    '</div> ' + '&nbsp;' +
                    '<a href="#" class="btn btn-danger" id="deleteFun">删除</a>' + '&nbsp;'
                ).appendTo($('.myBtnBox'));
                $("#deleteFun").click(_deleteList);
                $("#editFun").click(_value);
                $("#addFun").click(_init);
            }
        });
        return table;
    }

//        /**
//         * 删除
//         * @param id
//         * @private
//         */
//        function _deleteFun(id) {
//            $.ajax({
//                url: "http://dt.thxopen.com/example/resources/user_share/basic_curd/deleteFun.php",
//                data: {"id": id},
//                type: "post",
//                success: function (backdata) {
//                    if (backdata) {
//                        oTable.fnReloadAjax(oTable.fnSettings());
//                    } else {
//                        alert("删除失败");
//                    }
//                }, error: function (error) {
//                    console.log(error);
//                }
//            });
//        }
//
    /**
     * 赋值
     * @private
     */
    function _value() {
        if ($('tr.row_selected').length == 1) {
            var selected = oTable.fnGetData(oTable.$('tr.row_selected').get(0));
            $.ajax(
                url:'/config/role',
                type:'post',
                data:data,
                dataType:'json',
                success:function(){

            },
            );
            initChildFrame();
            $("#roleid").val(selected.role_id);
            $("#rolename").val(selected.role_name);
            $("#roledesc").val(selected.role_desc);
        } else {
            dialog.error('请选择选择一条记录后操作');
        }
    }
//    /**
//     * 编辑数据带出值
//     * @param id
//     * @param name
//     * @param job
//     * @param note
//     * @private
//     */
//    function _editFun(id, name, job, note) {
//        $("#inputName").val(name);
//        $("#inputJob").val(job);
//        $("#inputNote").val(note);
//        $("#objectId").val(id);
//        $("#myModal").modal("show");
//        $("#btnSave").hide();
//        $("#btnEdit").show();
//    }
//
//    /**
//     * 初始化
//     * @private
//     */
//    function _init() {
//        resetFrom();
//        $("#btnEdit").hide();
//        $("#btnSave").show();
//    }
//
//    /**
//     * 添加数据
//     * @private
//     */
//    function _addFun() {
//        var jsonData = {
//            'name': $("#inputName").val(),
//            'job': $("#inputJob").val(),
//            'note': $("#inputNote").val()
//        };
//        $.ajax({
//            url: "http://dt.thxopen.com/example/resources/user_share/basic_curd/insertFun.php",
//            data: jsonData,
//            type: "post",
//            success: function (backdata) {
//                if (backdata == 1) {
//                    $("#myModal").modal("hide");
//                    resetFrom();
//                    oTable.fnReloadAjax(oTable.fnSettings());
//                } else if (backdata == 0) {
//                    alert("插入失败");
//                } else {
//                    alert("防止数据不断增长，会影响速度，请先删掉一些数据再做测试");
//                }
//            }, error: function (error) {
//                console.log(error);
//            }
//        });
//    }
//
//
//    /*
//     add this plug in
//     // you can call the below function to reload the table with current state
//     Datatables刷新方法
//     oTable.fnReloadAjax(oTable.fnSettings());
//     */
//    $.fn.dataTableExt.oApi.fnReloadAjax = function (oSettings) {
////oSettings.sAjaxSource = sNewSource;
//        this.fnClearTable(this);
//        this.oApi._fnProcessingDisplay(oSettings, true);
//        var that = this;
//
//        $.getJSON(oSettings.sAjaxSource, null, function (json) {
//            /* Got the data - add it to the table */
//            for (var i = 0; i < json.aaData.length; i++) {
//                that.oApi._fnAddData(oSettings, json.aaData[i]);
//            }
//            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
//            that.fnDraw(that);
//            that.oApi._fnProcessingDisplay(oSettings, false);
//        });
//    }
//
//
//    /**
//     * 编辑数据
//     * @private
//     */
//    function _editFunAjax() {
//        var id = $("#objectId").val();
//        var name = $("#inputName").val();
//        var job = $("#inputJob").val();
//        var note = $("#inputNote").val();
//        var jsonData = {
//            "id": id,
//            "name": name,
//            "job": job,
//            "note": note
//        };
//        $.ajax({
//            type: 'POST',
//            url: 'http://dt.thxopen.com/example/resources/user_share/basic_curd/editFun.php',
//            data: jsonData,
//            success: function (json) {
//                if (json) {
//                    $("#myModal").modal("hide");
//                    resetFrom();
//                    oTable.fnReloadAjax(oTable.fnSettings());
//                } else {
//                    alert("更新失败");
//                }
//            }
//        });
//    }
    /**
     * 初始化弹出层
     */
    function initChildFrame(content) {
        layer.open({
            type: 1, //page层
            area: ['1000px', '500px'],
            title: '编辑角色',
            shade: 0.6, //遮罩透明度
            moveType: 1, //拖拽风格，0是默认，1是传统拖动
            shift: 0, //0-6的动画形式，-1不开启
            content: content,
            btn: ['确认', '取消'],
            yes: function(){
                var data = $('#roleedit').serializeArray();
                $.ajax({
                    url: '/backend/config/role?method=save',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function(text){
                        console.log('hj');
                        if(text.ret === 0){
                            layer.msg(text.msg,{
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            },function(){
                                layer.closeAll();
                            });
                        }else{
                            layer.alert(
                                text.msg === undefined ? '修改失败!' : text.msg,
                                {icon:2},
                                function(){
                                    layer.closeAll();
                                }
                            );
                        }
                    },
                    error: function(){
                        dialog.error('请求失败!');
                    }
                });
            }
        });
    }
//
//    /**
//     * 重置表单
//     */
//    function resetFrom() {
//        $('form').each(function (index) {
//            $('form')[index].reset();
//        });
//    }
//
//
    /**
     * 批量删除
     * 未做
     * @private
     */
    function _deleteList() {
        var str = '';
        $("input[name='checkList']:checked").each(function (i, o) {
            str += $(this).val();
            str += ",";
        });
        if (str.length > 0) {
            var IDS = str.substr(0, str.length - 1);
            alert("你要删除的数据集id为" + IDS);
        } else {
            alert("至少选择一条记录操作");
        }
    }
</script>
<!-- datatables -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>