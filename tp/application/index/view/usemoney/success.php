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
<body style="background:#0CAFFE;">
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="#" class="z-01"></a> <span>待审核</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="register">
  <div class="wrapper-reg">
    <div class="page-header"> <a href="/"> <img src="__static__images/reg-success.png"> </a> </div>
    <div class="page-main">
      <form id="registerForm" name="registerForm" method="post" action="" class="reg-form">
        <input type="hidden" name="registerForm" value="registerForm">
        <p class="msg">您已提交申请成功请耐心等候。。。</p>
        <a class="btn-submit mt20 center" href="{:url('user/index')}">个人中心</a>
        <input type="hidden" value="" autocomplete="off">
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="__static__script/jsf.js.htm"></script>
</body>
</html>
