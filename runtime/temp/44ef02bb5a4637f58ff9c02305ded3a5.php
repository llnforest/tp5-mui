<?php /*a:4:{s:44:"E:\web\mui2\application\index\view\login.php";i:1559209792;s:52:"E:\web\mui2\application\index\view\template\head.php";i:1559205455;s:54:"E:\web\mui2\application\index\view\template\header.php";i:1559208907;s:53:"E:\web\mui2\application\index\view\template\jsTpl.php";i:1559205832;}*/ ?>
<!DOCTYPE html>
<html class="ui-page-login">

	<head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title>登录</title>
<link href="/mui2/public/static/index/css/mui.min.css" rel="stylesheet" />
<link href="/mui2/public/static/index/plugin/picker/css/mui.picker.css" rel="stylesheet" />
<link href="/mui2/public/static/index/plugin/picker/css/mui.poppicker.css" rel="stylesheet" />
<link href="/mui2/public/static/index/css/style.css" rel="stylesheet" />
<link href="/mui2/public/static/index/css/ln.css" rel="stylesheet" />
		<link href="/mui2/public/static/index/css/login.css" rel="stylesheet" />
	</head>

	<body>
		<?php if(!isset($is_weixin) || empty($is_weixin)): ?>
<header class="mui-bar mui-bar-nav">
    
    <h1 class="mui-title">登录</h1>
    
</header>
<?php endif; ?>
		<div class="mui-content">
			<form id='login-form' class="ln-form-area">
				<div class="ln-form-row">
					<label>手机号</label>
					<input type="text" class="ln-form-input" placeholder="请输入手机号">
				</div>
				<div class="ln-form-row">
					<label>验证码</label>
					<input type="password" class="ln-form-input input-short" placeholder="请输入验证码">
					<button id="codeBtn" type="button" data-loading-text="发送中" class="mui-btn mui-btn-danger btn-left code-btn">发送验证码</button>
				</div>
				<div class="ln-form-row">
					<label>车型</label>
					<div id="carPicker" class="ln-form-input">轿车</div>
					<input id="carType" type="hidden" value="1">
				</div>
			</form>
		
			<div class="mui-content-padded">
				<button id='login' class="mui-btn mui-btn-block mui-btn-red">绑定登录</button>
				

			</div>
			<div class="mui-content-padded oauth-area">

			</div>
		</div>
        <script src="/mui2/public/static/index/js/mui.min.js"></script>
<script src="/mui2/public/static/index/js/jquery-3.4.1.min.js"></script>
<script src="/mui2/public/static/index/js/app.js"></script>

		<script src="/mui2/public/static/index/plugin/picker/js/mui.picker.js"></script>
		<script src="/mui2/public/static/index/plugin/picker/js/mui.poppicker.js"></script>
		<script src="/mui2/public/static/index/js/mui.enterfocus.js"></script>
		<script>
			
			(function(mui, doc) {
				mui.init({
					statusBarBackground: '#f7f7f7'
				});
				mui.ready(function(){
					//下拉选择事件
					var picker = new mui.PopPicker();
					picker.setData([{value:'1',text:'轿车'},{value:2,text:'货车'},{value:3,text:'客车'}]);
					
					//原生js
					var _car = doc.getElementById('carPicker')
					var _carInput = doc.getElementById("carType");
					var _codeBtn = doc.getElementById('codeBtn');
					var _login = doc.getElementById('login');

					var sec = 60;
					

					_car.addEventListener('tap',function(e){
						picker.show(function (selectItems) {
							_car.innerText = selectItems[0].text;
							_carInput.value = selectItems[0].value;
						});
					})
					
					//启用jquery (jQuery||$)
					// mui(doc.body).on('tap','#carPicker',function(e){
					// 	var _that = $(this);
					// 	picker.show(function (selectItems) {
					// 		_that.text(selectItems[0].text);
					// 		$("#carType").val(selectItems[0].value);
					// 		
					// 	});
					// })
					
					//发送短信验证码
					mui(doc.body).on('tap','.code-btn',function(e){
					    var _that = this;
						mui(this).button('loading')
					    mui.post("<?php echo url('index/sendmsg'); ?>",{type:1},function(data){
                            if(data.code == 0){
                                mui(_that).button('reset');
                                _codeBtn.innerText = sec+'s后重新发送';
                                _codeBtn.setAttribute('disabled',true);
                                mui.toast('短信验证码已成功发送');
                                var timer = setInterval(function(){
                                    sec --;
                                    if(sec == 0){
                                        sec = 60;
                                        clearInterval(timer);
                                        _codeBtn.innerText = '发送验证码';
                                        _codeBtn.removeAttribute('disabled');
                                    }else{
                                        _codeBtn.innerText = sec+'s后重新发送';
                                    }

                                },1000)

                            }else{
                                mui.toast('短信验证码发送失败');
                            }
                        },'json')
					})
					
					//跳转页面
					_login.addEventListener('tap',function(){
						console.log('skip');
						// window.location.href="<?php echo url('index/main',['id'=>1]); ?>";
						mui.openWindow({
							url:"<?php echo url('index/main',['id'=>1]); ?>",
							id:'index/main'
						})
					})
					
					
					
					
				})
				
			}(mui, document));
		</script>
	</body>

</html>