<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-status-bar-style" content="block">
    <meta name="fromat-detecition" content="telephone=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>景区管理员登陆</title>
    <style type="text/css">
        *{margin: 0; box-sizing: border-box; font-family: '微软雅黑', 'Microsoft YaHei'; color: #666;} html{height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center; background-image: url(/ZCloud/Application/Admin/View//Public/static/css/img/loginbg.jpg);} body{height: 100%; position: relative;} input{width: 100%; height: 38px; line-height: 38px; border: none; padding: 0 10px; font-size: 18px;} input:focus{outline: none;} ::-webkit-input-placeholder{color: #cbcbcb;} :-moz-placeholder{color: #cbcbcb;} ::-moz-placeholder{color: #cbcbcb;} :-ms-input-placeholder{color: #cbcbcb;} #mainCnr{width: 720px; height: 360px; position: absolute; left: 50%; bottom: 25%; margin-left: -360px;} #mainCnr:after{content: ''; display: block; clear: both;} #logoCnr{float: left; width: 37.5%; height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center; background-image: url(/ZCloud/Application/Admin/View//Public/static/css/img/loginside.jpg);} #actionCnr{float: left; position: relative; width: 62.5%; height: 100%; background-color: #fff; padding: 34px 30px 28px;} #actionCnr > div:first-child{line-height: 32px; font-size: 32px; color: #3bc2b5; letter-spacing: 3px;} .row{margin-top: 25px; border-bottom: 1px solid #999; background-repeat: no-repeat; background-position: left; background-size: 18px;} .row.usr{padding-left: 18px; background-image: url(/ZCloud/Application/Admin/View//Public/static/css/img/loginusr.png);} .row.pwd{padding-left: 18px; background-image: url(/ZCloud/Application/Admin/View//Public/static/css/img/loginlock.png);} .row.verify{width: 50%; display: inline-block;} #btnLoginCnr{position: absolute; bottom: 28px; left: 30px; right: 30px;} #btnLogin{width: 100%; line-height: 40px; font-size: 20px; text-align: center; border: none; background-color: #3bc2b5; color: #fff;} .verify-cnr{position: relative;} #verifyImg{position: absolute; right: 0; bottom: 0; height: 50px; width: 160px;} #verifyImg > img{width: 100%; height: 100%;}
    </style>
</head>
<body>
<div id="mainCnr">
    <div id="logoCnr"></div>
    <div id="actionCnr">
        <div>登录</div>
        <form action="<?php echo U('login/login');?>" method="post">
            <div class="row usr">
                <input type="text" name="username" placeholder="账号ID、手机号码">
            </div>
            <div class="row pwd">
                <input type="password" name="password" placeholder="密码">
            </div>
            <div class="verify-cnr">
                <div class="row verify">
                    <input type="text"  name="verify" placeholder="验证码">
                </div>
                <a id="verifyImg" href="javascript:void(0)"><img class="verify" src="<?php echo U('login/verify');?>" alt="点击刷新"/></a>
            </div>
            <div id="btnLoginCnr">
                <button id="btnLogin" type="submit">登陆</button>
            </div>
        </form>
    </div>
</div>
<script src="/ZCloud/Public/js/jquery.min.js"></script>
<script>
    $(function(){
        $(".verify").click(function(){
            var src = "<?php echo U('login/verify');?>";
            var random = Math.floor(Math.random()*(1000+1));
            $(this).attr("src",src+"?random="+random);
        });
    })
</script>
</body>
</html>