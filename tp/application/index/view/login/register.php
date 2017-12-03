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
          <input id="registerForm:password2" type="text" name="user_pwd" class="c-txt" maxlength="20" style="display: none;" placeholder="请输入密码">
          <input id="registerForm:password" type="password" name="user_pwd" value="" maxlength="20"  style="color: rgb(74, 74, 74);" class="c-txt" placeholder="请输入密码">
          <span class="pwdviewoff" onClick="changePasswordShow(this)"></span>
          <p id="passwordErrorDiv" class="validateNew"></p>
        </div>
        <div class="m-field" style="position: relative;">
          <div class="iconpwd"></div>
          <input id="registerForm:password2" type="text" name="user_password" class="c-txt" maxlength="20" style="display: none;" placeholder="确认密码">
          <input id="registerForm:password" type="password" name="user_password" value="" maxlength="20"  style="color: rgb(74, 74, 74);" class="c-txt" placeholder="请确认密码">
          <span class="pwdviewoff" onClick="changePasswordShow(this)"></span>
          <p id="passwordErrorDiv" class="validateNew"></p>
        </div>
        <div class="m-field m-yzm" id="imageCode" >
          <div class="m-code">
            <div class="iconyzm"></div>
            <!-- <input id="j_needauth" type="hidden" name="j_needauth" value="false">
            <input id="_spring_security_remember_me" type="hidden" name="_spring_security_remember_me" value="true"> -->
            <input id="authCode" type="text" name="code" class="c-txt c-code" maxlength="4"  placeholder="请输入验证码">
          </div>
          <span class="c-yzm"><img style="height: 100%;" src="__static__images/code.jpg"></span>
          <p id="j_yzmErrorDiv"></p>
        </div>
        <div class="m-field m-yzm">
        <div class="m-code">
        <div class="iconyzm"></div>
            <input id="registerForm:authCode" type="text" name="tel_code" class="c-txt c-code" maxlength="6" placeholder="请输入验证码">
        </div>
        <span class="c-yzm c-hqyzm">获取验证码</span> 
        <span id="sendCode" class="c-yzm c-hqyzm">
            <?php if ($_COOKIE['wait'] != 0){ ?>
              <input type="button" id="btn" style="border:none;background:#F1483C" name="getbtn" class="hqyzm" value="重新发送(<?= $_COOKIE['wait'] ?>) " />
              <input type="hidden" name="tel_code_yz" id="tel_code_yz">
            <?php }else{ ?>
              <input type="button" id="btn" style="border:none;background:#F1483C" name="getbtn" class="hqyzm" value="获取验证码" />
              <input type="hidden" name="tel_code_yz" id="tel_code_yz">
            <?php } ?>
            <!-- <a id="registerForm:sendAuthCodeBtn" href="javascript:void(0)" class="btn_mfyzm" >获取验证码</a>  -->
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
//倒计时   短信验证

if ( $.cookie('wait') != 0) {
  wait = $.cookie('wait')
}else{
  var wait=60;
}


