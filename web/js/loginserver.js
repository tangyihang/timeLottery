var culs = null;
//check user login status 
function CULS(){
	$.ajax({
		type : 'GET',
		url  : '/index.php/index/getUserInfo',
		timeout : 10000,
		dataType: "json",
		success : function(data){
			// console.log(data);
			if (!data||data=="null") {
				var welcomeinfo = "欢迎您，尊贵的游客，<a href='/index.php/user/login?is_login=1' >请登录</a>！";
				if ($("#user_baseinfo")) {
					$("#user_baseinfo").html(welcomeinfo);	
				}else{
					$("#user_username").html(welcomeinfo);
				}
				$("#refff").html('************');
				
				$(".yu_e").html("尊贵的游客，请返回首页登录!");
				$("#user_welcomeinfo").html(welcomeinfo);
			}
			// else if (data.coin>=0) {
				culs = true;	
			// 	$("#user_level").html(data.data.grade);
			// 	$("#user_username").html(data.data.username);
			// 	$("#user_reservedinfo").html(data.data.care);
			// 	$("#user_msgcount").html(data.data.msgcount);
			// }
			// console.log(culs);
		},
		error: function() {
			alert('服务器异常');
		},
		complete:function(XHR,textStatus){
			XHR = null;
		}
	});  
}
CULS();
function Xgo(t){
	if($(t)){
		if (!culs) {
			hintLogin();
		}else{
			location.href = $(t).attr('attr-href');
		}
	}
}
var loginbox = null;
function hintLogin(){

	var index = layer.confirm('您还为登录，现在去登录？', {
	    btn: ['确定','稍后在说'], //按钮
	    shade: false //不显示遮罩
	}, function(){

		layer.close(index);

	   loginbox = layer.open({
		  type: 2,
		  title: '用户登录',
		  shadeClose: true,
		  shade: 0.8,
		  area: ['600px', '350px'],
		  content: '/index.php/user/logininfo'
		});

	}, function(){

	});

	return;
}

//现在登录
function rnlogin(){
	index = layer.open({
	  type: 2,
	  title: '用户登录',
	  shadeClose: true,
	  shade: 0.8,
	  area: ['600px', '350px'],
	  content: '/index.php/user/logininfo'
	});
}