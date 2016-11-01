
<!--Custom design-->
<script>
    //给子导航赋值
    $(function(){
        var controller = "<?php echo $controller;?>",action = "<?php echo $action;?>";
        var change = false;
        $('li[sid]').each(function(){
            var sid = $(this).attr('sid');
            var pname = $(this).attr('pname');
            var sname = $(this).text();
            if(sid == controller.toLocaleLowerCase() + action){
                $(this).parents('.treeview').eq(0).addClass('active');
                $(this).addClass('active');
                $('#controller').text(pname);
                $('#action').text(sname);
                change = true;
                return false;
            }
            if(change === false){
                $('#controller').hide();
                $('#action').hide();
            }
        });

//修改密码弹窗
        $('#changepwd').click(function(){
            var content = '<?php echo Common::templateToStr('backend/home/changepwd') ?>';
            layer.open({
                type: 1, //page层
                area: ['460px', '260px'],
                title: '修改密码',
                shade: 0.6, //遮罩透明度
                moveType: 1, //拖拽风格，0是默认，1是传统拖动
                shift: 0, //0-6的动画形式，-1不开启
                content: content,
                btn: ['确认', '取消'],
                yes: function(){
                    var data = $('#cgpwdbox').serializeArray();
                    $.ajax({
                        url: '/backend/home/retpwd?method=save',
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
                                dialog.error(text.msg === undefined ? '修改密码失败!' : text.msg);
                                $("input[type=reset]").trigger("click");//触发reset按钮
                            }
                        },
                        error: function(){
                            dialog.error('请求失败!');
                        }
                    });
                }
            });
        });
    })
</script>
</body>
</html>