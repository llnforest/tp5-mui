<?php /*a:4:{s:49:"E:\web\mui2\application\index\view\index\main.php";i:1559214329;s:52:"E:\web\mui2\application\index\view\template\head.php";i:1559205455;s:54:"E:\web\mui2\application\index\view\template\header.php";i:1559208907;s:53:"E:\web\mui2\application\index\view\template\jsTpl.php";i:1559205832;}*/ ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title>登录提示</title>
<link href="/mui2/public/static/index/css/mui.min.css" rel="stylesheet" />
<link href="/mui2/public/static/index/plugin/picker/css/mui.picker.css" rel="stylesheet" />
<link href="/mui2/public/static/index/plugin/picker/css/mui.poppicker.css" rel="stylesheet" />
<link href="/mui2/public/static/index/css/style.css" rel="stylesheet" />
<link href="/mui2/public/static/index/css/ln.css" rel="stylesheet" />
        <style>
            ul {
                font-size: 14px;
                color: #8f8f94;
            }
            .mui-btn {
                padding: 10px;
            }
        </style>
    </head>

	<body>
        <?php if(!isset($is_weixin) || empty($is_weixin)): ?>
<header class="mui-bar mui-bar-nav">
    
    <h1 class="mui-title">登录模板</h1>
    <button id="setting" class=" mui-pull-right mui-btn-link">设置</button>
</header>
<?php endif; ?>
		<div class="mui-content" id="mainDom">
            <div id="refreshContainer" class="mui-content mui-scroll-wrapper">
                <div class="mui-scroll">
                    <!--数据列表-->
                    <div class="mui-content-padded"  id="main">
                        <p>
                            您好 <span id='account'></span>，您已成功登录。
                        <ul>
                            <li>这是mui带登录和设置模板的示例App首页。</li>
                            <li>您可以点击右上角的 “设置” 按钮，进入设置模板，体验div窗体切换示例。</li>
                            <li>在 “设置” 中点击 “退出” 可以 “注销当前账户” 或 “直接关闭应用”。</li>
                            <li>你可以设置 “锁屏图案”，这样可通过手势密码代替输入账号、密码；</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>


		</div>
		<script src="/mui2/public/static/index/js/mui.min.js"></script>
<script src="/mui2/public/static/index/js/jquery-3.4.1.min.js"></script>
<script src="/mui2/public/static/index/js/app.js"></script>
		<script>
			(function(mui, doc) {
				mui.init({
                    pullRefresh : {
                        container:"#refreshContainer",//下拉刷新容器标识，querySelector能定位的css选择器均可，比如：id、.class等
                        down : {
                            style:'circle',//必选，下拉刷新样式，目前支持原生5+ ‘circle’ 样式
                            color:'#2BD009', //可选，默认“#2BD009” 下拉刷新控件颜色
                            height:50,//可选,默认50px.下拉刷新控件的高度,
                            range:100, //可选 默认100px,控件可下拉拖拽的范围
                            offset:0, //可选 默认0px,下拉刷新控件的起始位置
                            auto: false,//可选,默认false.首次加载自动上拉刷新一次
                            // height:50,//可选,默认50.触发下拉刷新拖动距离,
                            // auto: false,//可选,默认false.首次加载自动下拉刷新一次
                            // contentdown : "下拉可以刷新",//可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
                            // contentover : "释放立即刷新",//可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
                            // contentrefresh : "正在下拉刷新...",//可选，正在刷新状态时，下拉刷新控件上显示的标题内容
                            // contentnomore:"没有更多数据了",//可选，请求完毕若没有更多数据时显示的提醒内容；
                            callback :pullDown //必选，刷新函数，根据具体业务来编写，比如通过ajax从服务器获取新数据；


                        },
                        up:false
                    }
                });

				function pullDown(){
                    var _dom = doc.getElementById("main");

                    var _before = doc.createElement('div');
                        _before.innerHTML = '插入前面';
                    _dom.parentNode.insertBefore(_before,_dom)
                    console.log('ok1');
                    mui('#refreshContainer').pullRefresh().endPulldownToRefresh();
                }
                function pullUp(){
                    var _dom = doc.getElementById("main");

                    var _before = doc.createElement('div');
                    _before.innerHTML = '插入后面';
                    _dom.parentNode.insertBefore(_before,_dom)
                    console.log('ok2');
                    mui('#refreshContainer').pullRefresh().endPullupToRefresh();
                }

			}(mui, document));
		</script>
	</body>

</html>