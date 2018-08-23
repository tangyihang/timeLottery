// 刷新
function refresh() {
	$("#datagrid_tb").bootstrapTable('refresh');
}

/**
 * 提示框
 * param 文本消息
 * index 索引
 */
function aler(param,index){
	switch (index) {
	case 1://普通提示框
		layer.alert(param, {
			  icon: 0,
			  skin: 'layer-ext-moon'
			});
		break;
	case 2://状态开启提示框
		layer.alert('【'+param+'】已被启用!', {
			  icon: 6,
			  skin: 'layer-ext-moon'
			})
		break;
	case 3://状态关闭提示框
		layer.alert('【'+param+'】已被禁用!', {
			icon: 5,
			skin: 'layer-ext-moon'
		})
		break;
	case 4://成功提示框
		layer.alert(param,{
			icon: 1,
			skin: 'layer-ext-moon'
		})
		break;
	default:
		layer.alert(param, {
			icon: 2,
			skin: 'layer-ext-moon'
		})
		break;
	}
}


//格式化公告类型
function articleType(value){
	switch(value){
	case 1:
		return '关于我们';
		break;
	case 2:
		return '取款帮助';
		break;
	case 3:
		return '存款帮助';
		break;
	case 4:
		return '联盟方案';
		break;
	case 5:
		return '联盟协议';
		break;
	case 6:
		return '联系我们';
		break;
	case 7:
		return '常见问题';
		break;
	case 8:
		return '玩法介绍';
		break;
	case 9:
		return '彩票公告';
		break;
	case 10:
		return '视讯公告';
		break;
	case 11:
		return '体育公告';
		break;
	case 12:
		return '电子公告';
		break;
	}
}

//表格刷新并返回第一页
function initAndRefresh(){
	$("#datagrid_tb").bootstrapTable('refreshOptions',{pageNumber:1});
}

//格式化日期时间
function dateFormatterDateTime(value, row, index) {
	return DateUtil.formatDatetime(value);
}

//格式化日期
function dateFormatterDate(value, row, index) {
	return DateUtil.formatDate(value);
}

	function cz(obj){
			var lotName = '';
			switch(obj){
			case 'CQSSC':
				lotName = "重庆时时彩";
				break;
			case 'PL3':
				lotName = "排列三";
				break;
			case 'SH11X5':
				lotName = "上海11选5";
				break;
			case 'FC3D':
				lotName = "福彩3D";
				break;
			case 'BJSC':
				lotName = "北京赛车";
				break;
			case 'EFC':
				lotName = "二分彩";
				break;
			case 'WFC':
				lotName = "五分彩";
				break;
			case 'XJSSC':
				lotName = "新疆时时彩";
				break;
			case 'PCEGG':
				lotName = "PC蛋蛋";
				break;
			case 'JX11X5':
				lotName = "江西11选5";
				break;
			case 'GD11X5':
				lotName = "广东11选5";
				break;
			case 'SD11X5':
				lotName = "山东11选5";
				break;
			case 'TJSSC':
				lotName = "天津时时彩";
				break;
			case 'FFC':
				lotName = "分分彩";
				break;
			
			}
			return lotName;
		}

//状态
function statusFormatter(value, row, index) {
	if (value === 2) {
		return '<span class="text-success">启用</span><a href="#"><span class="text-danger stateClose">(禁用)</span></a>';
	}
	return '<span class="text-danger">禁用</span><a href="#"><span class="text-success stateOpen">(启用)</span></a>';
}
