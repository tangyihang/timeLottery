<div id="siderbar">
<ul class="list clearfix">
<li ><a href="/index.php/safe/tuiguang" >我的推广</a></li>
<li ><a href="/index.php/safe/c38_cz" >在线充值</a></li>
<li ><a href="/index.php/safe/info" >绑定卡号</a></li>
<li ><a href="/index.php/safe/passwd" >密码修改</a></li>
<li ><a href="/index.php/record/search" >投注记录</a></li>
<li ><a href="/index.php/report/coin" >帐变记录</a></li>
<li ><a href="/index.php/report/count" >盈亏报表</a></li>
<!--li ><a href="/index.php/cash/rechargeLog" >充值记录</a></li-->
<li ><a href="/index.php/cash/toCashLog" >提现记录</a></li>
<!--<li ><a href="/index.php/user/nickname" >更改称昵</a></li>-->
<li ><a href="/index.php/box/receive" >消息管理</a></li>
</ul>
</div>
<script>
var siderbar = {
	'/index.php/safe/tuiguang':0,
	'/index.php/safe/c38_cz':1,
	'/index.php/safe/info':2,
	'/index.php/safe/passwd':3,
	'/index.php/record/search':4,
	'/index.php/report/coin':5,
	'/index.php/report/count':6,
	'/index.php/cash/toCashLog':7,
	'/index.php/user/nickname':8,
	'/index.php/box/receive':9
}	
var current = siderbar[window.location.pathname];
$("#siderbar li").eq(current).addClass("current");

function YZDL(){
	$.ajax({
		type : 'GET',
		url  : '/index.php/index/getUserInfo',
		timeout : 10000,
		dataType: "json",
		success : function(data){
			// console.log(data);
			if (!data||data=="null") {
				alert('请先登陆！');
				window.location.href="/";
			}
			 else if (data.coin>=0) {
				culs = true;	
				
		 }
			
		},
		error: function() {
			CULS();
			//alert('服务器异常');
		},
		complete:function(XHR,textStatus){
			XHR = null;
		}
	});  
}
 YZDL();
</script>