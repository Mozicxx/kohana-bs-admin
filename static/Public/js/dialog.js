var dialog = {
    //错误弹窗
    error : function(message){
        layer.open({
            content : message,
            title : '错误提示',
            icon : 2,
        });
    },

    //成功弹窗
    success : function(message, url){
        layer.open({
            content : message,
            icon : 1,
            yes : function(){
                location.href = url;
            },
        });
    },

    //确认弹窗
    confirm : function(message, url){
        layer.open({
            content : message,
            icon : 3,
            btn : ['是','否'],
            yes : function(){
                location.href = url;
            },
        });
    }
}
