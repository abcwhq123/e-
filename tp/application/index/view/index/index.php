<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
<link rel="stylesheet" type="text/css" href="__static__css/idangerous.swiper.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
<script type="text/javascript" src="__static__script/banner.js"></script>
<script type="text/javascript" src="__static__script/idangerous.swiper.js"></script>
</head>
<body>
<!--浮动-->
<div class="dropMask"></div>
<div class="dragBtn"></div>
<div class="dropBox">
  <div class="dropSkin"></div>

</div>
<script src="script/jquery-ui.min.js"></script>
<script src="script/index.js"></script>
<!-- 页面头部 -->
<header class="header"><a href="#" class="logo"><img src="__static__images/logo.png"></a><a href="#" class="topleft" id="allmm"><i><img src="__static__images/add.png" width="13"></i>&nbsp;
  <e>合肥</e>
  </a>
  <!-- 登录和未登录 -->
  <div class="nav-top-bar" onClick="$(this).next().stop().slideToggle(200,'easeOutQuad')"></div>
  <div class="header-nav"> <a href="{:url('login/register')}"> <img src="__static__images/register.png" /> 注册 </a> <a href="{:url('login/login')}"> <img src="__static__images/login.png" /> 登录 </a> <a href="#"> <img src="__static__images/invest.png" /> 投资 </a> </div>
</header>
<!-- 中间内容 -->
<div class="main">
  <!-- Banner -->
  <div class="swiper-container">
    <div class="swiper-wrapper" style="width: 2560px; height: 75px; -webkit-transform: translate3d(-1920px, 0px, 0px); transition: 0.3s; -webkit-transition: 0.3s;"><a class="swiper-slide swiper-slide-duplicate" href="#" target="_blank" style="width: 640px; height: 75px;"><img src="__static__images/banner.png" height="75"></a> <a class="swiper-slide" href="#" target="_blank" style="width: 640px; height: 75px;"><img src="__static__images/banner.png" height="75"></a> <a class="swiper-slide" href="#" target="_blank" style="width: 640px; height: 75px;"><img src="__static__images/banner.png" height="75"></a> <a class="swiper-slide swiper-slide-duplicate swiper-slide-visible swiper-slide-active" href="#" target="_blank" style="width: 640px; height: 75px;"><img src="__static__images/banner.png" height="75"></a></div>
    <div class="pagination"><span class="swiper-pagination-switch swiper-visible-switch swiper-active-switch"></span><span class="swiper-pagination-switch"></span></div>
  </div>
  <div class="wgt-login"> <a class="btn btn-regist" href="{:url('product/index')}">立即投资</a> <a class="btn btn-login" href="{:url('user/index')}">我的账户</a> </div>
  <div class="clear"></div>
  <div class="index-list-wrap">
    <!--车-->
     <?php foreach ($product['info'] as $k => $v) {?>
    <div class="index-pad"> <a class="index-list index-che" href="{:url('product/desc')}?pid=<?=$v['product_id']?>">
      <div class="list-tit clear"> <span class="fl tit-name"><i></i><strong><?=$v['product_cade']?></strong></span> <span class="fr tit-site"><i></i> <strong><?php if ($v['product_city']==1) {echo "北京";}else if ($v['product_city']==2) {echo "上海";}elseif ($v['product_city']==3) {echo "广州";}else if ($v['product_city']==4) {echo "深圳";}?></strong> </span> </div>
      <div class="list-main">
        <div class="main-l"> <span class="per"><?=$v['product_rate']*100?><i>%</i></span> <span class="add">A</span> </div>
        <div class="main-m main-m-1"> <span><?=$v['product_need_money']?>元</span> </div>
        <div class="main-m main-m-2"> <span class="day"><?=$v['product_time']?>个月</span> </div>
        <div class="main-r"> <span class="circle-blue circle-c57"></span> <span class="val-per"><?php if($v['product_need_money']==0){ echo 0;}else{ $num=$v['product_money']/$v['product_need_money'];$num1=sprintf('%.2f',$num);echo $num1*100;}?><i>%</i></span> </div>
      </div>
      </a> </div>
    <?php }?>
    <!--end-->
  </div>
  <div class="mx10 pb10"> <a href="{:url('product/index')}" class="index-more"><i>查看全部项目</i></a> </div>
