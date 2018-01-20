<?php
/*分页类*/
class CustomPagerJH{

    /*
   $page              当前第几页
   $pagesize          每页的数据量
   $recirdCount       总量
   $file              路径
   $suffix
    */
    // 页数跳转时要带的参数
    public $parameter ='' ;
    // 分页URL地址
    public $url     =   '';

    public static function page($page,$pagesize,$recordCount,$suffix='') { 
        if ($page < 1){
            $page = 1;
        }
        $pagecount = ceil($recordCount/$pagesize);           //求出总页数
        $pagecount = sprintf("%d",$pagecount);               //把总页数整数化
        $page      = sprintf("%d",$page);                    //把当前页数整数化

        if ($page > $pagecount) {
            $page = $pagecount;          //最大页数
        }
        
        // 分析分页参数
        
        //unset($_GET[C('VAR_URL_PARAMS')]);
        
        $var =  !empty($_POST)?$_POST:$_GET;
        if(empty($var)) {
            $parameter  =   array();
        }else{
            $parameter  =   $var;
        }

        //$parameter[$p]  =   '__PAGE__';
        $file            =   url('',$parameter).'&page=';


        $pageup = $page-1;              //上一页
        $pagenext = $page+1;            //下一页

        if($pageup < 1){                //限制上一页的最小值
            $pageup = 1;
        }
        
        if($pagenext > $pagecount){     //限制下一页的最小值
            $pagenext = $pagecount;
        }
        if($pageup<9){                             
            $pageup = sprintf("%d",$pageup);
        }
        if($pagenext<9){
            $pagenext = sprintf("%d",$pagenext);
        }
        if($pageup==1){
            $pageup = 'index';
        }
        $pagetext = '';
        if($pagecount>1){
            if($page != 1)
                $pagetext="<div class='pager-linkPage'><a href='".$file.($page-1).$suffix."' class=upPage>上一页</a>";
            else
                $pagetext="<div class='pager-linkPage'> ";
            if($pagecount>9){

                if($page==1){
                    $pagetext.=" <a href='javascript:void(0);' class='current' >1</a> ";
                }else{
                    $pagetext.=" <a href='".$file."1".$suffix."'>1</a> ";
                }
                
                if($page<5){
                    $strpage=2;
                    for($i=2;$i<=8;$i++){
                        $i=sprintf("%d",$i);
                        if($page==$i){
                            $pagetext.=" <a href='javascript:void(0);' class='current'>".$i."</a> ";
                        }else{
                            if($i==1){
                                $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                            }else{
                                $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                            }
                            
                        }
                    }
                    
                    $pagetext.="<span>…</span>";
                }else if($page>($pagecount-5)){
                    $pagetext.="<span>…</span>";
                    for($i=$pagecount-7;$i<$pagecount;$i++){
                        $i=sprintf("%d",$i);
                        if($page==$i){
                            $pagetext.=" <a href='javascript:void(0);' class='current'>".$i."</a> ";
                        }else{
                            if($i==1){
                                $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                            }else{
                                $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                            }
                            
                        }
                    }
                }else{
                    $pagetext.="<span>…</span>";
                    for($i=$page-3;$i<=$page+3;$i++){
                        $i=sprintf("%d",$i);
                        if($page==$i){
                    
                        $pagetext.=" <a href='javascript:void(0);' class='current'>".$i."</a> ";
                        }else{
                            if($i==1){
                                $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                            }else{
                                $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                            }
                        }
                    }
                    $pagetext.="<span>…</span>";
                }
                if($page == $pagecount){
                    $pagetext.=" <a href='javascript:void(0);' class='current'>".$pagecount."</a> ";
                }else{
                    $pagetext.=" <a href='".$file.$pagecount.$suffix."'>".$pagecount."</a> ";
                }
            }else{
                for($i=1;$i<=$pagecount;$i++){
                    $i=sprintf("%d",$i);
                    if($page==$i){
                    
                        $pagetext.=" <span class='current'>".$i."</span> ";
                    }else{
                        if($i==1){
                            $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                        }else{
                            $pagetext.=" <a href='".$file.$i.$suffix."'>".$i."</a> ";
                        }
                        
                    }
                }
            }
            if($page < $pagecount){
               $pagetext.="<a href='".$file.$pagenext.$suffix."' class=downPage >下一页</a>";
            }

            $pagetext .= "</div>";
            
        }

        return $pagetext;
    }
}