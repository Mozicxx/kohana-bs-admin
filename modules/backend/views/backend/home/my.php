<!-- Select2 -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">个人资料</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="username">姓 名</label>
                            <input type="email" class="form-control" id="username" name="username" placeholder="请输入用户名" value="<?php echo $admin['username'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">性 别</label>
                            <select class="form-control select2" id="gender" name="gender">
                                <option value="M">男</option>
                                <option value="F">女</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">生 日</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="birthday" id="datepicker" value="<?php echo $admin['birthday'];?>">
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="qq">Q Q</label>
                            <input type="text" class="form-control" id="qq" name="qq" placeholder="请输入QQ号" value="<?php echo $admin['qq'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="请输入email" value="<?php echo $admin['email'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone">手机号</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="请输入手机号" value="<?php echo $admin['phone'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="address">联系地址</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo $admin['address'];?>">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="col-md-10 form-group"></div>
                    <div class="col-md-1 form-group">
                        <a id="save" class="btn btn-primary">保 存</a>
                    </div>
                    <div class="col-md-1 form-group">
                        <a class="btn btn-primary" href="/backend">取 消</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
</div>
<!-- /.row -->
<script>
    $(function(){
        $('#gender').prop("value","<?php echo $admin['gender'];?>");
        //Initialize Select2 Elements
        $(".select2").select2({
            minimumResultsForSearch: Infinity
        });
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',

        });
        //存储事件ajax请求
        $('#save').click(function(){
            var form = $('form[role=form]').serializeArray();
            $.ajax({
                type:"POST",
                url:"/backend/home/my?method=save",
                data:form,
                dataType:"",
                success: function(text){
                    layer.msg(text);
                }
            });
        });
    })
</script>

