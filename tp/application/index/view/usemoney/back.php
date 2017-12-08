<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
<script type="text/javascript" src="__static__script/column.js"></script>
</head>
<body>
<!--浮动-->
<div class="dropMask"></div>
<div class="dragBtn"></div>
<div class="dropBox">
  <div class="dropSkin"></div>
  <ul class="dropList">
    <li class="nth-child_1"> <a href="#" class="dropIco"></a>
      <p>首页</p>
    </li>
    <li class="nth-child_2"> <a href="#" class="dropIco"></a>
      <p>投资</p>
    </li>
    <li class="nth-child_3"> <a href="#" class="dropIco"></a>
      <p>个人中心</p>
    </li>
    <li class="nth-child_4"> <a href="#" class="dropIco"></a>
      <p>注册</p>
    </li>
    <li class="nth-child_5"> <a href="#" class="dropIco"></a>
      <p>登录</p>
    </li>
  </ul>
</div>
<script src="__static__script/index.js"></script>
<script src="__static__script/jquery-ui.min.js"></script>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="#" class="z-01"></a> <span>还款</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="main">
  <!--标的进度-->
  <div class="con-circle">
    <aside class="sec_ce">
      <p class="sec_ce_id">未还本金（元）</p>
      
      <p class="sec_ce_pc ng-binding"><?=sprintf('%.2f',$uses['money_number'])?><span class="sec_ce_b"></span></p>
     
    </aside>
  </div>
  <!--标的详细-->
 
  <!--具体信息-->
  
 
  <!--信息列表-->
      <div class="c-tabs-cnt c-tzjlinfo">
          <table style="width: 100%">
            <tbody>
            
              <tr>
                <th align="left" width="25%" style="padding-left:10px;">计划还款时间<span class="tbline" style="margin-top:15px;"></span></th>
                <th width="25%" align="right">还款利息(元)<span class="tbline" style="margin-top:15px;"></span></th>
                <th align="right" width="40%" style="padding-right:10px;">还款金额</th>
              </tr>
              <?php if (empty($list)) {?>
                <tr>
                  <td align="center" colspan="3">暂无借款信息</td>
                </tr>
              <?php }else{?>
              <?php foreach ($list as $ke => $va) {?>
              <tr>
                <td align="left" width="25%" style="padding-left:10px; color:#4A4A4A;"> 
                 <?=$va['time'];?> </td>
                <td><i style="float:right; margin-right:10px;"><?=$va['back']?></i></td>
                <td align="right" style="padding-right:10px;color:#4A4A4A;"><?=$va['money']?></td>
              </tr>
              <?php }}?>
            </tbody>
          </table> 
      </div>
    </div>
  </div>
</div>


<!-- 页面底部 -->
<article class="foot_bottom clearfix pt_10  border_t Js_input">
      
      <input type="hidden" name="fpId" id="fpId" value="ADRUNlYyVToFYVRiUDdeawoxVWwCaAJgBT4FNQBjU2Q=">
      <input type="hidden" id="staticImg" value="http://m.niwodai.com/mobile/2015/images/">
    <input type="hidden" id="amountJoinMin" name="amountMin" class="amountMin" value="100">
      <input type="hidden" id="amountJoinMax" name="amountMax" class="amountMax" value="">
      <input type="hidden" id="amountJoinRest" class="amountRest" value="10000">
      <input type="hidden" id="amountIncrease" name="increase" class="increase" value="50">
      <input type="hidden" name="businessType" value="0">
      <input type="hidden" id="token" name="token" value="2bb0b56e-7905-4e97-a6b2-de62d4a06a8a">
         <div class="ft_l fl"> 
         <form action="{:url('usemoney/order')}" method="post">
         
          <input type="hidden" name="type" value="1">
          <input id="submit" type="submit" value="按期还款" class="btn btn_orange w_10">    </form>     
         </div>
         <div class="ft_r fr">
         <form action="{:url('usemoney/order')}" method="post">
           
            <input type="hidden" name="type" value="2">
            <input id="submit" type="submit" value="一次性还款" class="btn btn_orange w_10">
         </form>
         </div>       
        
  </article>
  <script type="text/javascript" src="__static__script/detail.js"></script>

</body>
</html>


