$(document).ready(function() {
var weekdayArr=['周日','周一','周二','周三','周四','周五','周六'];
var timeArr = ['08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00'];
var numArr=['1','2','3','4','5'];

var UplinkData =
[
    {id:'1',value:'兰博基尼'},
    {
        id:'2',
        value:'劳斯莱斯',
        childs:[
            {
                id:'1',
                value:'曜影'
            },
            {
                id:'2',
                value:'幻影',
                childs:[
                    {
                        id:'1',
                        value:'标准版'
                    },
                    { 
                        id:'2',
                        value:'加长版'
                    },
                    { 
                        id:'3',
                        value:'巅峰之旅'
                    },
                    { 
                        id:'4',
                        value:'流光熠世'
                    },
                    { 
                        id:'5',
                        value:'都会典藏版'
                    } 
                ]
            },
            {
                id:'3',
                value:'古思特',
                childs:[
                    {
                        id:'1',
                        value:'加长版'
                    },
                    {
                        id:'2',
                        value:'永恒之爱'
                    },
                    { 
                        id:'3',
                        value:'英骥'
                    },
                    { 
                        id:'4',
                        value:'阿尔卑斯典藏版'
                    }
                ]
            },
            {
                id:'4',
                value:'魅影',
                childs:[
                    {
                        id:'1',
                        value:'标准版'
                    },
                    {
                        id:'2',
                        value:'Black Badge'
                    }
                ]
            }
        ]
    },
    {
        id:'3',
        value:'宾利',
        childs:[
            {
                id:'1',
                value:'慕尚',
                childs:[
                    {
                        id:'1',
                        value:'标准版'
                    },
                    {
                        id:'2',
                        value:'极致版'
                    }
                ]
            },
            { 
                id:'2',
                value:'欧陆',
                childs:[
                    {
                        id:'1',
                        value:'尊贵版'
                    },
                    {
                        id:'2',
                        value:'敞篷标准版'
                    },
                    {
                        id:'3',
                        value:'敞篷尊贵版'
                    }
                ]
            }
        ]
    },
    {
        id:'4',
        value:'法拉利',
        childs:[
            {
                id:'1',
                value:'LaFerrari'
            },
            {
                id:'2',
                value:'法拉利488'
            },
            {
                id:'3',
                value:'GTC4Lusso'
            }
        ]
    },
    {
        id:'5',
        value:'玛莎拉蒂',
        childs:[
            {
                id:'1',
                value:'总裁'
            },
            {
                id:'2',
                value:'玛莎拉蒂GT'
            },
            {
                id:'3',
                value:'Levante'
            }
        ]
    }
];
var yearArr = ['1950','1951','1952','1953','1954','1955','1956','1957','1958','1959','1960','1961','1962','1963','1964','1965','1966','1967','1968','1969','1970','1971','1972','1973','1974','1975','1976','1977','1978','1979','1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999'];
var dayArr =['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'];
var jiaoxuedidian = ['老年大学一楼培训室','老年大学一楼培训室','文化中心一楼南入口大厅','老年大学三楼瑜伽室','庆华健身文化中心店','职工之家二楼活动中心'];

var jiaoxuediandizhi = ['临沂市文化中心'];

var kecheng = ['普通话','朗诵','太极拳','八段锦','瑜伽','乒乓球'];
var qu = ['兰山区','河东区','罗庄区','南坊区'];
var sex = ['男','女'];
var wenhua = ['大专','本科','硕士研究生','博士'];
var zhengzhi = ['团员','党员'];
//----------------------------------------------------------
//更多参数详情可查看文档 https://github.com/onlyhom/mobileSelect.js

/**
 * 参数说明
 * @param trigger(必填参数) 触发对象的id/class/tag
 * @param wheels(必填参数)  数据源,需要显示的数据
 * @param title 控件标题
 * @param position 初始化定位
 * @param callback 选择成功后触发的回调函数，返回indexArr(选中的选项索引)、data(选中的数据)
 * @param transitionEnd 每一次手势滑动结束后触发的回调函数,返回indexArr(当前选中的选项索引)、data(选中的数据)
 * @param keyMap 字段名映射
 */

/**
 * 函数说明(实例化之后才可用)
 * @function setTitle()      参数 string                 设置控件的标题
 * @function updateWheel()   参数 sliderIndex, data      重新渲染指定的轮子(可用于先实例化，后通过ajax获取数据的场景)
 * @function updateWheels()  参数 data                   重新渲染所有轮子,仅限级联数据格式使用(可用于先实例化，后通过ajax获取数据的场景)
 * @function locatePosition() 参数 sliderIndex, posIndex  传入位置数组，重定位轮子的位置
 * @function show()          参数 无参                   唤起弹窗组件    
 * @function getValue()      参数 无参                   获取组件选择的值     
 */
 


var mobileSelect1 = new MobileSelect({
    trigger: '#trigger1', 
    title: '教学地点',  
    wheels: [
                {data: jiaoxuedidian}
            ],
    position:[0], //初始化定位 打开时默认选中的哪个 如果不填默认为0
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger1").val(data[0]);
        $("#trigger1").css({"color":"#000"});
    }
});


var mobileSelect2 = new MobileSelect({
    trigger: '#trigger2',
    title: '教学点地址',
    wheels: [
                {data: jiaoxuediandizhi}
            ],
    position:[0],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger2").val(data[0]);
        $("#trigger2").css({"color":"#000"});
    }
});


