<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/setting.css" />
<link rel="stylesheet" type="text/css" href="__static__css/bootstrap.min.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
<!-- <script src="__static__script/setting.js"></script> -->
</head>
<body>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="{:url('user/safety')}" class="z-01"></a> <span>申请借款</span> <a href="{:url('index/index')}" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="m-wrapper">
  <div class="wrapper   ">
    <div class="login-password real-name">
      <div class="container-fluid">
        <form action="" method="post">
          <div class="form-group item">
            <input type="text" class="form-control input-lg rel-name login-input" name="money_number" placeholder="￥请输入借款金额" >
          </div>
          <div class="form-group item">
            <textarea id="area" tabindex="2" placeholder="借款原因"  rows="10" cols="84" style="resize:none;" name="money_content"></textarea>
            <p id="shuru">最少输出5个字</p>
          </div><br>
          <div class="form-group item">
            借多久（利息按天计算）:
            <select name="money_type">
              <option value="1" selected="selected">3个月</option>
              <option value="2">6个月</option>
              <option value="3">12个月</option>
            </select>
          </div><br>
          <div class="form-group item">
            总利息&nbsp;:&nbsp;&nbsp;&nbsp;<span id="mores">0.00</span>
          </div><br>
          <div class="form-group">
            <button type="submit" class="waves-button form-control login-button input-lg   waves-effect" tabindex="4" id="btn-real-name">确定</button>
          </div>
        </form>
		<div>
        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">  
    var action = {
    "money" : false,
    "content" : false,
}
    $("input[name='money_number']").blur(function(){
        var money=$(this).val();
        var type=$("select[name='money_type'] option:selected").val()
        var myreg = /^\d{1,}$/; 
        if(!myreg.test(money))  { 
            alert("请输入正确的金额")
            action.money = false;
            return false; 
        }
         action.money = true;
        getreturn(money,type)
    })
    $("textarea[name='money_content']").blur(function(){
        var content=$(this).val();
        var myreg = /^[\u4e00-\u9fa5]{5,}$/; 
        if(!myreg.test(content))  { 
            alert("请输入最少5个字的借款原因")
            action.content = false;
            return false; 
        }
        action.content = true;
    })
    $("select[name='money_type']").change(function(){
       var type=$(this).val();
       var money=$("input[name='money_number']").val();
       getreturn(money,type)
    })
    function getreturn($money,$type){
      $.ajax({
          type:"post",
          url:"{:url('usemoney/more')}",
          data:{
            money:$money,
            type:$type,
          },
          dataType:"json",
          success:function(e){
            console.log(e)
            $("#mores").html(e.num);
          }
        })
    }
    $("form").submit(function(){
    $("input[name='money_number']").trigger("blur")
    $("input[name='money_content']").trigger("blur")
    if (action.money && action.content) {
        return true;
    }else{
        return false;
    }

});
</script>  

<!-- 页面底部 -->
<nav class="footer border_t" id="footer"> 
  <a href="{:url('index/index')}" class="" id="jx"><span></span>首页</a> 
  <a href="{:url('product/index')}" id="lc" class=""><span></span>理财</a> 
  <a href="{:url('usemoney/index')}" id="jk" class="nav_on"><span></span>借款</a> 
  <a href="{:url('user/index')}" id="cf" class=""><span></span>我的账户</a> </nav>
</body>
</html>
