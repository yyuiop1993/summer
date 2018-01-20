<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
use Image;
use CustomPagerJH;

class Param extends Base{
    

    /**************************************************/
    /**************************************************/
    /*参数设置*/
    /**************************************************/
    /**************************************************/
    public function param_list(){
        //$page = $this->request->param("page",1);
        $keyword = $this->request->param("keyword");
        $where = '';
        if($keyword){
            $where['param'] = array('like',"%".$keyword."%");
        }

        $where["show"] = 1;
        $list_data = Db::name("param")->where($where)->select();

        $headArr = self::_getTKD('参数设置');
        $this->assign(compact("headArr","list_data","keyword"));
        return $this->fetch();
    }
    /*保存参数值*/
    public function param_save(){
        $id = $this->request->param("id/a");
        $value = $this->request->param("value/a");

        foreach ($id as $k => $v) {
            $where["id"] = $v;
            $data["value"] = $value[$k];
            DB::name("param")->where($where)->update($data);
        }

        header("Location: /admin.php/param/param_list");
    }
    
    //显示添加菜单页面
    public function param_add(){
        $headArr = self::_getTKD('参数添加');
        $this->assign(compact("headArr"));
        return $this->fetch();
    }

    /*添加菜单的ajax*/
    public function ajax_param_add(){
        $data["param"] = $this->request->param("param");
        $data["code"]   = $this->request->param("code");
        $data["value"]     = $this->request->param("value");
        $data["type"]     = $this->request->param("type");
        
        $res = DB::name("param")->insert($data);

        if($res){
            return ["status" =>1,"msg"=>"添加成功！"];
        }else{
            return ["status" =>0,"msg"=>"网络错误,请重试"];
        }
    }
    
    //菜单修改
    public function param_edit(){
        $id  = $this->request->param("id");

        $data = DB::name("param")->where('id='.$id)->find();

        $headArr = self::_getTKD('参数修改');
        $this->assign(compact("data","id","headArr"));
        return $this->fetch();
    }
    
    //修改菜单的ajax
    public function ajax_param_edit(){
        $where["id"] = $this->request->param("id");

        $data["param"] = $this->request->param("param");
        $data["code"]   = $this->request->param("code");
        $data["value"]     = $this->request->param("value");
        $data["type"]     = $this->request->param("type");

        $res = DB::name("param")-> where($where)->update($data);

        if($res){
            return ["status" =>1,"msg"=>"修改成功！"];
        }else{
            return ["status" =>0,"msg"=>"网络错误,请重试"];
        }
    }

    //删除菜单
    public function param_del(){
        $id = $this->request->param("id");
        if($id){
            $where['id']=$id;
            $res = DB::name("param")->where($where)->delete();
            
            if($res){
                return ["status" =>1,"msg"=>"删除成功"];
            }else{
                return ["status" =>0,"msg"=>"删除失败,请重试"];
            }
        }else {
            return ["status" =>0,"msg"=>"网络错误"];
        }
    }


   
}
