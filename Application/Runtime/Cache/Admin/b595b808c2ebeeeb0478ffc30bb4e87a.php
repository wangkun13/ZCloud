<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"> 
<meta name="apple-mobile-web-app-capable" content="yes"> 
<meta name="apple-mobile-web-status-bar-style" content="block"> 
<meta name="fromat-detecition" content="telephone=no">
<meta name="keywords" content="">
<meta name="description" content="">
<title>云财税平台管理中心</title>
<link rel="stylesheet" href="/ZCloud/Public/css/bootstrap.min.css">
<link rel="stylesheet" href="/ZCloud/Application/Admin/View//Public/static/css/sb-admin.css">
<link rel="stylesheet" href="/ZCloud/Application/Admin/View//Public/static/font-awesome/css/font-awesome.min.css">
<link rel="icon" href="/bsce/Public/img/favicon.ico">
<script src="/ZCloud/Public/js/jquery.min.js"></script>
<!-- <script src="/ZCloud/Application/Admin/View//Public/static/js/basePermit.js"></script> -->
<link rel="stylesheet" type="text/css" href="/ZCloud/Application/Admin/View//Public/static/css/base.css" /><link rel="stylesheet" type="text/css" href="/ZCloud/Application/Admin/View//Public/static/css/allsce.css" /><link rel="stylesheet" type="text/css" href="/ZCloud/Public/css/bootstrap-select.min.css" />
</head>
<body>
<!-- NOTICE BEGIN -->
  <div id="noticeCnr">
    <div v-html="consoleMsg"></div>
    <div v-show="confirm.show" class="confirm-cnr" style="display:none;">
      <div class="confirm-cnt">
        <span v-html="confirm.msg"></span>
        <div class="confirm-btn-cnr">
          <div class="confirm-btn" @click="confirm.confirm()">确定</div>
          <div class="confirm-btn" @click="confirm.cancel()">取消</div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <div v-show="alert.show" class="alert-cnr" :class="alert.type" style="display:none;">
      <span v-html="alert.msg"></span>
    </div>
  </div>
  <!-- NOTICE END -->
  <div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top wk_style" role="navigation" >
      <div >
        <div class="col-md-7">
          云财税平台管理中心
        </div>
        <div class="col-md-5 ">
          <div class="  pull-right  dropdown-toggle wk_border primary" id="dropdownMenu1" data-toggle="dropdown">
          技术支持<a href="#">dfsdfs</a>
          </div>

          <ul class="dropdown-menu pull-right" role="menu"
              aria-labelledby="dropdownMenu1">
            <li role="presentation">
              <a role="menuitem" tabindex="-1" href="#">Java</a>
            </li>
            <li role="presentation">
              <a role="menuitem" tabindex="-1" href="#">数据挖掘</a>
            </li>
            <li role="presentation">
              <a role="menuitem" tabindex="-1" href="#">数据通信/网络</a>
            </li>
            <li role="presentation" class="divider"></li>
            <li role="presentation">
              <a role="menuitem" tabindex="-1" href="#">分离的链接</a>
            </li>
          </ul>

          <div class=" wk_border pull-right">
            服务(0)
          </div>
          <div class=" wk_border pull-right" >
            消息(0)
          </div>
          <div class=" wk_border pull-right">
            <img class="verify wk_right" src="/ZCloud/Application/Admin/View//Public/static/css/img/icon_head.png" />
            你好,<?php echo session('user_name');?>
          </div>
        </div>
        <div class="clearfix"></div>
        <ul class="nav navbar-nav side-nav">
  <?php if(is_array($auth["menus"])): $i = 0; $__LIST__ = $auth["menus"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="dropdown">
      <a href="<?php echo ($item["href"]); ?>"><i class="<?php echo ($item["icon"]); ?>"></i> <?php echo ($item["name"]); ?></a>
    <?php if(is_array($item["childs"])): $i = 0; $__LIST__ = $item["childs"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><ul class="dropdown-menu">
        <li class="nav-lvl-3" id="<?php echo ($child["pageid"]); ?>">
          <a href="<?php echo ($child["href"]); ?>"> <i class="<?php echo ($child["icon"]); ?>"></i><?php echo ($child["name"]); ?></a>
        </li>
      </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

        <!--<div class="navbar-header">-->
          <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">-->
            <!--<span class="sr-only"></span>-->
            <!--<span class="icon-bar"></span>-->
            <!--<span class="icon-bar"></span>-->
            <!--<span class="icon-bar"></span>-->
          <!--</button>-->
          <!--<a class="navbar-brand" href="<?php echo U('index/index');?>">-->
            <!--<div class="title-sce"><?php echo ($scename); ?></div>-->
            <!--<div class="title-laia">云财税平台ss管理中心</div>-->
          <!--</a>-->
        <!--</div>-->
        <!--<div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color:#2573e8;color:white">-->
          <!--<ul class="nav navbar-nav side-nav">
  <?php if(is_array($auth["menus"])): $i = 0; $__LIST__ = $auth["menus"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="dropdown">
      <a href="<?php echo ($item["href"]); ?>"><i class="<?php echo ($item["icon"]); ?>"></i> <?php echo ($item["name"]); ?></a>
    <?php if(is_array($item["childs"])): $i = 0; $__LIST__ = $item["childs"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><ul class="dropdown-menu">
        <li class="nav-lvl-3" id="<?php echo ($child["pageid"]); ?>">
          <a href="<?php echo ($child["href"]); ?>"> <i class="<?php echo ($child["icon"]); ?>"></i><?php echo ($child["name"]); ?></a>
        </li>
      </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
-->
          <!--<div class="col-md-4">-->
            <!--景区标签：-->
          <!--</div>-->
          <!--<div class="col-md-4">-->
            <!--景区标签：-->
          <!--</div>-->
          <!--<div class="col-md-4">-->
            <!--景区标签：-->
          <!--</div>-->
          <!--&lt;!&ndash;<ul class="nav navbar-nav navbar-right navbar-user">&ndash;&gt;-->
            <!--&lt;!&ndash;<li class="dropdown user-dropdown">&ndash;&gt;-->
              <!--&lt;!&ndash;<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 你好,<?php echo session('user_name');?> <b class="caret"></b></a>&ndash;&gt;-->
              <!--&lt;!&ndash;<ul class="dropdown-menu">&ndash;&gt;-->
               <!--&lt;!&ndash;&lt;!&ndash; <li><a href="#"><i class="fa fa-gear"></i> 设置</a></li>&ndash;&gt;&ndash;&gt;-->
                <!--&lt;!&ndash;<li><a href="<?php echo U('login/logout');?>"><i class="fa fa-power-off"></i> 退出</a></li>&ndash;&gt;-->
              <!--&lt;!&ndash;</ul>&ndash;&gt;-->
            <!--&lt;!&ndash;</li>&ndash;&gt;-->
          <!--&lt;!&ndash;</ul>&ndash;&gt;-->
        <!--</div>-->
      </div>
    </nav>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>云财税平台管理中心-工作总览</title>
    <!--<link rel="shortcut icon" href="../common/img/favicon.ico" type="image/x-icon" />-->
    <!--<link rel="stylesheet" type="text/css" href="../common/css/global.css" media="all"/>-->
    <!--<link rel="stylesheet" type="text/css" href="css/c_common.css" media="all"/>-->
    <!--<link rel="stylesheet" type="text/css" href="css/console.css" media="all"/>-->
</head>

<body>
<div class="g-doc">
    <div class="g-hd">
        <div class="sec-logo">
            <h3 class="font16">云财税平台管理中心</h3>
        </div>
        <div class="sec-left">

        </div>
        <div class="sec-right">
            <a class="user-info">
                <i class="icon-head"></i>
                <label>致云科技演示账号（zhicloud）</label>
                <i class="icon-arrow icon-down-arrow"></i>
            </a>
            <div class="u-drop-box">
                <div class="recharge-info">
                    <div class="account-fee">
                        <h3>账户余额</h3>
                        <span>24324.4</span>
                    </div>
                    <a class="im-recharge" href="javascript:;">立即充值</a>
                </div>
                <ul>
                    <li><a href="javascript:;"><i class="icon-usercenter"></i>账户管理</a></li>
                    <li><a href="javascript:;"><i class="icon-feemanage"></i>费用管理</a></li>
                    <li><a href="javascript:;"><i class="icon-invoicemge"></i>发票管理</a></li>
                    <li><a href="javascript:;"><i class="icon-exit"></i>退出登录</a></li>
                </ul>
            </div>

            <a class="message-cont" href="javascript:;">消息(0)</a>
            <a class="record-cont" href="javascript:;">服务工单(0)</a>
            <a class="tecsupport-info"><label>技术支持</label><i class="icon-arrow icon-down-arrow"></i></a>
            <div class="ts-drop-box">
                <ul>
                    <li><a href="javascript:;"><i class="icon-faq"></i>FAQ问题</a></li>
                    <li><a href="javascript:;"><i class="icon-onlineser"></i>在线客服</a></li>
                    <li><a href="javascript:;"><i class="icon-contactus"></i>联系我们</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="g-sd">
        <div class="g-sdc">
            <a class="g-sdc-item current" href="c_overview.html"><i class="icon-overview nav-icon"></i><label class="s-nav">工作总览</label></a>
            <a class="g-sdc-item" href="c_tag.html"><i class="icon-tag nav-icon"></i><label class="s-nav">客户订单</label></a>
            <a class="g-sdc-item" href="c_cuddesktop_user.html"><i class="icon-clouddesktop nav-icon"></i><label class="s-nav">客户列表</label><i class="icon-plus mp-icon"></i></a>
            <a class="g-sdc-item" href="c_operationlog.html"><i class="icon-operationlog nav-icon"></i><label class="s-nav">盒子设备管理</label></a>
            <a class="g-sdc-item" href="c_cloudserver.html"><i class="icon-calculation nav-icon"></i><label class="s-nav">财税服务管理</label><i class="icon-plus mp-icon"></i></a>
            <a class="g-sdc-item" href="c_storage_clouddisk.html"><i class="icon-storage nav-icon"></i><label class="s-nav">服务工单</label><i class="icon-plus mp-icon"></i></a>
            <a class="g-sdc-item" href="c_tag.html"><i class="icon-tag nav-icon"></i><label class="s-nav">远程控制维护</label></a>
            <a class="g-sdc-item" href="c_network_vpc.html"><i class="icon-network nav-icon"></i><label class="s-nav">费用管理</label><i class="icon-plus mp-icon"></i></a>
            <a class="g-sdc-item" href="c_network_vpc.html"><i class="icon-clouddesktop nav-icon"></i><label class="s-nav">价格体系表</label><i class="icon-plus mp-icon"></i></a>
            <a class="g-sdc-item" href="c_workorder.html"><i class="icon-workorder nav-icon"></i><label class="s-nav">渠道管理</label></a>
            <a class="g-sdc-item" href="c_alarmcenter.html"><i class="icon-operationlog nav-icon"></i><label class="s-nav">统计分析</label></a>
            <a class="g-sdc-item" href="c_alarmcenter.html"><i class="icon-alarmcenter nav-icon"></i><label class="s-nav">消息中心</label></a>
            <a class="g-sdc-item" href="c_operationlog.html"><i class="icon-operationlog nav-icon"></i><label class="s-nav">操作日志</label></a>
            <a class="g-sdc-item" href="c_operationlog.html"><i class="icon-calculation nav-icon"></i><label class="s-nav">平台配置</label></a>
        </div>
    </div>

    <div class="g-mn">
        <div class="ov-layout">
            <div class="ov-wrap">
                <div class="sec-floor-one">
                    <ul>
                        <li>
                            <label>上次登录 IP：</label>
                            <span>172.18.10.5</span>
                        </li>
                        <li>
                            <label>上次登录时间：</label>
                            <span>2015年11月25日  15：35</span>
                        </li>
                    </ul>
                </div>
                <div class="sec-floor-two">
                    <div class="fb-row" style="margin-bottom: 1px;">
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-comptsug"></i>
                            <a class="comptsug" href="javascript:;">投诉建议（<label>0</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-workorder"></i>
                            <a class="workorder" href="javascript:;">工单（<label>2</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-cusconsul"></i>
                            <a class="cusconsul" href="javascript:;">客户咨询（<label>63</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-invorqust"></i>
                            <a class="invorqust" href="javascript:;">发票申请（<label>24</label>）</a>
                        </div>
                        <div class="fb-item">
                            <i class="icon-facebook icon-facebook-filiappl"></i>
                            <a class="filiappl" href="javascript:;">备案申请（<label>0</label>）</a>
                        </div>
                    </div>
                    <div class="fb-row">
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-eggadd"></i>
                            <a class="eggadd" href="javascript:;">蛋壳+（<label>4</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-cudmirrappl"></i>
                            <a class="cudmirrappl" href="javascript:;">云镜像申请（<label>0</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-endtime"></i>
                            <div class="term">
                                <label>已到期</label><br />
                                <span><b>客户：</b><a class="cuspro" href="javascript:;">22</a><b class="f-ml15">产品：</b><a class="cuspro" href="javascript:;">36</a></span>
                            </div>
                        </div>
                        <div class="fb-item fb-itemlast">
                            <i class="icon-facebook icon-facebook-sevenrev"></i>
                            <div class="term">
                                <label>七天内到期</label><br />
                                <span><b>客户：</b><a class="cuspro" href="javascript:;">22</a><b class="f-ml15">产品：</b><a class="cuspro" href="javascript:;">36</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-floor-three">
                    <div class="chart-list">
                        <div class="chart-item">
                            <div class="c-box-tit">
                                <h3>营收</h3>
                                <ul>
                                    <li>最近7天</li>
                                    <li><label>充值营收：</label><span class="c-257">¥ 2563.20</span></li>
                                    <li><label>扣费营收：</label><span class="c-257">¥ 56565.00</span></li>
                                </ul>
                                <p><label>累计总额：</label><span class="c-257">¥ 32323.00</span></p>
                            </div>
                            <div class="chart-show"><img src="img/revenue-show.png" alt="营收" width="293" height="161"/></div>
                            <div class="botm-tips">
                                <ul>
                                    <li><i class="icon-tips icon-tips-one"></i><label>充值营收</label></li>
                                    <li class="f-ml20"><i class="icon-tips icon-tips-two"></i><label>扣费营收</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-item chart-middle">
                            <div class="c-box-tit">
                                <h3>客户</h3>
                                <ul>
                                    <li>最近7天</li>
                                    <li><label>新增客户：</label><a class="cumpro" href="javascript:;">¥ 1350</a></li>
                                </ul>
                                <p><label>客户总数：</label><span class="c-257">15464</span></p>
                            </div>
                            <div class="chart-show"><img src="img/customer-show.png" alt="客户" width="256" height="161"/></div>
                            <div class="botm-tips">
                                <ul>
                                    <li><i class="icon-tips icon-tips-one"></i><label>新增客户</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-item">
                            <div class="c-box-tit">
                                <h3>产品</h3>
                                <ul>
                                    <li>最近7天</li>
                                    <li><label>新增产品：</label><a class="cumpro" href="javascript:;">14</a></li>
                                </ul>
                                <p><label>产品总数：</label><span class="c-257">157</span></p>
                            </div>
                            <div class="chart-show"><img src="img/product-show.png" alt="产品" width="256" height="161"/></div>
                            <div class="botm-tips">
                                <ul>
                                    <li><i class="icon-tips icon-tips-one"></i><label>云主机</label></li>
                                    <li class="f-ml20"><i class="icon-tips icon-tips-two"></i><label>云硬盘</label></li>
                                    <li class="f-ml20"><i class="icon-tips icon-tips-three"></i><label>专属云</label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-floor-four">
                    <div class="sysmontrfault-list">
                        <div class="sysmontr-item">
                            <div class="sysmontr-tit">
                                <h5>计算资源使用率</h5>
                                <p class="c-4db"><label>使用状态：</label><span>良好</span></p>
                            </div>
                            <div class="sysmontr-show"><img src="img/cmpt-resource.png" alt="计算资源使用率" width="120" height="120" /></div>
                        </div>
                        <div class="sysmontr-item">
                            <div class="sysmontr-tit">
                                <h5>存储资源使用率</h5>
                                <p class="c-ffb"><label>使用状态：</label><span>告警</span></p>
                            </div>
                            <div class="sysmontr-show"><img src="img/storage-resource.png" alt="存储资源使用率" width="120" height="120" /></div>
                        </div>
                        <div class="sysmontr-item">
                            <div class="sysmontr-tit">
                                <h5>地址资源使用率</h5>
                                <p class="c-ff8"><label>使用状态：</label><span>危险</span></p>
                            </div>
                            <div class="sysmontr-show"><img src="img/address-resource.png" alt="地址资源使用率" width="120" height="120" /></div>
                        </div>
                        <div class="fault-info">
                            <div class="flt-list">
                                <div class="flt-item">
                                    <div class="flt-left-cont">
                                        <h5>平台故障</h5>
                                        <p class="c-ff8"><label>故障数：</label><span>5</span></p>
                                    </div>
                                    <div class="flt-right-icon"><a class="icon-fault" href="javascript:;"></a></div>
                                </div>
                                <div class="flt-item">
                                    <div class="flt-left-cont">
                                        <h5>产品故障</h5>
                                        <p class="c-ff8"><label>故障数：</label><span>14</span></p>
                                    </div>
                                    <div class="flt-right-icon"><a class="icon-fault" href="javascript:;"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="g-mn">
        <div class="ov-layout">
            <div class="ov-wrap">
                <div class="sec-floor-one">
                    <ul>
                        <li>
                            <label>上次登录 IP：</label>
                            <span>172.18.10.5</span>
                        </li>
                        <li>
                            <label>上次登录时间：</label>
                            <span>2017年03月23日  11:35</span>
                        </li>
                    </ul>
                </div>
                <div class="sec-floor-two">
                    <div class="fb-row" style="margin-bottom: 1px;">
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-comptsug"></i>
                            <a class="comptsug" href="javascript:;">未读消息通知（<label>0</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-workorder"></i>
                            <a class="workorder" href="javascript:;">待处理服务工单（<label>2</label>）</a>
                        </div>
                        <div class="fb-item">
                            <i class="icon-facebook icon-facebook-filiappl"></i>
                            <a class="filiappl" href="javascript:;">待处理任务（<label>0</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-cusconsul"></i>
                            <a class="cusconsul" href="javascript:;">客户咨询（<label>63</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-invorqust"></i>
                            <a class="invorqust" href="javascript:;">发票申请（<label>0</label>）</a>
                        </div>

                    </div>
                    <div class="fb-row">
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-eggadd"></i>
                            <a class="eggadd" href="javascript:;">7天内新客户（<label>24</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-cudmirrappl"></i>
                            <a class="cudmirrappl" href="javascript:;">渠道申请审批（<label>0</label>）</a>
                        </div>
                        <div class="fb-item fb-item-sidebar">
                            <i class="icon-facebook icon-facebook-endtime"></i>
                            <div class="term">
                                <label>已到期</label><br />
                                <span><b>客户：</b><a class="cuspro" href="javascript:;">22</a><b class="f-ml15">产品服务：</b><a class="cuspro" href="javascript:;">36</a></span>
                            </div>
                        </div>
                        <div class="fb-item fb-itemlast">
                            <i class="icon-facebook icon-facebook-sevenrev"></i>
                            <div class="term">
                                <label>七天内到期</label><br />
                                <span><b>客户：</b><a class="cuspro" href="javascript:;">22</a><b class="f-ml15">产品服务：</b><a class="cuspro" href="javascript:;">36</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-floor-three">
                    <div class="chart-list">
                        <div class="chart-item">
                            <div class="c-box-tit">
                                <h3>销售总收入</h3>
                                <ul>
                                    <li>最近7天</li>
                                    <li><label>财税专用机收入：</label><span class="c-257">¥ 32,480.00</span></li>
                                    <li><label>财税产品服务收入：</label><span class="c-257">¥ 18,320.00</span></li>
                                </ul>
                                <p><label>累计总额：</label><span class="c-257">¥ 286,480.00</span></p>
                            </div>
                            <div class="chart-show"><img src="img/revenue-show.png" alt="营收" width="293" height="161"/></div>
                            <div class="botm-tips">
                                <ul>
                                    <li><i class="icon-tips icon-tips-one"></i><label>财税专用机收入</label></li>
                                    <li class="f-ml20"><i class="icon-tips icon-tips-two"></i><label>财税产品服务收入</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-item chart-middle">
                            <div class="c-box-tit">
                                <h3>客户</h3>
                                <ul>
                                    <li>最近7天</li>
                                    <li><label>新增客户数：</label><a class="cumpro" href="javascript:;">24</a></li>
                                </ul>
                                <p><label>客户总数：</label><span class="c-257">7,464</span></p>
                            </div>
                            <div class="chart-show"><img src="img/customer-show.png" alt="客户" width="256" height="161"/></div>
                            <div class="botm-tips">
                                <ul>
                                    <li><i class="icon-tips icon-tips-one"></i><label>新增客户数</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-item">
                            <div class="c-box-tit">
                                <h3>产品服务订购</h3>
                                <ul>
                                    <li>最近7天</li>
                                    <li><label>新增产品服务订购数：</label><a class="cumpro" href="javascript:;">14</a></li>
                                </ul>
                                <p><label>产品服务订购总数：</label><span class="c-257">1,457</span></p>
                            </div>
                            <div class="chart-show"><img src="img/product-show.png" alt="产品" width="256" height="161"/></div>
                            <div class="botm-tips">
                                <ul>
                                    <li><i class="icon-tips icon-tips-one"></i><label>用友T3</label></li>
                                    <li class="f-ml20"><i class="icon-tips icon-tips-two"></i><label>好会计普及版</label></li>
                                    <li class="f-ml20"><i class="icon-tips icon-tips-three"></i><label>用友T+</label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--JavaScript-->
<!--<script type="text/javascript" src="../../dep/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="../common/js/plugin.js"></script>-->
<!--<script type="text/javascript" src="../common/js/common.js"></script>-->
<!--<script type="text/javascript" src="js/console.js"></script>-->
<!--<script type="text/javascript" src="js/c_overview.js"></script>-->
<!--/JavaScript-->
</body>
</html>
<div id='loading' style='display: none'>
    <div>
        <img src="/bsce/Public/img/loading.gif" align=""><span>&nbsp;&nbsp;loading...</span>
    </div>
</div>
<div id="footer">© 2016 版权归世纪云道所有</div>
</div>
<!-- JavaScript -->
<script src="/ZCloud/Public/js/bootstrap.min.js"></script>
<script src="/ZCloud/Public/js/vue.min.js"></script>
<script src="/ZCloud/Application/Admin/View//Public/static/js/app.js"></script>
<?php $str = "/ZCloud/Public/js/uploadPreview.js,/ZCloud/Public/js/vue.min.js,/ZCloud/Public/js/jquery.form.js,/ZCloud/Public/js/bootstrap-select.js,/ZCloud/Application/Admin/View//Public/static/js/allsce/base.js"; $arr = explode(",", $str); ?>
<?php if(is_array($arr)): foreach($arr as $key=>$src): ?><script src="<?php echo ($src); ?>"></script><?php endforeach; endif; ?>
</body>
</html>