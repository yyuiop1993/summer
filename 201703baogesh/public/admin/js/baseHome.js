/*
layui.config({
//base: '/lay/modules/', //你的模块目录
version: false, //一般用于更新组件缓存，默认不开启。设为true即让浏览器不缓存。也可以设为一个固定的值，如：201610,
debug: true, //用于开启调试模式，默认false，如果设为true，则JS模块的节点会保留在页面
base: '' //设定扩展的Layui组件的所在目录，一般用于外部组件扩展
});
*/

/*layui 模块化*/
var moudles = ['form', 'upload','laydate','layedit','flow','util',"element"];
layui.use(moudles, function(){  
  var form    = layui.form() //表单
	var upload  = layui.upload; //文件上传
	var laydate = layui.laydate; //日期时间选择
	var layedit = layui.layedit; //编辑器
	var flow    = layui.flow;  //流加载
	var util    = layui.util;  //工具块
	/*右下角的点击到顶部*/
    util.fixbar();
  	$(function() {
  		
    })

});