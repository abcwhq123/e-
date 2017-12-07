<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <link href="__admin__css/web/bootstrap.min.css" rel="stylesheet">
    <link href="__admin__font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="__admin__css/web/laydate.css" rel="stylesheet">
    <link href="__admin__css/web/default/laydate.css" rel="stylesheet">
    <link href="__admin__css/web/style.css?ver=20170401" rel="stylesheet">
    <link href="__admin__plugins/tagsinput/jquery.tagsinput.min.css?ver=20170401" rel="stylesheet">
    <link href="__admin__plugins/select2/select2.min.css?ver=20170401" rel="stylesheet"></head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="profile-element text-center">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                        <p class="text-muted">07c</p>
                    </div>
                    <div class="logo-element">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                    </div>
                </li>
                <li class="dashboard">
                    <a href="{:url('index/index')}"><i class="fa fa-dashboard fa-lg"></i>
                        <span class="nav-label">仪表盘</span></a>
                </li>
<!--                <li class="account">-->
<!--                    <a href="{:url('index/product')}"> <img src="__admin__images/edit.png" width="20" height="20"><i ></i> <span class="nav-label">产品录入</span></a>-->
<!--                </li>-->
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
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
						<span class="m-r-sm text-muted welcome-message">
                            欢迎使用08be贷管理后台
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
                <h2 class="text-center">产品录入</h2>
                <form action="{:url('Index/insert')}" method="post">
                <div class="form-horizontal m-t">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">产品名称:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="产品名称不能小于三且不能大于十" name="product_name" value="" style="width: 70%" id="c_name">
                            <span id="red"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">产品类型:</label>
                        <div class="col-lg-10">
                            <select name="product_type" class="form-control" style="width: 70%" id="c_type">
                                <option value="">请选择产品类型</option>
                                <option value="1"  >三个月</option>
                                <option value="2"  >六个月</option>
                                <option value="3"  >一年</option>
                                <option value="4"  >一年以上</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">年化率:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入正确的年化率:例如 0.08,0.12..." name="product_rate" value="" style="width: 70%" id="c_rate">
                            <span id="year"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">合作机构:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入合作机构" name="product_mechanism" value="" style="width: 70%" id="c_mechanism" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')">
                            <span id="he"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">产品金额:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入产品金额" name="product_money" value="" style="width: 70%" id="c_money" onkeyup="value=value.replace(/[^0-9]/g,'')">
                            <span id="money"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">开始时间:</label>
                        <div class="col-lg-10">
                            <input class="laydate-icon shijian" id="k" type="text" name="start_time" value="" placeholder="开始时间" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">结束时间:</label>
                        <div class="col-lg-10">
                            <input class="laydate-icon shijian" id="j" type="text" name="end_time" value="" placeholder="结束时间" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">锁定期:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="在该期间内用户不得取出他的投资金额" name="product_lock" value="" style="width: 70%;" id="c_lock">
                            <span id="locking"></span>
                            <!--                            <span style="float: right;margin-right: 26%;margin-top: -3%;">个月</span>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">产品来源:</label>
                        <div class="col-lg-10">
                            <select name="product_city" class="form-control" style="width: 70%" id="c_control">
                                <option value="">请选择分类</option>
                                <option value="1"  >北京</option>
                                <option value="2"  >上海</option>
                                <option value="3"  >深圳</option>
                                <option value="4"  >广州</option>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
                            <input type="submit" value="保存" class="btn btn-w-m btn-outline btn-primary save">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="http://www.eight_admin.com/plugins/jquery-2.1.1.js"></script>
<script type="text/javascript" src="__admin__js/laydate.js"></script>
<script type="text/javascript">
    //产品金额
    $("#c_money").on("blur",function(){
        var id=$(this).val();
       if(id=="" || id<10000 || id>5000000){
           $("#money").html("<font color='red'>请输入正确的合作机构</font>");
       }else{
           $("#money").html("");
       }
    });
    //合作机构
    $("#c_mechanism").on("blur",function(){
        var id=$(this).val();
        if(id.length>10 || id.length==""){
            $("#he").html("<font color='red'>请输入正确的产品金额</font>");
        }else{
            $("#he").html("");
        }
    });
    //锁定期
    $("#c_lock").on("blur",function(){
        //接受开始时间和结束时间
        var k=$("#k").val();
        var  j=$("#j").val();
        //将开始结束时间转化一下
        var timestamp2 = Date.parse(new Date(k));
        var timestamp3 = Date.parse(new Date(j));
        //在将转换的时间除以1000就变成了时间戳
        timestamp2 = timestamp2 / 1000;
        timestamp3 = timestamp3 / 1000;
        //结束时间-开始时间=一个变量；
       var timestamp4=timestamp3-timestamp2;
        //获取锁定期的id然后*月*小时*分钟*秒变成时间戳
       var  str=$(this).val()*30*24*60*60;
        //判断锁定期如果大于变量的话就错误否则正确
        if(str>timestamp4){
            $("#locking").html("<font color='red'>请输入正确的锁定期</font>");
        }else{
            //把span标签里边的值变成空的
            $("#locking").html("");
        }
    });
    //验证产品名称
$("#c_name").on("blur",function(){
   var id=$(this).val();
  if(id=="" || id.length>10 ||id.length<3){
//        alert("请输入的正确的产品名称");
      $("#red").html("<font color='red'>请输入正确的产品名称</font>");
   }else{
      //把span标签里边的值变成空的
      $("#red").html("");
  }
    });

    //年化率
    $("#c_rate").on("blur",function(){
        var id=$(this).val()*100;
        if(id>1&&id<=100){
            $("#year").html("");
        }else{
            $("#year").html("<font color='red'>请输入正确的年化率</font>");
        }
    });
    //时间插件
    $(document).on("click",".shijian",function(){
        var id=$(this).attr('id');
        var _before_day = '';
        laydate.skin('molv');
        id = {
            elem: '#'+id, //对应的id
            format: 'YYYY-MM-DD hh:mm:ss',
            min: laydate.now(), //最小日期
            max: '2088-10-10 00:00:00', //最大日期
            start: laydate.now(),//开始日期
            istime: true,
            festival: true, //显示节日
            istoday: false,
            choose: function(datas)
            {
                _before_day = datas;
            }
        };
        laydate(id);
    });
</script>
