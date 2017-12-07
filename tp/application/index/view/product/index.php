<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>理财</title>
<link rel="stylesheet" type="text/css" href="__static__css/common.css" />
<script type="text/javascript" src="__static__script/jquery.js"></script>
<script type="text/javascript" src="__static__script/column.js"></script>
</head>
<body>
<!--浮动-->
<div class="dropMask"></div>
<div class="dragBtn"></div>

<script src="__static__script/index.js"></script>
<script src="__static__script/jquery-ui.min.js"></script>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="#" class="z-01"></a> <span>产品列表</span> <a href="#" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="main">
  <div class="cre-tabs">
    <div class="tab-border"></div>
    <a id="one1" onClick="setTab('one',1,3)" class="hover">产品期限</a> <span class="split-line ">|</span><a id="one2" onClick="setTab('one',2,3)">产品状态</a> <span class="split-line ">|</span><a id="one3" onClick="setTab('one',3,3)">分站区域</a> </div>
  <div class="invest_menuinfo" id="con_one_1">
    <div class="clear"></div>
    <ul class="term" type="month">
      <li month="1">3个月</li>
      <li month="2">6个月</li>
      <li month="3">一年</li>
      <li month="4">一年以上</li>
    </ul>
  </div>
  <div class="invest_menuinfo" id="con_one_2" style="display:none">
    <ul class="term" type="status">
      <li status="1">即将上线</li>
      <li status="2">正在募集</li>
      <li status="3">正在回款</li>
      <li status="4">回款完毕</li>
    </ul>
  </div>
  <div class="invest_menuinfo" id="con_one_3" style="display:none">
    <ul class="term" type="city">
      <li city="1">北京</li>
      <li city="2">上海</li>
      <li city="3">深圳</li>
      <li city="4">广州</li>
    </ul>
  </div>
  <div class="index-list-wrap">
    <!--车-->
  <?php foreach ($product['info'] as $k => $v) {?>
    <div class="index-pad"> <a class="index-list index-che" href="{:url('product/desc')}?pid=<?=$v['product_id']?>">
      <div class="list-tit clear"> <span class="fl tit-name"><i></i><strong><?=$v['product_cade']?></strong></span> <span class="fr tit-site"><i></i> <strong><?php if ($v['product_city']==1) {echo "北京";}else if ($v['product_city']==2) {echo "上海";}elseif ($v['product_city']==3) {echo "广州";}else if ($v['product_city']==4) {echo "深圳";}?></strong> </span> </div>
      <div class="list-main">
        <div class="main-l"> <span class="per"><?=$v['product_rate']*100?><i>%</i></span> <span class="add">A</span> </div>
        <div class="main-m main-m-1"> <span><?=$v['product_need_money']?>元</span> </div>
        <div class="main-m main-m-2"> <span class="day"><?=$v['product_time']?>个月</span> </div>
        <div class="main-r"> <span class="circle-blue circle-c57"></span> <span class="val-per"><?php if($v['product_need_money']==0){ echo 0;}else{ $num=$v['product_money']/$v['product_need_money'];$num1=sprintf('%.2f',$num);echo $num1*100;}?><i>%</i></span> </div>
      </div>
      </a> </div>
    <?php }?>
    <!--end-->
  </div>
  <div class="UpPage"><ul> <li><a href="javascript:void(0)" id="pages" class="1">上一页</a></li><li><span><?=$product['page']['first']?>/<?=$product['page_num']?></span></li><li><a href="javascript:void(0)" id="pages" class="2">下一页</a></li></ul><div class="clear">
  </div><ul class="pagination">
  <li class="disabled"><span>«</span></li>
        <li class="active"><span>1</span></li>
        <li><a href="{:url('product/ajax_search_questions')}?page=2">2</a></li>
        <li><a href="{:url('product/ajax_search_questions')}?page=2">»</a></li>
</ul></div>
</div>
<!-- 页面底部 -->
<nav class="footer border_t" id="footer"> 
  <a href="{:url('index/index')}" class="" id="jx"><span></span>首页</a> 
  <a href="javascript:void(0)" id="lc" class="nav_on"><span></span>理财</a> 
  <a href="{:url('index/index')}" id="jk" class=""><span></span>借款</a> 
  <a href="{:url('user/index')}" id="cf" class=""><span></span>我的账户</a> </nav></body>
</html>
<style type="text/css">
  .invest_menuinfo ul li{
    cursor: pointer;
  }
