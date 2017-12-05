<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
<script type="text/javascript" src="__static__js/jquery.js"></script>
<!--图片切换-->
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
</head>
<body>
<!-- 页面头部 -->
<section>
    <div class="navigation-bar"> <a href="{:url('index/index')}" class="z-01"></a> <span>注册</span> <a href="{:url('index/index')}" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="register">
  <div class="wrapper-reg">
    <div class="page-header"> <a href="/"> <img src="__static__images/reg-logo.png"> </a> </div>
    <div class="page-main">
      <form id="registerForm" name="registerForm" method="post" action="#" class="reg-form" enctype="application/x-www-form-urlencoded">
        <div class="m-field">
          <div class="iconphone"></div>
          <input id="registerForm:mobileNumber" type="text" name="user_tel" class="c-txt" maxlength="15"  placeholder="请输入真实手机号码">
          <p id="mobileNumberErrorDiv" class="validateNew"></p>
        </div>
        <div class="m-field" style="position: relative;">
          <div class="iconpwd"></div>
          <input type="password" name="user_pwd" value="" maxlength="20"  style="color: rgb(74, 74, 74);" class="c-txt" placeholder="请输入密码">
          <p id="passwordErrorDiv" class="validateNew"></p>
        </div>
        <div class="m-field" style="position: relative;">
            <div class="iconpwd"></div>
                <input type="password" name="user_password" value="" maxlength="20"  style="color: rgb(74, 74, 74);" class="c-txt" placeholder="请确认密码">
            <p id="querypassword" class="validateNew"></p>
            </div>
            <div class="m-field m-yzm" id="imageCode" >
                <div class="m-code">
                    <div class="iconyzm"></div>
                    <input id="authCode" type="text" name="code" class="c-txt c-code" maxlength="5"  placeholder="请输入验证码">
                </div>
                <span class="c-yzm"><img src="{:captcha_src()}" class="verify" onclick="javascript:this.src='{:captcha_src()}?rand='+Math.random()" ></span>
                <p id="j_yzmErrorDiv"></p>
            </div>
        <div class="m-field m-yzm">
        <div class="m-code">
        <div class="iconyzm"></div>
            <input id="registerForm:authCode" type="text" name="tel_code" class="c-txt c-code" maxlength="6" placeholder="请输入验证码">
            <p id="tel_yzmErrorDiv"></p>
        </div>
        <span class="c-yzm c-hqyzm">获取验证码</span> 
        <span id="sendCode" class="c-yzm c-hqyzm">
            <?php if (isset($_COOKIE['wait']) ? $_COOKIE['wait'] : "" != 0 || !empty($_COOKIE['wait'])){ ?>
              <input type="button" id="btn"  onload="zdtime(this)" style="border:none;background:#F1483C" name="getbtn" class="hqyzm" value="重新发送(<?= isset($_COOKIE['wait']) ? $_COOKIE['wait'] : '' ?>)"/>
              <input type="hidden" name="tel_code_yz" id="tel_code_yz">
            <?php }else{ ?>
              <input type="button" id="btn" style="border:none;background:#F1483C" name="getbtn" class="hqyzm" value="获取验证码" />
              <input type="hidden" name="tel_code_yz" id="tel_code_yz">
            <?php } ?>
        </span> 
        <p id="authCodeErrorDiv" class="validateNew"></p>
        </div>
        <div class="agreement"> 我已阅读并同意阳光易贷的
            <a href="" class="reg-xy">《隐私条款》</a>和 
            <a href="{:url('login/protocol')}" class="reg-xy">《服务条款》</a> 
        </div>
        <input id="registerForm:submitButton" type="submit"  value="同意并继续" style="border:none;cursor:pointer;" class="btn-submit mt20" onClick="return checkAll();">
      </form>
      <div class="m-ljzc"> 已有账号　<a href="{:url('login/login')}">立即登录</a> </div>
    </div>
  </div>
</div>


<script src="__static__js/jquery.js"></script>
<script type="text/javascript" src="__static__js/jquery.cookie.js"></script> 

<script type="text/javascript">

var action = {
    "user_tel" : false,
    "user_pwd" : false,
    "user_password" : false,
    "code" : false,
    "tel_code" : false
}


//判断手机号是否符合规则

$("input[name='user_tel']").blur(function(){
    $("#mobileNumberErrorDiv").empty("")
    var user_tel = $(this).val()
    var myreg = /^1[3|4|5|7|8][0-9]{9}$/; 
    if(!myreg.test(user_tel))  { 
        $("#mobileNumberErrorDiv").append("请输入有效的手机号码！")
        action.user_tel = false;
        return false; 
    }
    action.user_tel = true;
})

//判断密码的准确性

$("input[name='user_pwd']").blur(function(){
    $("#passwordErrorDiv").empty("")
    var user_pwd = $(this).val();
    // alert(user_pwd)
    var myreg =   /^[A-Za-z0-9]{6,20}$/;
    if(!myreg.test(user_pwd))  { 
        $("#passwordErrorDiv").append("密码为6-20位的字母或数字")
        action.user_pwd = false;
        return false; 
    }
    action.user_pwd = true;
})

