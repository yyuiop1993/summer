<?php
header("Content-type: text/html; charset=utf-8"); 
$zip=new ZipArchive();


//开始运行
$dir = listDir("png");
echo "<pre>";
print_r($dir);
exit();

if($zip->open('images.zip', ZipArchive::OVERWRITE)=== TRUE){
    addFileToZip('images/', $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
    $zip->close(); //关闭处理的zip文件
}







function listDir($dir){
    if(is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
            	echo 1;
                if((is_dir($dir."/".$file)) && $file!="." && $file!=".."){
                	$file_arr[]=$file;
                    echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
                    listDir($dir."/".$file."/");
                }
                else{
                    if($file!="." && $file!=".."){
    	                echo $file."<br>";
                    }
                }
            }
            closedir($dh);
        }
    }

}




?>