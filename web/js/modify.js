function getUserInfo (cb) {
		$.ajax({
			type : 'GET',
			url  : '/index.php/index/getUserInfo',
			timeout : 10000,
			dataType: "json",
			success : function(data){
			  cb && cb(data);
			},
			error: function() {
				alert('服务器异常');
			},
			complete:function(XHR,textStatus){
				XHR = null;
			}
	});  
}


function getFiveData (type,cb,number) {
	$.ajax({
			type : 'GET',
			url  : '/index.php/index/getDataFive?type='+type+'&number='+number,
			timeout : 10000,
			dataType: "text",
			success : function(data){
			  cb && cb(data);
			},
			error: function() {
				alert('服务器异常');
			},
			complete:function(XHR,textStatus){
				XHR = null;
			}
	});  
}
