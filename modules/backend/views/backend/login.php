<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理员登录</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo URL::base(TRUE); ?>static/AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL::base(TRUE); ?>static/AdminLTE/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo URL::base(TRUE); ?>"><b>应用市场</b>后台管理系统</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录</p>

        <form id="form1">
            <div class="form-group has-feedback">
                <input name="username" type="user" class="form-control" placeholder="用户名">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> 记住我
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" id="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

<!--        <div class="social-auth-links text-center">-->
<!--            <p>- OR -</p>-->
<!--            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using-->
<!--                Facebook</a>-->
<!--            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using-->
<!--                Google+</a>-->
<!--        </div>-->
        <!-- /.social-auth-links -->

        <a href="#">忘记密码?</a><br>
<!--        <a href="register.html" class="text-center">Register a new membership</a>-->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo URL::base(TRUE); ?>static/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<!-- layer  -->
<script src="<?php echo URL::base(TRUE); ?>static/Public/js/layer/layer.js"></script>
<!-- customer dialog -->
<script src="<?php echo URL::base(TRUE); ?>static/Public/js/dialog.js"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        $('#submit').click(function(){
            var data = $('#form1').serializeArray();
            var qryurl = window.location.search; //截取当前url中“?”后面的字符串
            $.ajax({
                type: 'post',
                url: '<?php echo URL::base(TRUE); ?>backend/auth/login'+qryurl,
                data: data,
                success:function(text){
                    if(text.ret === 0){
                        layer.msg(text.msg,{
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        },function(){
                            location.href = text.url;
                        })
                    }else{
                        dialog.error(text.msg === undefined ? '登录错误' : text.msg);
                    }
                },
                dataType: "json"
            });
        });
    });
</script>
</body>
</html>
