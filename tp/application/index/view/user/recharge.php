<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>信富平台</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="__static__css/home.css" rel="stylesheet" type="text/css" media="all" />
<link href="__static__css/css.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body style="background:#fff;">

<!--top-->

<div class="top">
	<div class="box">
        <a href="{:url('user/index')}" class="return"><img src="__static__images/return.png"></a>
        充值
        <a href="{:url('user/record')}" class="po_rec">充值记录</a>    
    </div>
</div>



<div class="login_lo" style="margin-top:66px;">
	<div class="box">
    	<div class="balance">
            <span>账户当期余额：<i>0.00</i>元</span>
        </div>
        <div class="lo_1 lo_2">
        	<span>充值金额</span>
            <input type="text" name="address" size="60" maxlength="60" style="color:#ccc" value="请输入充值金额" onfocus="if(this.value=='请输入充值金额'){this.value=''};this.style.color='black';" onblur="if(this.value==''||this.value=='请输入充值金额'){this.value='请输入充值金额';this.style.color='#ccc';}">
        </div>
        <span class="zui"><i>*</i> 最低充值金额为 100 元</span>
                    
        <a href="#" class="lo_login">充值</a>
    </div>
</div>


</body>
</html>
