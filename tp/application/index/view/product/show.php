<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
<script type="text/javascript" src="__static__script/column.js"></script>
</head>
<body>
<!--浮动-->
<div class="dropMask"></div>
<div class="dragBtn"></div>
<div class="dropBox">
  <div class="dropSkin"></div>
  <ul class="dropList">
    <li class="nth-child_1"> <a href="#" class="dropIco"></a>
      <p>首页</p>
    </li>
    <li class="nth-child_2"> <a href="#" class="dropIco"></a>
      <p>投资</p>
    </li>
    <li class="nth-child_3"> <a href="#" class="dropIco"></a>
      <p>个人中心</p>
    </li>
    <li class="nth-child_4"> <a href="#" class="dropIco"></a>
      <p>注册</p>
    </li>
    <li class="nth-child_5"> <a href="#" class="dropIco"></a>
      <p>登录</p>
    </li>
  </ul>
</div>
<script src="__static__script/index.js"></script>
<script src="__static__script/jquery-ui.min.js"></script>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="#" class="z-01"></a> <span>产品详情</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="main">
  <!--标的进度-->
  <div class="con-circle">
    <aside class="sec_ce">
      <p class="sec_ce_id">募集进度</p>
      <img src="__static__images/zhuti.png" alt="">
      <p class="sec_ce_pc ng-binding"><?=$product['length']?><span class="sec_ce_b">%</span></p>
      <div class="sec_ce_pt"> <span>按月付息，到期还本</span> </div>
    </aside>
  </div>
  <!--标的详细-->
  <div class="project-status">
    <div class="project-base-info">
      <div class="col-xs-4 ui-border-right">
        <p class="text-nowrap"><span class="ui-fc-blue ui-fs-18"><?=$product['product_rate']*100?></span> %</p>
        <p class="ui-fs-12 text-nowrap">年化收益</p>
      </div>
      <div class="col-xs-4 ui-border-right">
        <p class="text-nowrap"><span class="ui-fs-18 ui-fc-blue"><?=$product['product_time']?></span>个月</p>
        <p class="ui-fs-12">产品期限</p>
      </div>
      <div class="col-xs-4">
        <p class="text-nowrap"><span class="ui-fc-blue ui-fs-18"><span class=""><?=$product['product_need_money']?></span></span> 元</p>
        <p class="ui-fs-12">项目金额</p>
      </div>
    </div>
    <div class="project-left-time ui-fs-12 text-center">剩余时间：<span id="hideD"><strong id="RemainD"></strong>天</span> <span id="hideH"><strong id="RemainH"></strong>小时</span><span id="hideM"> <strong id="RemainM"></strong>分钟</span> <span id="hideS"><strong id="RemainS"></strong>秒</span></div></div>
  </div>
  <!--具体信息-->
  <div class="c-detailinfo">
    <dl>
      <dt>产品名称</dt>
      <dd><?=$product['product_name']?></dd>
    </dl>
    <dl>
      <dt>合作机构</dt>
      <dd><?=$product['product_mechanism']?></dd>
    </dl>
    <dl>
      <dt>项目编码</dt>
      <dd><?=$product['product_cade']?></dd>
    </dl>
    <dl>
      <dt>可投金额</dt>
      <dd><font class="ui-fc-blue"><?=$product['product_money']?></font>元</dd>
    </dl>
    
    <dl>
      <dt>到期时间</dt>
      <dd><?=$product['end']?></dd>
    </dl>
  </div>
 
  <!--信息列表-->
  <div class="c-detail">
    <div class="c-tabsmsg">
      <div class="c-tabstit-wrap">
        <div class="c-tabstit"> <span class="c-xmxqtit on" data-index="0">产品详情</span> <span class="c-bzcstit" data-index="1">风控信息</span> <span class="c-hkjhtit" data-index="2">返息计划</span> <span class="c-tzjltit" data-index="3">投资记录</span> </div>
      </div>
      <div class="clear"></div>
      <div class="c-tabs-cnt c-xmxqinfo" style="display: none;">
        <h2>借款信息</h2>
        <div class="c-xmxqcon">
          <dl>
            <dt>资金用途：</dt>
            <dd>借款人经营一家化妆品经销店，经营效益良好，想扩大经营范围，提出借款</dd>
          </dl>
          <dl>
            <dt>所在地：</dt>
            <dd>河北 秦皇岛</dd>
          </dl>
          <dl>
            <dt>还款来源：</dt>
            <dd>我们的项目经营稳定，正常经营月收入和收回的欠款，以及工程回款，都可以偿还借款本息。</dd>
          </dl>
        </div>
        <div class="clear"></div>
        <h2>个人信息</h2>
        <div class="c-xmxqcon">
          <ul>
            <li> <span class="c-xmxqleft">性别：<b>男</b></span> <span class="c-xmxqright">年龄：<b>29岁</b></span> </li>
            <li> <span class="c-xmxqleft">年龄：<b>29岁</b></span> <span class="c-xmxqright">籍贯：<b>北京</b></span> </li>
            <li> <span class="c-xmxqleft">婚否：<b>已婚</b></span> <span class="c-xmxqright">征信：<b>优</b></span> </li>
            <li> <span class="c-xmxqleft">职业：<b>企业主</b></span> <span class="c-xmxqright">学历：<b>本科</b></span> </li>
          </ul>
        </div>
        <div class="clear"></div>
        <h2>借款企业信息</h2>
        <div class="c-xmxqcon">
          <ul>
            <li> <span class="c-xmxqleft">成立时间：<b>福特</b></span> <span class="c-xmxqright">注册资金：<b>
              <label> 30,00.00</label>
              元</b></span> </li>
            <li> <span class="c-xmxqleft">所属行业：<b>批发和零售业</b></span> <span class="c-xmxqright">项目情况： <b><i class="pink">
              <label> 良好</label> </i></b> </span> </li>
          </ul>
        </div>
        <div class="clear"></div>
        <h2>财务状况</h2>
    <ul>
            <li><p style="font-size: 12px;color:#4a4a4a;font-family:'Microsoft YaHei'"> 借款人夫妻双方有房产以及车产，在当地信誉良好，个人征信、收入及经营状况良好，银行流水稳定具有足值的质押物为借款人还款提供充分保障。</p></li>
          </ul>
        <div class="clear"></div>
      </div>
      <div class="c-tabs-cnt c-bzcsinfo" style=" display:none;">
        <div class="c-bzcsinfo">
          <h2>风控信息</h2>
    <ul>
            <li><p style="font-size: 12px;color:#4a4a4a;font-family:'Microsoft YaHei'"> 项目担保： 车辆抵押担保</p></li>
      <li><p style="font-size: 12px;color:#4a4a4a;font-family:'Microsoft YaHei'"> 抵押物：  借款人名下车辆车产</p></li>
      <li><p style="font-size: 12px;color:#4a4a4a;font-family:'Microsoft YaHei'"> 分站风控意见：该项目借款人在秦皇岛有房产，有充足的收入来源。借款人在当地信誉良好，个人征信、收入及经营状况良好，银行流水稳定具有足值的质押物为借款人还款提供充分保障。可以借款。</p></li>
          </ul>
      <!--阳光五维指数-->
      <div class="c-con">
