<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
</head>
<body>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="{:url('user/index')}" class="z-04"></a> <span>会员中心</span> <a href="{:url('index/index')}" class="z-03"></a> </div>
</section>
<!-- 中间内容 --> 
<div class="summary">
  <div class="head"><?php if (empty($user['info_img'])) {?>
    <img id="photoImage" src="__static__images/avatar1.png" alt="" style="width:80px;height:80px;z-index:0;">
    <?php }else{?>
    <img id="photoImage" src="__static__<?=$user['info_img']?>" alt="" style="width:80px;height:80px;z-index:0;">
    <?php }?> 
  <span class="username"><?php if (empty($user['user_name'])) {echo $user['user_tel'];}else{  echo $user['user_name'];}?></span>
    <div class="headamount">
      <div class="p-amount"> <i>0.00 </i><br>
        累计收益（元） </div>
      <div class="p-amount"> <i>
        <label><?=sprintf('%.2f',$user['info_balance']) ?></label>
        </i><br>
        可用余额（元） </div>
    </div>
  </div>
</div>
<div class="personal">
    <div class="personal-list"> 
        <a class="plist" href="{:url('user/recharge')}"><span class="picon1"></span><span class="ptit">充值</span><span class="iconarrow"></span> </a> 
        <a class="plist" href="{:url('user/invest')}"> <span class="picon2"></span><span class="ptit">投资记录</span><span class="iconarrow"></span> </a> 
        <a class="plist" href="{:url('user/borrow')}"> <span class="picon7"></span><span class="ptit">借款记录</span><span class="iconarrow"></span> </a>
        <a class="plist" href="{:url('user/withdraw')}"> <span class="picon3"></span><span class="ptit">提现</span><span class="iconarrow"></span> </a> 
    </div>
    <div class="personalout"> 
        <a class="plist" href="{:url('user/invest')}"> <span class="picon5"></span><span class="ptit">系统消息（<i class="pink">0</i> 条未读）</span><span class="iconarrow"></span> </a> </div>
    <div class="personalout"> 
        <a class="plist" href="{:url('user/safety')}"> <span class="picon4"></span><span class="ptit">安全设置</span><span class="iconarrow"></span> </a> </div>
    <div class="personalout"> 
        <a class="plist" href="#"> <span class="picon6"></span><span class="ptit">退出账号</span><span class="iconarrow"></span> </a> </div>
</div>
<!-- 页面底部 -->
{include file="common/foot"}