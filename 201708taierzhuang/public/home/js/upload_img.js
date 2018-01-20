

function upload_img(obj){
    var index = layer.load(2, {shade: [0.3,'#000']});
    var file = obj.files[0];  
        
    //console.log($(obj).parent().find("span").text());

    /*判断类型是不是图片*/
    if(!/image\/\w+/.test(file.type)){
        layer.alert("请确保文件为图像类型!",{icon: 2});   
        return false;   
    }

    var reader = new FileReader();   
    reader.readAsDataURL(file);   
    reader.onload = function(e){   
        var img = this.result;

        if(img){
            //$(obj).parent().hide()
            $.post("/admin.php/Common/upload_img",{img:img},function(data){
            layer.close(index);
            if(data.status){ 
                $(obj).parents(".save_box").find("img").attr("src",''+data.path).show()
                $(obj).parents(".save_box").find("input[type=hidden]").val(data.path);
            }else{
                layer.alert(data.msg,{icon: 2});
            }
        });
        }else{
            layer.alert("网络错误，请重新选择图片!",{icon: 2});   
            return false;   
        }
    }
    
}   