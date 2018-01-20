/*公用的上传图片*/
if (!WebUploader.Uploader.support() ) {
    alert( 'Web Uploader 不支持您的浏览器！如果你使用的是IE浏览器，请尝试升级 flash 播放器');
}
 
var uploader = new WebUploader.Uploader({
    auto: true,
    swf: '/public/js/webuploader/webuploader.swf',
    pick: '#file_upload',//file_upload
    server: "index.php?m=public&a=webupload_img",
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/jpg,image/jpeg,image/png' //修改这行
    },
    chuncked: true,
    compress: false,
    multiple: false,
});

/*选中图片的 时候*/
uploader.on('fileQueued', function(files){
    file_upload();
});
/*进度条*/
uploader.on('uploadProgress', function(files, percentage){
    var pct = parseInt(percentage*100);
    
    $('.uploading-m .upload_jindu').css('width', pct+"%");
    $('.uploading-con .upload_jd').html(pct);
});
/*图片上传成功*/
uploader.on('uploadSuccess', function(file, response){
    if(response.status) {
        $('.uploading').hide();
        callback(response);
    }else{
        layer.alert(response.msg,{icon: 2});
    }
});
uploader.on( 'uploadError', function( file , reason) {
    $('.uploading').hide();
    alert('上传失败，请联系客服并提交错误代码:'+reason);
});