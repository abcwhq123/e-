<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>理财</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
<script type="text/javascript" src="__static__script/column.js"></script>
</head>
<body>
<!--浮动-->
<div class="dropMask"></div>
<div class="dragBtn"></div>

<script src="__static__script/index.js"></script>
<script src="__static__script/jquery-ui.min.js"></script>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="#" class="z-01"></a> <span>产品列表</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="main">
  <div class="cre-tabs">
    <div class="tab-border"></div>
    <a id="one1" onClick="setTab('one',1,3)" class="hover">产品期限</a> <span class="split-line ">|</span><a id="one2" onClick="setTab('one',2,3)">产品状态</a> <span class="split-line ">|</span><a id="one3" onClick="setTab('one',3,3)">分站区域</a> </div>
  <div class="invest_menuinfo" id="con_one_1">
    <div class="clear"></div>
    <ul class="term" type="month">
      <li month="1">3个月</li>
      <li month="2">6个月</li>
      <li month="3">一年</li>
      <li month="4">一年以上</li>
    </ul>
  </div>
  <div class="invest_menuinfo" id="con_one_2" style="display:none">
    <ul class="term" type="status">
      <li>即将上线</li>
      <li>正在募集</li>
      <li>正在回款</li>
      <li>回款完毕</li>
    </ul>
  </div>
  <div class="invest_menuinfo" id="con_one_3" style="display:none">
    <ul class="term" type="city">
      <li>北京</li>
      <li>上海</li>
      <li>深圳</li>
      <li>广州</li>
    </ul>
    <!-- <div class="cityen"> <a href="#" class="on">A</a><a href="#">B</a><a href="#">C</a><a href="#">D</a><a href="#">E</a><a href="#">F</a><a href="#">G</a><a href="#">H</a><a href="#">I</a><a href="#">J</a><a href="#">K</a><a href="#">L</a><a href="#">M</a><a href="#">N</a><a href="#">O</a><a href="#">P</a><a href="#">Q</a><a href="#">R</a><a href="#">S</a><a href="#">T</a><a href="#">U</a><a href="#">V</a><a href="#">W</a><a href="#">X</a><a href="#">Y</a><a href="#">Z</a></div -->
    <!-- <div class="cityname"><a href="#" class="on">安徽合肥</a></div> -->
  </div>
  <div class="index-list-wrap">
    <!--车-->
  <?php foreach ($product as $k => $v) {?>
    <div class="index-pad"> <a class="index-list index-che" href="{:url('product/desc')}?pid=<?=$v['product_id']?>">
      <div class="list-tit clear"> <span class="fl tit-name"><i></i><strong><?=$v['product_cade']?></strong></span> <span class="fr tit-site"><i></i> <strong></strong> </span> </div>
      <div class="list-main">
        <div class="main-l"> <span class="per"><?=$v['product_rate']*100?><i>%</i></span> <span class="add">A</span> </div>
        <div class="main-m main-m-1"> <span><?=$v['product_need_money']?>元</span> </div>
        <div class="main-m main-m-2"> <span class="day"><?php $time=$v['product_time']-time();echo date('d',$time);?>天</span> </div>
        <div class="main-r"> <span class="circle-blue circle-c57"></span> <span class="val-per"><?php if($v['product_need_money']==0){ echo 0;}else{ $num=$v['product_money']/$v['product_need_money'];$num1=sprintf('%.2f',$num);echo $num1*100;}?><i>%</i></span> </div>
      </div>
      </a> </div>
    <?php }?>
    <!--房-->
    <div class="index-pad"> <a class="index-list index-fang" href="#">
      <div class="list-tit clear"> <span class="fl tit-name"><i></i><strong>HBSF-FFFO-0021</strong></span> <span class="fr tit-site"><i></i> <strong>合肥分站 </strong> </span> </div>
      <div class="list-main">
        <div class="main-l"> <span class="per">15.0<i>%</i></span> <span class="add">A</span> </div>
        <div class="main-m main-m-1"> <span>80 <i>万</i></span> </div>
        <div class="main-m main-m-2"> <span class="day">180<i>天</i></span> </div>
        <div class="main-r"> <span class="circle-gray"></span> <span class="val-txt">回款中</span> </div>
      </div>
      </a> </div>
    <!--end-->
  </div>
  <div class="UpPage"><ul> <li><a href="/loan/default?pid=1">上一页</a></li><li><span>2/64</span></li><li><a href="#">下一页</a></li></ul><div class="clear"></div></div>
</div>
<!-- 页面底部 -->
<nav class="footer border_t" id="footer"> 
  <a href="{:url('index/index')}" class="" id="jx"><span></span>首页</a> 
  <a href="javascript:void(0)" id="lc" class="nav_on"><span></span>理财</a> 
  <a href="{:url('index/index')}" id="jk" class=""><span></span>借款</a> 
  <a href="{:url('user/index')}" id="cf" class=""><span></span>我的账户</a> </nav></body>
</html>
<style type="text/css">
  .invest_menuinfo ul li{
    cursor: pointer;
  }
</style>
<script type="text/javascript">
  $(function(){
    $(".invest_menuinfo ul li").click(function(){
      var type=$(this).parent().attr("type");
      
      switch(type){
        case "month":
            var va=$(this).attr("month");
            getproduct(type,va)
        break;
      }
    })
  })
  function getproduct(type,va){
    $.ajax({
      type:"post",
      url:"{:url('product/getinfo')}",
      data:{
        type:type,
        va:va,
      },
      dataType:"json",
      success:function(e){
        if (e.error==1) {
          
        }else{
          alert(e.msg)
        }
      }
    })
  }
</script>