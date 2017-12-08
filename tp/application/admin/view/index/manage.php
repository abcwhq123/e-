
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <link href="__admin__css/web/bootstrap.min.css" rel="stylesheet">
    <link href="__admin__css/web/laydate.css" rel="stylesheet">
    <link href="__admin__css/web/default/laydate.css" rel="stylesheet">
    <link href="__admin__font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="__admin__css/web/style.css?ver=20170401" rel="stylesheet"></head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="profile-element text-center">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                        <p class="text-muted">08b</p>
                    </div>
                    <div class="logo-element">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                    </div>
                </li>
                <li class="dashboard">
                    <a href="{:url('Index/index')}"><i class="fa fa-dashboard fa-lg"></i>
                        <span class="nav-label">仪表盘</span></a>
                </li>
                <li class="account">
                    <a href="{:url('index/manage')}"><i class="fa fa-user fa-lg"></i> <span class="nav-label">产品管理</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg" style="background-color: #ffffff;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0);"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
						<span class="m-r-sm text-muted welcome-message">
                            欢迎使用08b产品管理后台
                        </span>
                    </li>
                    <li class="hidden">
                        <a class="count-info" href="javascript:void(0);">
                            <i class="fa fa-bell"></i>
                            <span class="label label-primary">8</span>
                        </a>
                    </li>


                    <li class="dropdown user_info">
                        <a  class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            <img alt="image" class="img-circle" src="/images/web/avatar.png" />
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    姓名：07c郭大爷                                    <a href="/web/user/edit" class="pull-right">编辑</a>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    手机号码：11012345679                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="link-block text-center">
                                    <a class="pull-left" href="/web/user/reset-pwd">
                                        <i class="fa fa-lock"></i> 修改密码
                                    </a>
                                    <a class="pull-right" href="/web/user/logout">
                                        <i class="fa fa-sign-out"></i> 退出
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>

            </nav>
        </div>

        <div class="row  border-bottom">
            <div class="col-lg-12">
                <div class="tab_title">
                    <ul class="nav nav-pills">
                        <li  class="current"  >
                            <a href="/web/book/index">产品列表</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-inline wrap_search">
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-w-m btn-outline btn-primary pull-right" href="{:url('Index/product')}">
                                <i class="fa fa-plus"></i>产品录入
                            </a>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered m-t">
                    <thead>
                    <tr align="center">
                        <th>产品ID</th>
                        <th>产品名称</th>
                        <th>产品类型</th>
                        <th>年化率</th>
                        <th>锁定期</th>
                        <th>产品编码</th>
                        <th>合作机构</th>
                        <th>产品金额</th>
                        <th>审核状态</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th>产品来源</th>
                        <th>操作</th>
                    </tr>
                    </thead>

                    {volist name="arr" id="v"}
                    <tr align="center">
                        <td id="{$v.product_id}">{$v.product_id}</td>
                        <td>{$v.product_name}</td>
                        <td>
                            <?php
                            switch($v['product_type']){
                                   case "1";echo"三个月" ;
                                    break;
                                   case "2";echo"六个月" ;
                                    break;
                                   case "3";echo"一年" ;
                                    break;
                                   case "4";echo"一年以上" ;
                                    break;
                            }
                            ?>
                        </td>
                        <td>{$v.product_rate}</td>
                        <td>{$v.product_lock}</td>
                        <td>{$v.product_cade}</td>
                        <td>{$v.product_mechanism }</td>
                        <td>{$v.product_money}</td>
                        <td>
                            待审核
                        </td>
                        <td>{$v.start_time|date="Y-m-d H:i:s",###} </td>
                        <td>{$v.end_time|date="Y-m-d H:i:s",###}</td>
                        <td>
                            <?php
                            switch($v['product_city']){
                                case "1";echo "北京";
                                    break;
                                case "2";echo "上海";
                                    break;
                                case "3";echo "广州";
                                    break;
                                case "4";echo "深圳";
                                    break;
                            }
                            ?>
                        </td>
                        <td>
<!--                            <a href="delete?id={$v.product_id}">删除</a>-->
                            <select class="chose">
                                <option value="0">请选择状态</option>
                                <option value="1">通过</option>
                                <option value="2">未通过</option>
                            </select>
                        </td>
                    </tr>
                    {/volist}
                    <tr>

                    </tr>
                </table>
                <div class="row">
                    <div class="col-lg-12">
                        <span class="pagination_count" style="line-height: 40px;">共4条记录 | 每页50条</span>
                        <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">
                            <li class="active"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
<script src="http://www.eight_admin.com/plugins/jquery-2.1.1.js"></script>
<script type="text/javascript">
   $(function(){
       $(".chose").change(function(){
           var status=$(this).val();
           var id=$(this).parent().parent().find("td").html();
           $.ajax({
               type:"post",
               url:"{:url('Index/status')}",
               data:{status:status,id:id},
               success:function(msg){
                  if(msg==1){
                      window.location.href=window.location.href;
                  }else{
                      alert("审核失败");
                  }
               }
           })
       })
   })
</script>
