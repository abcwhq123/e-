<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/setting.css" />
<link rel="stylesheet" type="text/css" href="__static__css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="__static__css/sweet-alert.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
<script src="__static__script/setting.js"></script>
</head>
<body>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="#" class="z-01"></a> <span>安全设置</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="m-wrapper">
  <div class="wrapper   ">
    <div class="login-password">
      <div class="container-fluid">
        <form class="set-password" id="set-password" onSubmit="return false;">
          <div class="form-group item">
            <input type="password" class="form-control input-lg login-input" id="old-password" name="password" tabindex="1" placeholder="请输入原登录密码">
          </div>
          <div class="item form-group">
            <input type="password" class="form-control input-lg" id="new-password" name="password" tabindex="2" placeholder="请输入新登录密码">
          </div>
          <div class="form-group item">
            <input type="password" class="form-control input-lg" id="ok-password" name="password" tabindex="3" placeholder="请输入新登录密码">
          </div>
          <div class="form-group">
            <button type="button" class="waves-button form-control login-button input-lg waves-effect waves-effect" tabindex="4" data-dismiss="modal">确定</button>
            <!-- Modal -->
          </div>
        </form>
        <div>
          <p class="text-center ui-fs-12 text-nowrap">若您无法通过该方式找回密码，请联系客服电话</p>
          <p class="text-center ui-fs-12 text-nowrap"><span>400-090-1268</span></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 页面底部 -->
<nav class="footer border_t" id="footer"> <a href="index.html" class="" id="jx"><span></span>首页</a> <a href="list.html" id="lc" class="nav_on"><span></span>理财</a> <a href="#" id="jk" class=""><span></span>借款</a> <a href="个人中心.html" id="cf" class=""><span></span>我的账户</a> </nav>
<div class="sweet-overlay" tabindex="-1" style="opacity: 1.0899999999999999; display: block;"></div>
<div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="true" data-animation="pop" data-timer="null" style="display: block; margin-top: -176px;"><div class="sa-icon sa-error" style="display: none;"><span class="sa-x-mark"><span class="sa-line sa-left"></span><span class="sa-line sa-right"></span></span></div><div class="sa-icon sa-warning" style="display: none;"> <span class="sa-body"></span> <span class="sa-dot"></span> </div> <div class="sa-icon sa-info" style="display: none;"></div> <div class="sa-icon sa-success animate" style="display: block;"> <span class="sa-line sa-tip animateSuccessTip"></span> <span class="sa-line sa-long animateSuccessLong"></span> <div class="sa-placeholder"></div> <div class="sa-fix"></div> </div> <div class="sa-icon sa-custom" style="display: none;"></div> <h2>温馨提示</h2><p style="display: block;">恭喜您，密码修改成功！</p><fieldset><input type="text" tabindex="3"><div class="sa-input-error"></div></fieldset> <div class="sa-error-container"><div class="icon">!</div> <p>Not valid!</p></div> <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button><button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(174, 222, 244); box-shadow: rgba(174, 222, 244, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.0470588) 0px 0px 0px 1px inset;">OK</button></div>
</body>
</html>
