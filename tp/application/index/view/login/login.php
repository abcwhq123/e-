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
  <div class="navigation-bar"> <a href="{:url('index/index')}" class="z-01"></a> <span>注册</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="register">
  <div class="wrapper-reg">
    <div class="page-header"> <a href="/"> <img src="__static__images/reg-logo.png"> </a> </div>
    <div class="page-main">
      <form action="" method="post" id="user-login-form" accept-charset="UTF-8" class="reg-form">
        <div class="m-field">
          <div class="iconuser"></div>
          <input id="j_username" type="text" name="j_username" value="15055100139" class="c-txt" maxlength="26" onBlur="return checkUsername()" placeholder="请输入用户名/手机号/邮箱" style="color: rgb(74, 74, 74);">
          <p id="j_usernameErrorDiv"></p>
        </div>
        <div class="m-field">
          <div class="iconpwd"></div>
          <input id="j_password2" type="text" name="j_password2" value="请输入密码" class="c-txt" maxlength="26" style="background-position: 0 -472px;" placeholder="请输入密码">
          <input id="j_password" type="password" name="j_password" value="" maxlength="26" onBlur="checkPassword()" style="display: none;" class="c-txt" placeholder="请输入密码">
          <p id="j_passwordErrorDiv"></p>
        </div>
        <div class="m-field m-yzm" id="imageCode" >
          <div class="m-code">
            <div class="iconyzm"></div>
            <input id="j_needauth" type="hidden" name="j_needauth" value="false">
            <input id="_spring_security_remember_me" type="hidden" name="_spring_security_remember_me" value="true">
            <input id="authCode" type="text" name="authCode" value="请输入验证码" class="c-txt c-code" maxlength="4" onBlur="checkAuthcode();" onKeyUp="this.value=this.value.replace(/\D/g,'')" placeholder="请输入验证码">
          </div>
          <span class="c-yzm"><img style="height: 100%;" src="__static__images/code.jpg"></span>
          <p id="j_yzmErrorDiv"></p>
        </div>
        <div class="remember">
          <input id="ifRemember" class="m-chk" type="checkbox" checked="checked">
          <span>记住用户名</span><a href="#">忘记密码?</a> </div>
        <input class="btn-submit" style="border:none; cursor:pointer;" type="button" value="登　录" onClick="">
      </form>
      <div class="m-ljzc"> 没有账号？<a href="{:url('login/register')}">立即注册</a> </div>
    </div>
  </div>
</div>
<script>
		//<![CDATA[
		           var loginError = false;
		           
		           var pwdFlag = false;
		           var codeFlag = false;
		           
		          //验证用户名
				  function checkUsername(){

					  var usernameRegex="^[a-zA-Z0-9\u4E00-\u9FA5_]+$";
					  var mobileOrEmailRegex="^((1[3|4|5|8][0-9]{9})|(([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}))$";
					  var username=$("#j_username").val();
					  var nullFlag=(username==""||username=="请输入用户名/手机号/邮箱");
					  if(nullFlag==true)
					  {
						  $("#j_usernameErrorDiv").html("请输入用户名/手机号/邮箱");
						  return false;
					  }
					  else
					  {
						  $("#j_usernameErrorDiv").html("");
					  }
					  var usernamePattern=new RegExp(usernameRegex);
					  var usernameFlag=usernamePattern.test(username);
					  var mobileOrEmailPattern=new RegExp(mobileOrEmailRegex);
					  var mobileOrEmailFlag=mobileOrEmailPattern.test(username);
					  var usernameFlag=validateInputLength(username,'请输入用户名/手机号/邮箱','2','1','4','128');
					  var legalFlag=usernameFlag||mobileOrEmailFlag||usernameFlag;
					  if(!legalFlag)
					  {
						  $("#j_usernameErrorDiv").html("");
						  $("#j_usernameErrorDiv").html("4位以上字母、数字、汉字或下划线的组合");
						  return false;
					  }
					  else
					  {
						  $("#j_usernameErrorDiv").html("");
					  }
					  return true;
				  }
		          //验证密码
		          function checkPassword(){
		        	  var passwordRegex="^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,26}$";
		        	  var password=$("#j_password").val();
		        	  var nullFlag=(password==""||password=="请输入密码");
					  if(nullFlag==true){
						  $("#j_passwordErrorDiv").empty();
						  $("#j_passwordErrorDiv").html("密码不能为空");
						  return false;
					  }else{
						  $("#j_passwordErrorDiv").empty();
					  }
		        	  var passwordPattern = new RegExp(passwordRegex);
		        	  var legalFlag=passwordPattern.test(password);
		        	  if(legalFlag==false){
		        		  $("#j_passwordErrorDiv").empty();
						  $("#j_passwordErrorDiv").html("用户名或者密码输入错误");
						  return false;		
		        	  }else{
		        		  $("#j_passwordErrorDiv").empty();
		        	  } 
		        	  return true;
		          }
		          
		        //验证  验证码
		          function checkAuthcode(){
		        	
		        	  var needAuth = $("#j_needauth").val();	
		        		if("false"==needAuth){
		        			return true;
		        		}
		        	  var authCode=$("#authCode").val();
		        	  var nullFlag=(authCode==""||authCode=="请输入验证码");
					  if(nullFlag==true){
						  $("#j_yzmErrorDiv").empty();
						  $("#j_yzmErrorDiv").html("验证码不能为空");
						  return false;
					  }else{
						  $("#j_yzmErrorDiv").empty();
					  }
		        	  
		        	  return true;
		          }
		          
		          
		          //登录验证
		          function loginCheckAll(){
		          	  var userNameFlag3 = checkUsername();
		        	  var passWordFlag=checkPassword();
		        	  var authFlag = checkAuthcode();
					  $("#j_yzmErrorDiv").empty();
		        	  if(userNameFlag3&&passWordFlag&&authFlag){
		        		  $("#user-login-form").submit();
		        	  }
		        	  remeberName();
		          }
		          $(function(){
		        	  //----记住用户名和验证码显示机制，cookie操作-----------
		        	  showCookieName();
		        	  showImageCode();
		        	  //--------------
		        	 document.onkeydown = function (event){
		        		var theEvent = window.event || event;     
		        		var code = theEvent.keyCode || theEvent.which;  
		        		if(code == 13){
		        			loginCheckAll();
		        		}
						$("#j_yzmErrorDiv").empty();
					};
					reloadcode();
		         });
		         function reloadcode(){
					var verify=document.getElementById("authCodeImage");
					verify.setAttribute('src','/authimg?'+Math.random());
					
				 }