var mobileSelect3 = new MobileSelect({
    trigger: '#trigger3',
    title: '课程',
    wheels: [
                {data: kecheng}
                
            ],
    position:[0], 
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger3").val(data[0]);
        $("#trigger3").css({"color":"#000"});

        $(".trigger1").val(jiaoxuedidian[indexArr]);
        $('.trigger2').val('临沂市文化中心');

        $(".li_item").show();
    }
});


var mobileSelect3 = new MobileSelect({
    trigger: '#trigger33',
    title: '课程',
    wheels: [
                {data: kecheng}
                
            ],
    position:[0], 
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger33").val(data[0]);
        $("#trigger33").css({"color":"#000"});

        //$(".trigger1").val(jiaoxuedidian[indexArr]);
        //$('.trigger2').val('临沂市文化中心');

        //$(".li_item").show();
    }
});



var mobileSelect4 = new MobileSelect({
    trigger: '#trigger4',
    title: '意向日期',
    wheels: [
                {data : weekdayArr}
            ],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger4").val(data[0]);
        $("#trigger4").css({"color":"#000"});
    }  
});


var mobileSelect5 = new MobileSelect({
    trigger: '#trigger5',
    title: '意向时间',
    wheels: [
                {data : timeArr}
            ],
    position: [0],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger5").val(data[0]);
        $("#trigger5").css({"color":"#000"});
    } 
});
var mobileSelect6 = new MobileSelect({
    trigger: '#trigger6',
    title: '企业所在区',
    wheels: [
                {data : qu}
            ],
    position: [0],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger6").val(data[0]);
        $("#trigger6").css({"color":"#000"});
    } 
});
var mobileSelect7 = new MobileSelect({
    trigger: '#trigger7',
    title: '性别',
    wheels: [
                {data : sex}
            ],
    position: [0],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger7").val(data[0]);
        $("#trigger7").css({"color":"#000"});
    } 
});
var mobileSelect8 = new MobileSelect({
    trigger: '#trigger8',
    title: '出生年月',
    wheels: [
                {data: yearArr},
                {data: dayArr}
                // {data: UplinkData}
            ],
    position:[30],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger8").val(data[0]+" "+data[1]);
        $("#trigger8").css({"color":"#000"});
    }
});


var mobileSelect9 = new MobileSelect({
    trigger: '#trigger9',
    title: '文化程度',
    wheels: [
                {data : wenhua}
            ],
    position: [0],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger9").val(data[0]);
        $("#trigger9").css({"color":"#000"});
    } 
});
var mobileSelect9 = new MobileSelect({
    trigger: '#trigger10',
    title: '政治面貌',
    wheels: [
                {data : zhengzhi}
            ],
    position: [0],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger10").val(data[0]);
        $("#trigger10").css({"color":"#000"});
    } 
});
var mobileSelect9 = new MobileSelect({
    trigger: '#trigger11',
    title: '所在区',
    wheels: [
                {data : qu}
            ],
    position: [0],
    transitionEnd:function(indexArr, data){
        // console.log(data);
    },
    callback:function(indexArr, data){
        // console.log(data);
        $(".trigger11").val(data[0]);
        $("#trigger11").css({"color":"#000"});
    } 
});
})