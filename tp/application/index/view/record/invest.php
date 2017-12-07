<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no,adress=no"/>
<title>首页</title>
<link rel="stylesheet" type="text/css" href="__static__/css/common.css" />
<script type="text/javascript" src="__static__/script/jquery.js"></script>
</head>
<body>
<!-- 页面头部 -->
<section>
  <div class="navigation-bar"> <a href="{:url('user/index')}" class="z-01"></a> <span>投资记录</span> <a href="{:url('index/index')}" class="z-02"></a> </div>
</section>
<!-- 中间内容 -->
<div class="wrapper">
  <div class="personalform">
     <div class="tzjl-tabs">
        <div class="tab-border"></div>
        <a id="form:j_idt39" href="javascript:;" title="投标中" class="active">投资中 </a> 
        <span class="split-line">|</span><a id="form:j_idt49" href="{:url('Record/repayments')}" title="回款中">回款中 </a> 
        <span class="split-line">|</span><a id="form:j_idt56" href="{:url('Record/out')}" title="已结束">已完成 </a> 
     </div>
      <div class="tzjl-con1" style="min-height:150px;padding-top:100px;text-align:center;background-color:#fff; display:none">您最近还没有投资记录！ </div>
	  <div class="c-tabs-cnt c-tzjlinfo" style=" padding-bottom:60px;">
          <table style="width: 100%">
            <tbody>
              <tr>
                <th align="left" width="40%" style="padding-left:10px;">投资时间<span class="tbline" style="margin-top:15px;"></span></th>
                <th width="25%" align="center">金额(元)<span class="tbline" style="margin-top:15px;"></span></th>
                <th align="right" width="25%" style="padding-right:10px;">操作</th>
              </tr>
              <tbody id="page-data">
               {volist name='list' id='v'}
                    <tr>
                      <td align="left" width="40%" style="padding-left:10px; color:#4A4A4A;">{$v.pay_time}<span class="tbline"></span> </td>
                      <td style="color:#0caffe;" align="center"><span class="tbline"></span><i>{$v.pay_money}</i></td>
                      <td align="right" style="padding-right:10px;"><a href="">查看详细</a><a href="#">查看协议</a> </td>
                    </tr>
               {/volist}
              </tbody>
            </tbody>
          </table>
          <div class="clear"></div>
          <div class="addmore"><a href="javascript:;" title="查看更多" class="btn-ckgd look-more">查看更多↓</a> </div>

          <div class="UpPage"></div>
      </div>
  </div>
  <div class="clear"></div>
</div>
<!-- 页面底部 -->
{include file="common/foot"}

<script type="text/javascript">
     $(function(){
          //查看更多
          $(document).on('click', '.look-more', function(){
               // alert(1)
               var page = 1;
               var limit = 11;
               $.ajax({
                    url:"{:url('record/more')}",
                    data:{limit: limit, page: page},
                    type:'post',
                    dataType:'json',
                    success:function(msg){
                         // alert(msg)
                         pageList(msg);
                    }
               })
          });
          //分页
          $(document).on('click', '#pages', function(){
               var page = $(this).prop('class');
               var limit = 11;
               $.ajax({
                    url:"{:url('record/more')}",
                    data:{limit: limit, page: page},
                    type:'post',
                    dataType:'json',
                    success:function(msg){
                         pageList(msg, page);
                    }
               })
          });

          function pageList(msg, $page=1){
               $('#page-data').empty();
               $.each(msg.info,function(i,val){
                    $('#page-data').append(" <tr>\
                      <td align='left' width='40%' style='padding-left:10px; color:#4A4A4A;'>"+val.pay_time+"<span class='tbline'></span> </td>\
                      <td style='color:#0caffe;' align='center'><span class='tbline'></span><i>"+val.pay_money+"</i></td>\
                      <td align='right' style='padding-right:10px;'><a href=''>查看详细</a><a href='#'>查看协议</a> </td>\
                    </tr>");
               });
               var str ="<ul>\
                         <li>\
                              <a href='javascript:;' id='pages' class='"+msg.page.up+"'>上一页</a>\
                         </li>\
                         <li><span>"+$page+"/"+msg.page_num+"</span></li>\
                         <li><a href='javascript:;' id='pages' class='"+msg.page.next+"'>下一页</a></li>\
                    </ul>";
               $('.UpPage').html(str);
               $('.addmore').empty();
          }
     })
</script>