//----------登陆页记住用户名js部分----------------------------------------------------------------------------------		         
		       //记住用户名
		          function remeberName(){
		        	  var $checkname=$("#ifRemember:checked");
		        	  if($checkname){
		        		  var username=$("#j_username").val();
		        		  setCookie("tgjr_user",username);
		        	  }
		          }
		         //回显用户名
		         function showCookieName(){
		        	 var tgjr_user = getCookie("tgjr_user");
		        	 if(tgjr_user!=null){
		        		 var username=$("#j_username").attr("value",tgjr_user);
		        		 //记住用户名 复选框设为选中状态
		        		 $("#ifRemember").attr("checked",true);
		        	 }
		         }
		          function setCookie(name,value)//两个参数，一个是cookie的名，一个是值
		          {
			          var Days = 30; //此 cookie 将被保存 30 天
			          var exp   = new Date(); //new Date("December 31, 9998");
			          exp.setTime(exp.getTime() + Days*24*60*60*1000);
			          document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
		          }
		          function getCookie(name)//取cookies函数 
		          {
		          		var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		                if(arr != null) 
		                	return unescape(arr[2]); 
		                return null;

		          }

		          function delCookie(name)//删除cookie
		          {
			          var exp = new Date();
			          exp.setTime(exp.getTime() - 1);
			          var cval=getCookie(name);
			          if(cval!=null) 
			        	  document.cookie= name + "="+cval+";expires="+exp.toGMTString();
		          }
//----------登陆页记住用户名js部分----------------------------------------------------------------------------------		         
//-----------隐藏验证码，账号密码输入错误三次，显示验证码，后台也判断是否验证--------------------------------------------------------------------------------------------------
			
			//展示验证码区域
			function showImageCode(){
			
				if($("#springException").val()){
					loginError = true;
				}
			
				if(loginError){
					changeLoginErrorTimes("+");
				}
				 var tgjr_error_times = getCookie("tgjr_error_times");
	        	 if(tgjr_error_times!=null){
	        		 if(tgjr_error_times>2){
	        			 $("#imageCode").show();
	        			 $("#j_needauth").val("true");
	        		 }
	        	 }
			}
			
			//添加登录失败数,登陆失败一次+1,登陆成功后清零
			function changeLoginErrorTimes(flag){
				
				var loginErrorTimes = getCookie("tgjr_error_times");
				if(!loginErrorTimes){
					loginErrorTimes=0;
				}
				if("+"==flag){
					setCookie("tgjr_error_times",parseInt(loginErrorTimes)+1);
				}else if("-"==flag){
					setCookie("tgjr_error_times",0);
				}
				
			}
			
//-----------隐藏验证码，账号密码输入错误三次，显示验证码，后台也判断是否验证--------------------------------------------------------------------------------------------------

		//]]>
		</script>
<script type="text/javascript" src="script/jsf.js.htm"></script>
<script language="JavaScript" type="text/javascript"> 
			   	 $("#j_username").focusin(function(){
			   	 	if($("#j_username").val() == "请输入用户名/手机号/邮箱") {
				   	 	$("#j_username").val("");
				   	 	$("#j_username").css("color","#4a4a4a");
			   	 	}
			   	 }).focusout(function(){
			   	 	if($("#j_username").val() == "" ||$("#j_username").val() == "请输入用户名/手机号/邮箱"){ 
			   	 		$("#j_username").val("请输入用户名/手机号/邮箱").css("color", "#c3c3c3");
			   	 	}else{
			   	 		$("#j_username").css("color","#4a4a4a");
			   	 	}
			   	 });
			     $("#j_password").focusout(function(){
			     	if($("#j_password").val() == ""){
			     		 $("#j_password2").css("display", "");
			     		 $("#j_password").css("display", "none");
			     		 $("#j_password2").val("请输入密码").css("color", "#c3c3c3");
			     	}
			     });
			     $("#j_password2").focusin(function(){
			     	$("#j_password2").css("display", "none");
			     	$("#j_password").css("display", "");
			     	$("#j_password").css("color","#4a4a4a");
			     	$("#j_password").focus().click();
			     });
			     $("#authCode").focusin(function(){
			     	if($("#authCode").val() == "请输入验证码") {
			     		$("#authCode").val("");
			     		$("#authCode").css("color","#4a4a4a");
			     	}
			     }).focusout(function(){
			     		if($("#authCode").val() == ""||$("#authCode").val() == "请输入验证码"){ 
			     			$("#authCode").val("请输入验证码").css("color", "#c3c3c3");
			     		}else{
			     			$("#authCode").css("color","#4a4a4a");
			     		}
			     	});
 			</script>
</body>
</html>
