GlobalTypeUtil = {
	datas : {
		// tablekey在resources/tablekey.txt中声明
		1 : {
			// columnkey在resources/columnkey.txt中声明
			1 : {
				1 : "人工加款",
				2 : "人工扣款",
				3 : "在线取款失败",
				4 : "在线取款",
				5 : "在线支付",
				6 : "快速入款",
				7 : "一般入款",
				8 : "体育投注",
				9 : "二级代理反水加钱",
				10 : "二级代理反水扣钱",
				11 : "二级代理反点加钱",
				12 : "二级代理反点扣钱",
				13 : "多级代理反点加钱",
				14 : "一多级代理反点扣钱",
				15 : "三方额度转入系统额度",
				16 : "系统额度转入三方额度",
				130 : "彩票投注"
			},
			2 : {
				1 : "处理中",
				2 : "充值成功",
				3 : "充值失败",
				4 : "已取消"
			},
			3 : {
				1 : "处理中",
				2 : "提款成功",
				3 : "提款失败",
				4 : "已取消"
			}
		},
		2 : {
			1 : {
				1 : "禁用",
				2 : "启用"
			},
			2 : {
				1 : "会员",
				2 : "租户超级管理员",
				3 : "租户管理员",
				4 : "代理",
				5 : "总代理"
			}
		},
		3 : {
			1 : {
				1 : "禁用",
				2 : "启用"
			}
		},
		4 : {
			1 : {
				1 : "未发布",
				2 : "已发布"
			},
			2 : {
				1 : "推广",
				2 : "维护"
			}
		},
		5 : {
			1 : {
				1 : "未读",
				2 : "已读"
			}
		},
		6 : {
			1 : {
				1 : "禁用",
				2 : "启用",
				3 : "隐藏"
			}
		},
		7 : {
			1 : {
				1 : "禁用",
				2 : "启用"
			},
			2 : {
				1 : "会员",
				2 : "代理"
			},
			3 : {
				1 : "文本",
				2 : "下拉框",
				3 : "单选",
				4 : "多选",
				5 : "文本域",
				6 : "密码框"
			},
			4 : {
				1 : "隐藏",
				2 : "可见"
			}
		},
		8 : {
			1 : {
				"text" : "文本",
				"date" : "日期",
				"datetime" : "日期时间",
				"checklist" : "多选",
				"select" : "下拉选择",
				"combodate" : "下拉时间",
				"textarea" : "文本域"
			}
		}
	},
	getTypeName : function(tableKey, colKey, key) {
		if (!key) {
			return "";
		}
		return GlobalTypeUtil.datas[tableKey][colKey][key];
	},
	getCombo : function(tableKey, colKey) {
		if (!colKey) {
			return {};
		}
		var data = GlobalTypeUtil.datas[tableKey][colKey];
		var res = [];
		var son = {};
		for ( var key in data) {
			son = {};
			son.id = key;
			son.name = data[key];
			res.push(son);
		}
		return res;
	}

}