<h2>阳光五维指数</h2>
<div class="wwzs">

  <div class="wwzs_con fl"><p>人员基本情况：10.0<br>担保信息和其他信息：9.0<br>
  征信报告和银行对账单：14.0<br>资金用途及还款来源：23.0<br>资金抵押情况：36.0</p></div>


<div class="wwzs_con fr"><h3>信用等级：<em>A</em></h3><h3>总分：<em>92.0</em></h3></div>
</div>
</div>

<h2>评估结果</h2>
    <ul>
            <li><p style="font-size: 12px;color:#4a4a4a;font-family:'Microsoft YaHei'"> 经阳光易贷五维指数评估，该标的手续相对比较完善。标的风险可控，预期收益稳健，适合稳健型理财客户投资。此标的由发标机构提供全额本息担保。理财客户需根据自身实际需求，谨慎投资。</p></li>
          </ul>
 </div>
      </div>
      <div class="c-tabs-cnt c-hkjhinfo" style="display: none;">
        <table width="100%">
          <tbody id="bodys">
            <tr>
              <th align="left" width="32%" style="padding-left:10px;">计划还款时间<span class="tbline" style="margin-top:15px;"></span></th>
              <th align="center" width="20%">类型<span class="tbline" style="margin-top:15px;"></span></th>
              <th align="right" width="38%" style="padding-right:10px;">还款金额(元)</th>
            </tr>
            
            
          </tbody>
        </table>
        <div class="clear"></div>
      </div>
      <div class="c-tabs-cnt c-tzjlinfo" style="display: none;">
        
          <table style="width: 100%">
            <tbody>
            
              <tr>
                <th align="left" width="25%" style="padding-left:10px;">用户名<span class="tbline" style="margin-top:15px;"></span></th>
                <th width="25%" align="center">金额(元)<span class="tbline" style="margin-top:15px;"></span></th>
                <th align="right" width="40%" style="padding-right:10px;">投资时间</th>
              </tr>
              <?php if (empty($orderlist)) {?>
                <tr>
                  <td align="center" colspan="3">暂无投资人...期待你的投资</td>
                </tr>
              <?php }else{?>
              <?php foreach ($orderlist as $ke => $va) {?>
              <tr>
                <td align="left" width="25%" style="padding-left:10px; color:#4A4A4A;"> <?php if (empty($va['user_name'])) {
                 echo $va['user_tel'];}else{ echo $va['user_name'];}?>
                <span class="tbline"></span> </td>
                <td style="color:#0caffe;"><span class="tbline"></span><i style="float:right; margin-right:10px;"><?=$va['order_money']?></i></td>
                <td align="right" style="padding-right:10px;"><?=date("Y-m-d H:i",$va['order_time'])?></td>
              </tr>
              <?php }}?>
            </tbody>
          </table>
          <div class="clear"></div>
          <div class="addmore"><a href="#" title="查看更多" class="btn-ckgd">查看更多↓</a> </div>
        
      </div>
    </div>
  </div>