</style>
<script type="text/javascript">
  $(document).on("click","#pages",function(){
      var page=$(this).prop('class');
      var limit=3;
      $.ajax({
        url:"{:url('product/getpageinfo')}",
        type:"post",
        dataType:"json",
        data:{
          limit:limit,
          page:page,
        },
        success:function(msg){
            if(msg.info==0){
              alert("没有记录，敬请期待!");
            }else{
              //console.log(msg)
              pagelist(msg,page);
            }
        }
      })
  })
  function pagelist(msg,$page=1){
    var str="";
    $.each(msg.info,function(i, n){
       str+="<div class='index-pad'><a class='index-list index-che' href={:url(
                                    'product/desc')}?pid="+n.product_id+">";
            str+='<div class="list-tit clear"> <span class="fl tit-name"><i></i><strong>'+n.product_cade+'</strong></span> <span class="fr tit-site"><i></i>';
            if (n.product_city==1) {
              str+='<strong>北京</strong></span> </div>'
            }else if (n.product_city==2) {
              str+='<strong>上海</strong></span> </div>'
            }else if(n.product_city==3){
              str+='<strong>广州</strong></span> </div>'
            }else if(n.product_city==4){
              str+='<strong>深圳</strong></span> </div>'
            };
            
            str+='<div class="list-main"><div class="main-l"> <span class="per">'+n.product_rate*100+'<i>%</i></span> <span class="add">A</span> </div>';
            str+='<div class="main-m main-m-1"> <span>'+n.product_need_money+'元</span> </div>'
            str+='<div class="main-m main-m-2"> <span class="day">'+n.product_time+'个月</span> </div>'
            if (n.product_need_money==0) {
              str+='<div class="main-r"><span class="circle-blue circle-c57"></span> <span class="val-per">0<i>%</i></span> </div></div></a></div>'
            }else{
              str+='<div class="main-r"><span class="circle-blue circle-c57"></span> <span class="val-per">'+(n.product_money/n.product_need_money).toFixed(2)*100+'<i>%</i></span> </div></div></a></div>';
            }
    })
    $(".index-list-wrap").html(str);
    var strs="";
    strs+="<ul>";
    strs+="<li><a href='javascript:void(0);' id='pages' class='"+msg.page.up+"'>上一页</a></li>";
    strs+="<li><span>"+$page+"/"+msg.page_num+"<span></li>";
    strs+="<li><a href='javascript:void' id='pages' class='"+msg.page.next+"'>下一页</a></li>";
    strs+="</ul>";
    $(".UpPage").html(strs);
  }
</script>
<script type="text/javascript">
  function ajax_page(page) {        
        $.ajax({
            url:"{:url('product/ajax_search_questions')}",
            type:"POST",
            data:{page:page},            
            success: function(data,status){
                var add_html = '';
                var list = data.list.data;
                var html_page = data.page;
                for (var i=0;i<list.length;i++){
                    add_html = add_html+"<div><input type='checkbox' name='questions[]' value='"+list[i]['id']+"' />"+list[i]['title']+"</div>"
                }
                $("#search_questions_rel").html(add_html);
                $("#page_div").html(html_page);
            }
        });
    }
  $(function(){
    $(".invest_menuinfo ul li").click(function(){
      var type=$(this).parent().attr("type");
      
      switch(type){
        case "month":
            var va=$(this).attr("month");
            getproduct(type,va)
        break;
        case "status":
            var va=$(this).attr("status");
            getproduct(type,va);
        break;
        case "city":
            var va=$(this).attr("city");
            getproduct(type,va);
            break;
      }
    })
  })
  function getproduct(type,va){
    $.ajax({
      type:"post",
      url:"{:url('product/getinfo')}",
      data:{
        type:type,
        va:va,
      },
      dataType:"json",
      success:function(e){
        if (e.error==200) {
          var str="";
           $.each(e.msg, function(i, n){ 
            str+="<div class='index-pad'><a class='index-list index-che' href={:url(
                                    'product/desc')}?pid="+n.product_id+">";
            str+='<div class="list-tit clear"> <span class="fl tit-name"><i></i><strong>'+n.product_cade+'</strong></span> <span class="fr tit-site"><i></i>';
            if (n.product_city==1) {
              str+='<strong>北京</strong></span> </div>'
            }else if (n.product_city==2) {
              str+='<strong>上海</strong></span> </div>'
            }else if(n.product_city==3){
              str+='<strong>广州</strong></span> </div>'
            }else if(n.product_city==4){
              str+='<strong>深圳</strong></span> </div>'
            };
            
            str+='<div class="list-main"><div class="main-l"> <span class="per">'+n.product_rate*100+'<i>%</i></span> <span class="add">A</span> </div>';
            str+='<div class="main-m main-m-1"> <span>'+n.product_need_money+'元</span> </div>'
            str+='<div class="main-m main-m-2"> <span class="day">'+n.product_time+'个月</span> </div>'
            if (n.product_need_money==0) {
              str+='<div class="main-r"><span class="circle-blue circle-c57"></span> <span class="val-per">0<i>%</i></span> </div></div></a></div>'
            }else{
              str+='<div class="main-r"><span class="circle-blue circle-c57"></span> <span class="val-per">'+(n.product_money/n.product_need_money).toFixed(2)*100+'<i>%</i></span> </div></div></a></div>';
            }
            
          });
           $(".index-list-wrap").html(str)
        }else{
          $(".index-list-wrap").html(e.msg)
        }
      }
    })
  }
</script>





      
      
        
        
        