</div>
<!-- 页面底部 -->
<nav class="footer border_t" id="footer"> 
  <a href="javascript:void(0)" class="nav_on" id="jx"><span></span>首页</a> 
  <a href="{:url('product/index')}" id="lc" class=""><span></span>理财</a> 
  <a href="{:url('usemoney/index')}" id="jk" class=""><span></span>借款</a> 
  <a href="{:url('user/index')}" id="cf" class=""><span></span>我的账户</a> </nav><!--合作机构-->
<div id="allmenu" style="display:none;">
  <div class="pt45" style="margin-top: 0px;">
    <div class="cityadd" style="position:relative"> <i><img src="__static__images/addr.png" width="100%"></i><a href="#">南京</a> <a href="javascript:void(0)" onClick="closeDiv('allmenu')" style=" position:absolute; right:5px; top:15px;"><img src="__static__images/xxx.png" width="18" height="18"></a></div>
    <div class="clearfix cityabc">
      <div class="citywap">
        <p class="f14">热门城市</p>
        <div class="citycon clearfix"> <a href="#">南京</a> <a href="#">合肥</a> <a href="#">芜湖</a> <a href="#">昆明</a> <a href="#">苏州</a> <a href="#">杭州</a> <a href="#">无锡</a> <a href="#">西安</a> <a href="#">长春</a> <a href="#">沈阳</a> <a href="#">武汉</a> <a href="#">天津</a> <a href="#">石家庄</a> <a href="#">哈尔滨</a> </div>
      </div>
      <div class="clear"></div>
      <div class="p12 abc botl">
        <p class="f14">全部城市</p>
        <div class="orange cityabc"> <a class="ciabc" href="#A">A</a> <a class="ciabc" href="#B">B</a> <a class="ciabc" href="#C">C</a> <a class="ciabc" href="#D">D</a> <a class="ciabc" href="#E">E</a> <a class="ciabc" href="#F">F</a> <a class="ciabc" href="#G">G</a> <a class="ciabc" href="#H">H</a> <a class="ciabc" href="#J">J</a> <a class="ciabc" href="#K">K</a> <a class="ciabc" href="#L">L</a> <a class="ciabc" href="#M">M</a> <a class="ciabc" href="#N">N</a> <a class="ciabc" href="#Q">Q</a> <a class="ciabc" href="#S">S</a> <a class="ciabc" href="#T">T</a> <a class="ciabc" href="#W">W</a> <a class="ciabc" href="#X">X</a> <a class="ciabc" href="#Y">Y</a> <a class="ciabc" href="#Z">Z</a> </div>
      </div>
      <div class="citylist">
        <p class="bg_grey botl pre"><span id="A" class="citypo"></span> A</p>
        <div class="citysite clearfix"> <a href="#">安庆</a> <a>&nbsp;</a><a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="B" class="citypo"></span> B</p>
        <div class="citysite clearfix"> <a href="#">蚌埠</a> <a href="#">保定</a> <a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="C" class="citypo"></span> C</p>
        <div class="citysite clearfix"> <a href="#">长春</a> <a href="#">成都</a> <a href="#">潮州</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">滁州</a> <a href="#">重庆</a> <a href="#">常熟</a> <a href="#">常州</a> <a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="D" class="citypo"></span> D</p>
        <div class="citysite clearfix"> <a href="#">大连</a> <a href="#">德州</a> <a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="E" class="citypo"></span> E</p>
        <div class="citysite clearfix"> <a href="#">恩施</a> <a>&nbsp;</a><a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="F" class="citypo"></span> F</p>
        <div class="citysite clearfix"> <a href="#">阜阳</a> <a>&nbsp;</a><a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="G" class="citypo"></span> G</p>
        <div class="citysite clearfix"> <a href="#">高淳</a> <a>&nbsp;</a><a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="H" class="citypo"></span> H</p>
        <div class="citysite clearfix"> <a href="#">淮北</a> <a href="#">淮南</a> <a href="#">邯郸</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">合肥</a> <a href="#">黄山</a> <a href="#">哈尔滨</a> <a href="#">衡水</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">淮安</a> <a href="#">杭州</a> <a>&nbsp;</a><a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="J" class="citypo"></span> J</p>
        <div class="citysite clearfix"> <a href="#">金华</a> <a href="#">嘉兴</a> <a href="#">江阴</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">晋中</a> </div>
        <p class="bg_grey botl pre"><span id="K" class="citypo"></span> K</p>
        <div class="citysite clearfix"> <a href="#">昆明</a> <a href="#">昆山</a> <a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="L" class="citypo"></span> L</p>
        <div class="citysite clearfix"> <a href="#">六安</a> <a href="#">六合</a> <a href="#">溧水</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">临沂</a> <a href="#">连云港</a> <a href="#">兰州</a> <a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="M" class="citypo"></span> M</p>
        <div class="citysite clearfix"> <a href="#">马鞍山</a> <a>&nbsp;</a><a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="N" class="citypo"></span> N</p>
        <div class="citysite clearfix"> <a href="#">宁波</a> <a href="#">南京</a> <a href="#">南通</a> <a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="Q" class="citypo"></span> Q</p>
        <div class="citysite clearfix"> <a href="#">青岛</a> <a href="#">泉州</a> <a>&nbsp;</a><a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="S" class="citypo"></span> S</p>
        <div class="citysite clearfix"> <a href="#">上海</a> <a href="#">石家庄</a> <a href="#">宿迁</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">汕头</a> <a href="#">宿州</a> <a href="#">绍兴</a> <a href="#">沈阳</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">苏州</a> </div>
        <p class="bg_grey botl pre"><span id="T" class="citypo"></span> T</p>
        <div class="citysite clearfix"> <a href="#">天津</a> <a href="#">太原</a> <a href="#">泰州</a> <a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
        <p class="bg_grey botl pre"><span id="W" class="citypo"></span> W</p>
        <div class="citysite clearfix"> <a href="#">芜湖</a> <a href="#">武汉</a> <a href="#">无锡</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">温州</a> </div>
        <p class="bg_grey botl pre"><span id="X" class="citypo"></span> X</p>
        <div class="citysite clearfix"> <a href="#">西安</a> <a href="#">邢台</a> <a href="#">新乡</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">徐州</a> </div>
        <p class="bg_grey botl pre"><span id="Y" class="citypo"></span> Y</p>
        <div class="citysite clearfix"> <a href="#">盐城</a> <a href="#">烟台</a> <a href="#">宜兴</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">扬州</a> </div>
        <p class="bg_grey botl pre"><span id="Z" class="citypo"></span> Z</p>
        <div class="citysite clearfix"> <a href="#">漳州</a> <a href="#">珠海</a> <a href="#">株洲</a> <a href="#" style="background-image: none; background-position: initial initial; background-repeat: initial initial;">镇江</a> <a href="#">中山</a> <a href="#">遵义</a> <a href="#">郑州</a> <a style="background-image: none; background-position: initial initial; background-repeat: initial initial;">&nbsp;</a></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$("#allmm").bind("click",function(){
	if($("#allmenu").css("display")=="none"){
		$("#allmenu").slideDown(300);
	}else{
		$("#allmenu").slideUp(200);
	}
});
</script>
<script langue="javascript">
function show(popupdiv)
{
var Idiv=document.getElementById(popupdiv);
Idiv.style.display="block";
//以下部分使整个页面至灰不可点击
var procbg = document.createElement("div"); //首先创建一个div
procbg.setAttribute("id","mybg"); //定义该div的id
procbg.style.background = "#000000";
procbg.style.width = "100%";
procbg.style.height = "100%";
procbg.style.position = "fixed";
procbg.style.top = "0";
procbg.style.left = "0";
procbg.style.zIndex = "500";
procbg.style.opacity = "0.6";
procbg.style.filter = "Alpha(opacity=70)";
//以上部分也可以用csstext代替
// procbg.style.cssText="background:#000000;width:100%;height:100%;position:fixed;top:0;left:0;zIndex:500;opacity:0.6;filter:Alpha(opacity=70);";
//背景层加入页面
document.body.appendChild(procbg);
document.body.style.overflow = "auto"; //取消滚动条
//以下部分实现弹出层的拖拽效果
var posX;
var posY;
Idiv.onmousedown=function(e)
{
if(!e) e = window.event; //IE
posX = e.clientX - parseInt(Idiv.style.left);
posY = e.clientY - parseInt(Idiv.style.top);
document.onmousemove = mousemove;
}
document.onmouseup = function()
{
document.onmousemove = null;
}
function mousemove(ev)
{
if(ev==null) ev = window.event;//IE
Idiv.style.left = (ev.clientX - posX) + "px";
Idiv.style.top = (ev.clientY - posY) + "px";
}
}
function closeDiv(popupdiv) //关闭弹出层
{
var Idiv=document.getElementById(popupdiv);
Idiv.style.display="none";
document.body.style.overflow = "auto"; //恢复页面滚动条
var body = document.getElementsByTagName("body");
var mybg = document.getElementById("mybg");
body[0].removeChild(mybg);
}
</script>
</body>
</html>