</div>
 <script type="text/javascript">
      //初始化轮播组件
      $(document).ready(function(){
          //切换菜单
          $(window).on('scroll', function() {
              var scrollTop = document.body.scrollTop;            //网页被卷去的高
              var offsetTop = $('.c-tabstit-wrap').offset().top;  //元素离文档顶部的高
              if (scrollTop > offsetTop - 55) {
                  $('.c-tabstit').addClass('fixed');
              } else {
                  $('.c-tabstit').removeClass('fixed');
              }
          });
  
          //tab切换
          var tabMap = [
              'c-xmxqinfo',
              'c-bzcsinfo',
              'c-hkjhinfo',
              'c-tzjlinfo'
          ];
          //初始化
          (function(){
              var index = $('.c-tabstit').find('.on').data('index');
              $('.'+tabMap[index]).show();
          })();
          $('.c-tabstit span').on('click', function() {
              $('.c-tabstit span').removeClass('on');
              $(this).addClass('on');
              $('.c-tabs-cnt').hide();
              var index = $(this).data('index');
              $('.'+tabMap[index]).show();
              $(window).scrollTop($('.c-tabstit-wrap').offset().top-55);
              
          })
          
  
      });

  </script>

<!-- 页面底部 -->
<article class="foot_bottom clearfix pt_10  border_t Js_input">
      
      <input type="hidden" name="fpId" id="fpId" value="ADRUNlYyVToFYVRiUDdeawoxVWwCaAJgBT4FNQBjU2Q=">
      <input type="hidden" id="staticImg" value="http://m.niwodai.com/mobile/2015/images/">
    <input type="hidden" id="amountJoinMin" name="amountMin" class="amountMin" value="100">
      <input type="hidden" id="amountJoinMax" name="amountMax" class="amountMax" value="<?=$product['product_money']?>">
      <input type="hidden" id="amountJoinRest" class="amountRest" value="10000">
      <input type="hidden" id="amountIncrease" name="increase" class="increase" value="50">
      <input type="hidden" name="businessType" value="0">
      <input type="hidden" id="token" name="token" value="2bb0b56e-7905-4e97-a6b2-de62d4a06a8a">
         <div class="ft_l fl">
             <div class="money">
                 <input type="button" class="left-a pos1 minus" id="jian" <img src='__static__images/jian.png' width='20' height='20'>
                 <div class="input_c">
                     <input type="text" name="amount" id="investmentAmount" value="100" class="num" maxlength="9" placeholder="请输入50的整数倍">
                     <span class="fr">元</span>
                 </div>
                 <input type="button" class="left-a pos2 plus" id="plus" value="">
             </div>
         </div>
         <div class="ft_r fr">
         <form action="{:url('product/order')}" method="post">
         <input type="hidden" value="<?=$product['product_id']?>" name="pid" id="pid">
         <input type="hidden" value="0" name="true_money" id="moneys">
        <input id="submit" type="submit" value="立即购买" class="btn btn_orange w_10">
         </form>
         </div>       
        
  </article>
  <script type="text/javascript" src="__static__script/detail.js"></script>

