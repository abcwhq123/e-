<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
</head>
<body>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="{:url('index/index')}" class="z-01"></a> <span>注册</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="register">
  <div class="wrapper-reg">
    <div class="page-header"> <a href="/"> <img src="__static__images/reg-logo.png"> </a> </div>
    <div class="page-main">
      <form action="{:url('login/login')}" method="post" id="user-login-form" accept-charset="UTF-8" class="reg-form">
        <div class="m-field">
          <div class="iconuser"></div>
          <input id="j_username" type="text" name="user_name" class="c-txt" maxlength="26" placeholder="请输入用户名/手机号/邮箱" style="color: rgb(74, 74, 74);">
          <p id="j_usernameErrorDiv"></p>
        </div>
        <div class="m-field">
          <div class="iconpwd"></div>
          <input id="j_password2" type="password" name="user_pwd" class="c-txt" maxlength="26" style="background-position: 0 -472px;" placeholder="请输入密码">
          <p id="j_passwordErrorDiv"></p>
        </div>
        <div class="m-field m-yzm" id="imageCode" >
          <div class="m-code">
            <div class="iconyzm"></div>
            <input id="authCode" type="text" name="authCode" class="c-txt c-code" maxlength="4" placeholder="请输入验证码">
          </div>
          <span class="c-yzm"><img src="{:captcha_src()}" class="verify" onclick="javascript:this.src='{:captcha_src()}?rand='+Math.random()" ></span>
          <p id="j_yzmErrorDiv"></p>
        </div>
        <div class="remember">
          <input id="ifRemember" class="m-chk" type="checkbox" checked="checked">
          <span>记住用户名</span><a href="#">忘记密码?</a> </div>
        <input class="btn-submit" style="border:none; cursor:pointer;" type="submit" value="登　录" >
      </form>
        <!--其他登录方式-->
      <div class="Login_Method">
        <p></p>   
        <div><a href="<?= $url ?>"><img src="__static__images/weibo_login.png" /></a></div>
      </div>
      <div class="m-ljzc"> 没有账号？<a href="{:url('login/register')}">立即注册</a> </div>
    </div>
  </div>
</div>

<script src="__static__js/jquery.js"></script>
<script>
var action = {
    "user_name" : false,
    "user_pwd" : false,
    "code" : false,
}
//判断手机号是否符合规则
$(document).on("blur","input[name='user_name']",function(){
    $("#j_usernameErrorDiv").empty("")
    var user_name = $(this).val()
    var myreg = /^1[3|4|5|7|8][0-9]{9}$/; 
    if(!myreg.test(user_name))  { 
        $("#j_usernameErrorDiv").append("请输入有效的手机号码！")
        action.user_name = false;
        return false; 
    }
    $.ajax({
        type:"post",
        url:"{:url('login/true_tell')}",
        dataType:"json",
        data:{
            user_name:user_name
        },
        success:function(o){
            if (o.status==1) {
                action.user_name = true;
            }
            if (o.status==2) {
                $("#j_usernameErrorDiv").append(o.msg)
                action.user_name = false;
            }
        }
    })      
})
//判断密码的准确性
$("input[name='user_pwd']").blur(function(){
    $("#j_passwordErrorDiv").empty("")
    var user_pwd = $(this).val();
    var myreg =   /^[A-Za-z0-9]{6,20}$/;
    if(!myreg.test(user_pwd))  { 
        $("#j_passwordErrorDiv").append("密码为6-20位的字母或数字")
        action.user_pwd = false;
        return false; 
    }
    action.user_pwd = true;
})

//判断验证码是否正确
$("#authCode").blur(function(){
    $("#j_yzmErrorDiv").empty("")
    var myreg =  /^[A-Za-z0-9]{4}$/;
    var code = $(this).val()
    if(!myreg.test(code))  { 
        $("#j_yzmErrorDiv").append("验证码错误！！")
        action.code = false;
        return false; 
    } 
    $.ajax({
        type:"post",
        url:"{:url('login/get_captcha')}",
        dataType:"json",
        data:{
            code:code
        },
        success:function(o){
            if (o.status==1) {
                action.code = true;
            }
            if (o.status==2) {
                $("#j_yzmErrorDiv").append(o.msg)
                action.code = false;
            }
        }
    })      
})
$(".verify").click(function(){
    $("#authCode").val("")
})


$("form").submit(function(e){
    $("input[name='user_name']").trigger("blur")
    $("input[name='user_pwd']").trigger("blur")
    $("#authCode").trigger("blur")
    if (action.user_name && action.user_pwd  && action.code ) {
        return true;
    }else{
        return false;
    }

});

</script>
</body>
</html>
