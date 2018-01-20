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
	element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块
    
	/*右下角的点击到顶部*/
    util.fixbar();

  	$(function() {
        /*左边菜单点击添加*/
        var t = $("#main_tab");
        $(".layui-nav .layui-nav-item > a").each(function() {
            var a = $(this),
            l = a.data("url");
            void 0 !== l && a.on("click",function() {
                var n, s = a.html(),
                h = 0;
                if (t.find("li").each(function(e, t) {
                    /*console.log(a.find("em").text());
                    console.log($(this).find("em").text());*/
                    $(this).find("span").text() === a.find("span").text() && (h++, n = e)
                }), 0 === h) {
                    s += '<i class="layui-icon layui-unselect layui-tab-close">&#x1006;</i>',
                    element.tabAdd("page-tab", {
                        title: s,
                        content: '<iframe src="' + l + '"></iframe>'
                    });
                    var c = $(".layui-tab-content");
                    c.find("iframe").each(function() {
                        $(this).height(c.height())
                    }),
                    t = $("#main_tab");
                    var o = t.find("li");
                    o.eq(o.length - 1).children("i.layui-tab-close").on("click",
                    function() {
                        element.tabDelete("page-tab", $(this).parent("li").index())
                    }),
                    element.tabChange("page-tab", o.length - 1);
                    
                    //index_load();
                } else {
                    element.tabChange("page-tab", n)
                    /*刷新页面*/
                    var ir = $(".layui-tab-content .layui-tab-item").eq(n).find("iframe");
                    ir.attr('src', ir.attr('src'));

                    //index_load();
                }
            })
        })
            
        /*点击关闭*/
        $("#main_tab").on("click","i.layui-tab-close",function(){
            element.tabDelete("page-tab", $(this).parent("li").index())
        });
    })

});

function index_load() { 
    index_loading = layer.load(2, {shade: [0.3,'#000']});
} 

function index_close() { 
    layer.close(index_loading);
} 