$(".hqyzm").click(function(){
    var user_tel = $("input[name='user_tel']").val()
    var myreg = /^1[3|4|5|7|8][0-9]{9}$/; 
    var btn = $(this).attr("id")
    if(!myreg.test(user_tel))  { 
        alert('请输入有效的手机号码！'); 
        return false; 
    }else{
        $(this).attr("disabled",'disabled');
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
                  $("input[name='tel_code_yz']").val(o.code)
                }else{
                  alert("手机号错误")
                }
              }
            }
        })
        if ($.cookie('wait') != 0) {
          $(this).trigger("myClick",["我的自定义","事件"]); 
        };

        time(this);
        
    }

})

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
</script>
<script type="text/javascript">   
      //验证所有信息
      function checkAll(){
        var refferValue=""!="";
        var mobileNumberFlag=checkMobilenumber();
        var authCodeFlag=checkAuthCode();
        var passwordFlag=checkPassword();
        if(refferValue)
        {
          referrerFlag=true;
        }
        else
        {
          var referrerFlag=checkReferrer();
        }
        var allFlag=mobileNumberFlag&&authCodeFlag&&passwordFlag&&referrerFlag;
        if(!(allFlag)){
          return false;
        }
        return true;
      }
      
    var flag = false;
    //验证码发送消息提示
    function sCode(xhr, status, args) {
      if (!args.validationFailed) {
        $("#sendCode").hide();
        $("#sendCodeGrey").show();
        if(flag && $("#sendCode").is(":hidden")){
          return;
        }
        flag = true;
        timer("sendAuthCodeBtn1", {
          "count" : 60,
          "animate" : true,
          initTextBefore : "重新获取",
          initTextAfter : "秒",
          callback:function(){
            $("#sendCode").show();
            $("#sendCodeGrey").hide();
            flag = false;
          }
        }).begin();
      }
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
    
    function checkAuthCode()
    {
      var authCode=$("#registerForm\\:authCode").val();
      nullAuthCodeFlag=authCode==""||authCode=="请输入验证码";
      if(nullAuthCodeFlag)
      {
        $("#authCodeErrorDiv").empty();
        $("#authCodeErrorDiv").append("请输入验证码");
        return false;
      }
      else
      {
        $("#authCodeErrorDiv").empty();
      }
      return true;
    }
    
    
    function checkPassword()
    {
      var password=$("#registerForm\\:password").val();
      nullpasswordFlag=password==""||password=="请输入密码";
      if(nullpasswordFlag)
      {
        $("#passwordErrorDiv").empty();
        $("#passwordErrorDiv").append("请输入密码");
        return false;
      }
      else
      {
        $("#passwordErrorDiv").empty();
      }
      return true;
    }
    
    /** 邀请码验证规则 */
    function checkReferrer(){
      
      var referrer=$("#registerForm\\:referrer").val();
      if(referrer!=""&&referrer!="请输入邀请码 (选填)"){
        var referrerRegex="^[0-9]{4}$";
        var referrerPattern=new RegExp(referrerRegex);
        var referrerFlag=referrerPattern.test(referrer);
        if(!referrerFlag){
          $("#referrerErrorDiv").empty();
          $("#referrerErrorDiv").append("请输入4位纯数字");
          return false;
        }else{
          $("#referrerErrorDiv").empty();
        }
      }
      else
      {
        $("#referrerErrorDiv").empty();
      }
      return true;
    }
    
    //]]>
    </script>
<script type="text/javascript"> 
    //<![CDATA[
     if(""==$("#registerForm\\:referrer").val()){
        $("#registerForm\\:referrer").val("请输入邀请码 (选填)");
      $("#registerForm\\:referrer").css("color","#c3c3c3");
     }
     $("#registerForm\\:password").focusout(function(){
        if($("#registerForm\\:password").val() == ""){
          $("#registerForm\\:password2").css("display", "");
          $("#registerForm\\:password").css("display", "none");
          $("#registerForm\\:password2").val("请输入密码");
        }
    });
    function changePasswordShow(element)
    {
      var hasFlag=$(element).hasClass('pwdview');
      if(hasFlag)
      {
        $(element).removeClass('pwdview');
        $(element).addClass('pwdviewoff');
        passwordShowFlag=false;
        $("#registerForm\\:password").attr('type','password');
      }
      else
      {
        $(element).removeClass('pwdviewoff');
        $(element).addClass('pwdview');
        passwordShowFlag=true;
        $("#registerForm\\:password").attr('type','text');
      }
    }
    if(""==$("#registerForm\\:password").val()){
        $("#registerForm\\:password").val("请输入密码");
      $("#registerForm\\:password").css("color","#c3c3c3");
    }
     
      $("#registerForm\\:password2").focusin(function(){
           if($("#registerForm\\:password").val()=="请输入密码"){
             $("#registerForm\\:password").val("");
           }
            $("#registerForm\\:password2").css("display", "none");
            $("#registerForm\\:password").css("display", "");
            $("#registerForm\\:password").css("color","#4a4a4a");
            $("#registerForm\\:password").focus().click();
       });
     $("#registerForm\\:referrer").focusin(function(){
      if($("#registerForm\\:referrer").val() == "请输入邀请码 (选填)") {
        $("#registerForm\\:referrer").val("");
        $("#registerForm\\:referrer").css("color","#4a4a4a");
          }
     }).focusout(function(){
      if($("#registerForm\\:referrer").val() == ""){
        $("#registerForm\\:referrer").val("请输入邀请码 (选填)").css("color", "#c3c3c3");
      }else{
        $("#registerForm\\:referrer").css("color","#4a4a4a");
      }
     });
     $("#registerForm\\:authCode").focusin(function(){
        if($("#registerForm\\:authCode").val() == "请输入验证码") {
          $("#registerForm\\:authCode").val("");
          $("#registerForm\\:authCode").css("color","#4a4a4a");
        }
       }).focusout(function(){
        if($("#registerForm\\:authCode").val() == "" ||$("#registerForm\\:authCode").val() == "请输入验证码") {
          $("#registerForm\\:authCode").val("请输入验证码").css("color", "#A6A6A6");
        }else{
          $("#registerForm\\:authCode").css("color","#4a4a4a");
        }
       });
       $("#registerForm\\:mobileNumber").focusin(function(){
        if($("#registerForm\\:mobileNumber").val() == "请输入真实手机号码") {
          $("#registerForm\\:mobileNumber").val("");
          $("#registerForm\\:mobileNumber").css("color","#4a4a4a");
        }
       }).focusout(function(){
        if($("#registerForm\\:mobileNumber").val() == "" ||$("#registerForm\\:mobileNumber").val() == "请输入真实手机号码") {
          $("#registerForm\\:mobileNumber").val("请输入真实手机号码").css("color", "#A6A6A6");
        }else{
          $("#registerForm\\:mobileNumber").css("color","#4a4a4a");
        }
       });
       var second = 0;
         var internal;
       function checkSendCode()
       {
          $("#mobileNumberErrorDiv").empty();
          var mobileNumber = $("#registerForm\\:mobileNumber").val();
          var mobileRegex="^1[3|4|5|7|8][0-9]{9}$";
          var usernamePattern=new RegExp(mobileRegex);
          var usernameFlag=usernamePattern.test(mobileNumber);
          if(!usernameFlag){
            $("#mobileNumberErrorDiv").append("请输入真实手机号码");
            return false;
          }

          var returnResult = false;
          $.ajax({
               url: "/valiSms",
               async:false,
               data:{
                mobileNumber:mobileNumber
               },
               success: function(data){
                 if(data.flag == 'NO'){
                   $("#mobileNumberErrorDiv").html("点击过于频繁,请<b>"+data.second+"</b>秒后重试");
                   second = data.second;
                   clearInterval(internal);
                   internal = setInterval(function(){
                                  if(second == 0){
                                    $("#mobileNumberErrorDiv").html('');
                                  }else{
                                    second = second -1;
                                    $("#mobileNumberErrorDiv").find('b').html(second);
                                  }
                   },1000);
                   returnResult = false;
                 }else if(data.flag == 'NO1'){
                   $("#mobileNumberErrorDiv").html(data.smsVali);
                   returnResult = false;
                 }else{
                   returnResult = true;
                 }
               }
              });
          
          return returnResult;
      }

       $(document).ready(function(){
               $("#javax_faces_developmentstage_messages").remove();
               
         }); 
    //]]>
  </script>
<script type="text/javascript" src="__static__/script/jsf.js.htm"></script>
</body>
</html>