//密码是否一致

$(document).on("blur","input[name='user_password']",function(){
    $("#querypassword").empty("")
    var user_pwd = $("input[name='user_pwd']").val()
    var user_password = $(this).val()
    if (user_password == "") {
        $("#querypassword").append("密码为空");
        action.user_password = false;
        return false; 
    }
    if(user_password != user_pwd)  { 
        $("#querypassword").append("密码不一致");
        action.user_password = false;
        return false; 
    }
    action.user_password = true;
})

//判断验证码是否正确

$("#authCode").blur(function(){
    $("#j_yzmErrorDiv").empty("")
    var myreg =  /^[A-Za-z0-9]{5}$/;
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

//判断手机验证码是否正确

$("input[name='tel_code']").blur(function(){
    $("#tel_yzmErrorDiv").empty("")
    var tel_code = $(this).val()

    var user_tel = $("input[name='user_tel']").val()
    alert(user_tel)
    var myreg = /^[0-9]{4}$/;
    if(!myreg.test(tel_code))  { 
        $("#tel_yzmErrorDiv").append("验证码错误！！")
        action.tel_code = false;
        return false; 
    }
    $.ajax({
        type:"post",
        url:"{:url('login/md5_code')}",
        dataType:"json",
        data:{
            tel_code:tel_code,
            user_tel:user_tel,
            code:$.cookie("code")
        },
        success:function(o){
            if (o.status==2) {
                $("#tel_yzmErrorDiv").append(o.msg)
                action.tel_code = false;
            }
            if (o.status==3) {
                $("#tel_yzmErrorDiv").append(o.msg)
                action.tel_code = false;
            }
            if (o.status==1) {
                action.tel_code = true;
            };
        }
    })     
})

// 倒计时   短信验证 

if ($.cookie('wait') != 0 || $.cookie('wait') != "") {
  wait = $.cookie('wait')
}
if ($.cookie('wait') == "NaN" || $.cookie('wait') == undefined || $.cookie('wait') == 0 ) {
    var wait=60;
};
$(".hqyzm").click(function(){
    $("#mobileNumberErrorDiv").empty("")
    var user_tel = $("input[name='user_tel']").val()
    var myreg = /^1[3|4|5|7|8][0-9]{9}$/; 
    var btn = $(this).attr("id")
    if(!myreg.test(user_tel))  { 
        $("#mobileNumberErrorDiv").append("请输入有效的手机号码！")
        return false; 
    }else{
        $(this).attr("disabled",'disabled');
        time(this);
        $.ajax({
            type:"post",
            url:"{:url('login/sendtell')}",
            dataType:"json",
            data:{
                user_tel:user_tel
            },
            success:function(o){
              if (o.success == 1) {
                alert(o.msg)
              }else{
                var data = eval(o.res); 
                if (data.success == "1") {
                    $.cookie('code',o.code)
                }else{
                  alert("手机号错误")
                }
              }
            }
        })      
    }
})
// if ($.cookie('wait') != 0  || $.cookie('wait') != "") {
//     $(".hqyzm").trigger("click"); 
// } 
function time(o) {
    if (wait == 0) {
        o.removeAttribute("disabled");
        o.value="获取验证码";
        wait = 60;
    } else {
        o.setAttribute("disabled", true);
        o.value="重新发送(" + wait + ")";
        wait--;
        
        $.cookie('wait',wait)
        setTimeout(function() {
            time(o)
        },
        1000)
    }
}

$("form").submit(function(e){
    $("input[name='user_tel']").trigger("blur")
    $("input[name='user_pwd']").trigger("blur")
    $("input[name='user_password']").trigger("blur")
    $("#authCode").trigger("blur")
    $("input[name='tel_code']").trigger("blur")
    if (action.user_tel && action.user_pwd && action.user_password && action.code && action.tel_code) {
        return true;
    }else{
        return false;
    }

});

</script>
<script type="text/javascript">
$("#allmm").bind("click",function(){
    if($("#allmenu").css("display")=="none"){
        $("#allmenu").slideDown(300);
    }else{
        $("#allmenu").slideUp(200);
    }
});
</script>
<script type="text/javascript">
        function checkAll(){
            var mobileNumberFlag=checkMobilenumber();   
        }

        function checkMobilenumber()
        {
            var mobileNumber = $("#registerForm\\:mobileNumber").val();
            nullMobileNumberFlag=mobileNumber==""||mobileNumber=="请输入真实手机号码";
            if(nullMobileNumberFlag)
            {
                $("#mobileNumberErrorDiv").empty();
                $("#mobileNumberErrorDiv").append("请输入真实手机号码");
                return false;
            }
            else
            {
                $("#mobileNumberErrorDiv").empty();
            }
            return true;
        }
        </script>
<script type="text/javascript" src="__static__script/jsf.js.htm"></script>
</body>
</html>
