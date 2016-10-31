<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>软件管理后台</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />        
        <style type="text/css">
            body{width:100%;height:100%;margin:0;overflow:hidden;}
        </style>
        <script src="<?php echo URL::base(TRUE); ?>static/mui/boot.js" type="text/javascript"></script>

    </head>
    <body >
        <div id="loginWindow" class="mini-window" title="用户登录" style="width:350px;height:165px;"
             showModal="true" showCloseButton="false">
            <div id="loginForm" style="padding:15px;padding-top:10px;">
                <table >
                    <tr>
                        <td style="width:60px;"><label for="username$text">帐号：</label></td>
                        <td>
                            <input id="username" name="username" onvalidation="onUserNameValidation" class="mini-textbox" required="true" style="width:150px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:60px;"><label for="pwd$text">密码：</label></td>
                        <td>
                            <input id="pwd" name="pwd" onvalidation="onPwdValidation" class="mini-password" requiredErrorText="密码不能为空" required="true" style="width:150px;" onenter="onLoginClick"/>
                            &nbsp;&nbsp;<a href="#" >忘记密码?</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-top:5px;">
                            <a onclick="onLoginClick" class="mini-button" style="width:60px;">登录</a>
                            <a onclick="onResetClick" class="mini-button" style="width:60px;">重置</a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <script type="text/javascript">
            mini.parse();
            var loginWindow = mini.get("loginWindow");
            loginWindow.show();
            function onLoginClick(e) {
                var form = new mini.Form("#loginWindow");
                form.validate();
                if (form.isValid() == false)
                    return;
                var o = form.getData();
                loginWindow.hide();
                mini.loading("正在登录，请稍候...", "正在登录");
                $.ajax({
                    cache: false,
                    type: 'post',
                    data: {username: o.username, password: o.pwd},
                    success: function(text) {
                        var o = mini.decode(text);
                        if (o.ret === 0) {
                            mini.loading("登录成功，马上转到系统...", "登录成功");
                            setTimeout(function() {
                                window.location = o.url;
                            }, 1500);
                        } else {
                            mini.loading(o.msg, "登陆失败");
                            setTimeout(function() {
                                loginWindow.show();
                            }, 1500);
                        }
                    }
                });
            }
            function onResetClick(e) {
                var form = new mini.Form("#loginWindow");
                form.clear();
            }
            /////////////////////////////////////
            function onUserNameValidation(e) {
                if (e.isValid) {
                    if (e.value.length < 1) {
                        e.errorText = "必须输入名";
                        e.isValid = false;
                    }
                }
            }
            function onPwdValidation(e) {
                if (e.isValid) {
                    if (e.value.length < 2) {
                        e.errorText = "密码不能少于2个字符";
                        e.isValid = false;
                    }
                }
            }
        </script>
    </body>
</html>