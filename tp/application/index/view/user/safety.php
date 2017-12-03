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
  <div class="navigation-bar"> <a href="{:url('user/index')}" class="z-01"></a> <span>安全设置</span> <a href="{:url('index/index')}" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="personal">
  	<div class="personal-list"> 
  		<a class="plist" href="{:url('user/autonym')}"> 
  			<span class="ptit p15">实名认证</span><span class="iconarrow"></span>
  			<span class="auto-icon">已认证</span> </a> 
  		<a class="plist" href="{:url('user/password')}"> 
  			<span class="ptit p15">修改登录密码</span><span class="iconarrow"></span>
  		</a> 
  		<a class="plist" href="{:url('user/tell')}"> 
  			<span class="ptit p15">修改手机号码</span>
  			<span class="iconarrow"></span> 
  		</a> 
  	</div>
</div>
<!-- 页面底部 -->
{include file="common/foot"}