</body>
</html>
<script language="JavaScript">
    var runtimes = 0;
    function GetRTime(){
        var nMS = <?php echo $overtime; ?>*1000-runtimes*1000;
 
        if (nMS>=0){
            var nD=Math.floor(nMS/(1000*60*60*24))%24;
            var nH=Math.floor(nMS/(1000*60*60))%24;
            var nM=Math.floor(nMS/(1000*60)) % 60;
            var nS=Math.floor(nMS/1000) % 60;
           document.getElementById("RemainD").innerHTML=nD;
            document.getElementById("RemainH").innerHTML=nH;
            document.getElementById("RemainM").innerHTML=nM;
            document.getElementById("RemainS").innerHTML=nS;
            runtimes++;
            if(nD==0){
                //天数0 隐藏天数
                document.getElementById("hideD").style.display="none";
                if(nH==0){
                    //数0 隐藏天数
                    document.getElementById("hideH").style.display="none";
                    if(nM==0){
                        document.getElementById("hideM").style.display="none";
                        if(nS==0){
                            document.getElementById("time").html("该产品已经完成");
                        }
                    }
                }
            }
            setTimeout("GetRTime()",1000);
        }
    }
    window.onload = function() {
        GetRTime();
    }
    $(function(){
      $("#investmentAmount").blur(function(){
          var pid=$("#pid").val();
          var money=$("#investmentAmount").val();
          var max=$('#amountJoinMax').val();//最大金额
          if (money>max) {
            $("#investmentAmount").val(max)
            money=$("#investmentAmount").val();
            $("#moneys").val(max)
          }else{
              $("#moneys").val(money)
          }
          $.ajax({
              url:"{:url('product/getmoney')}",
              type:"post",
              data:{
                pid:pid,
                money:money
              },
              dataType:"json",
              success:function(e){  
                console.log(e)              
                 var str='<tr><th align="left" width="32%" style="padding-left:10px;">计划还款时间<span class="tbline" style="margin-top:15px;"></span></th><th align="center" width="20%">类型<span class="tbline" style="margin-top:15px;"></span></th><th align="right" width="38%" style="padding-right:10px;">还款金额(元)</th></tr>';
                 $.each(e,function(i, n){
                      str+=' <tr><td align="left" width="32%" style="padding-left:10px;">'+n.time+'<span class="tbline"></span> </td>';
                      str+='<td width="20%" align="center">'+n.types+'<span class="tbline"></span> </td>';
                      str+='<td align="right" width="38%" style="padding-right:10px; color:#0caffe;">'+n.money+'<em class="whuan">未还</em> </td></tr>';
                 })
                 $("#bodys").html(str);
              }
          })
      })
    })
</script>

              