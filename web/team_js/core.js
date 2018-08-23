(function() {
	var _tags = document.getElementsByTagName("script");
	window.base = _tags[_tags.length - 1].getAttribute("path");
})();

/**
 * 系统消息框
 */
(function() {
	var _parent = window;
	while (_parent != window.parent) {
		_parent = window.parent;
	}
	// 初始化BS的模态框

	var sysmsg_source = '<div class=\"modal fade\" style="z-index:9999" id=\"sysmsg\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"sysmsgLabel\" aria-hidden=\"true\">'
			+ '<div class=\"modal-dialog\">'
			+ '<div class=\"modal-content\">'
			+ '<div class=\"modal-header\">'
			+ '<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>'
			+ '<h4 class=\"modal-title\" id=\"sysmsgLabel\"></h4>'
			+ '</div>'
			+ '<div class=\"modal-body\" id=\"sysmsgContent\"></div>'
			+ '<div class=\"modal-footer\" id=\"sysmsgfooter\">'
			+ '</div>'
			+ '</div>' + '</div>' + '</div>';
	var sysmsgindex = 1;
	var sysmsg_btns_ok_id = [
			'<button type=\"button\" class=\"btn btn-primary\" id=\"',
			'\" data-dismiss=\"modal\">' ]
	var sysmsg_btns_ok = [ "", '</button>' ];
	var sysmsg_btns_cancel_id = [
			'<button type=\"button\" class=\"btn btn-default\" id=\"',
			'\" data-dismiss=\"modal\">' ];
	var sysmsg_btns_cancel = [ "", '</button>' ];

	var sysmsgbtn_default = '<button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">确定</button>';

	var render = template.compile(sysmsg_source);
	window.document.body.innerHTML += render({});
	window.Msg = {
		info : function(msg) {
			showmsg("提示", msg, sysmsgbtn_default);
			// _parent.$.messager.alert("提示",msg,'info');
		},
		warn : function(msg) {
			showmsg("警告", msg, sysmsgbtn_default);
			// _parent.$.messager.alert("警告",msg,"warning");
		},
		error : function(msg) {
			showmsg("异常", msg, sysmsgbtn_default);
			// _parent.$.messager.alert("异常",msg,"error");
		},
		confirm : function(msg, btns, fn) {
			var btnids = [];
			var fns = [];
			var btnidpix = "sysmsgbtn_"
			var btnStr = "";
			for (var i = 0; i < arguments.length; i++) {
				if (typeof (arguments[i]) == "function") {
					fns.push(arguments[i]);
				}
			}

			if (btns && typeof (arguments[1]) != "function") {
				for (var i = 0; i < btns.btn.length; i++) {
					var cid = btnidpix + sysmsgindex + "_" + i;
					if (i == 0) {
						sysmsg_btns_ok[0] = sysmsg_btns_ok_id.join(cid);
						btnStr = sysmsg_btns_ok.join(btns.btn[i]);
					} else {
						sysmsg_btns_cancel[0] = sysmsg_btns_cancel_id.join(cid);
						btnStr += sysmsg_btns_cancel.join(btns.btn[i]);
					}
					btnids.push(cid);
				}
			} else {
				var cid = btnidpix + sysmsgindex;
				btnids.push(cid + "_" + 0);
				btnids.push(cid + "_" + 1);
				sysmsg_btns_ok[0] = sysmsg_btns_ok_id.join(cid + "_" + 0);
				btnStr = sysmsg_btns_ok.join("确认");
				sysmsg_btns_cancel[0] = sysmsg_btns_cancel_id.join(cid + "_"
						+ 1);
				btnStr += sysmsg_btns_cancel.join("取消");
			}

			showmsg("问题", msg, btnStr);
			for (var j = 0; j < btnids.length; j++) {
				if (j == fns.length) {
					break;
				}

				var callback = (function(index) {
					return function() {
						setTimeout(function() {
							fns[index]();
						}, 500);
					}
				})(j);
				$('#' + btnids[j]).on('click', callback);
			}
		}
	}

	function showmsg(type, msg, btn) {

		var html = template.compile(btn);
		$("#sysmsgfooter").html(html);
		$("#sysmsgLabel").html(type);
		$("#sysmsgContent").html(msg);
		$("#sysmsg").modal('show');
		sysmsgindex += 1;
	}

	/**
	 * 获取本周、本季度、本月、上月的开始日期、结束日期
	 */
	var now = new Date(); // 当前日期
	var nowDayOfWeek = now.getDay(); // 今天本周的第几天
	var nowDay = now.getDate(); // 当前日
	var nowMonth = now.getMonth(); // 当前月
	var nowYear = now.getYear(); // 当前年
	nowYear += (nowYear < 2000) ? 1900 : 0; //  

	var lastMonthDate = new Date(); // 上月日期
	lastMonthDate.setDate(1);
	lastMonthDate.setMonth(lastMonthDate.getMonth() - 1);
	var lastYear = lastMonthDate.getYear();
	lastYear += (lastYear < 2000) ? 1900 : 0; //  
	var lastMonth = lastMonthDate.getMonth();
	nowDayOfWeek = nowDayOfWeek == 0 ? 7 : nowDayOfWeek;
	// 获得某月的天数
	function getMonthDays(myMonth) {
		var monthStartDate = new Date(nowYear, myMonth, 1);
		var monthEndDate = new Date(nowYear, myMonth + 1, 1);
		var days = (monthEndDate - monthStartDate) / (1000 * 60 * 60 * 24);
		return days;
	}

	// 获得昨日
	function getLastDate() {
		var lastDate = new Date().setDate(nowDay - 1);
		return DateUtil.formatDate(lastDate);
	}

	// 获得本周的开始日期
	function getWeekStartDate() {
		var weekStartDate = new Date().setDate(nowDay - nowDayOfWeek + 1);
		return DateUtil.formatDate(weekStartDate);
	}

	// 获得本周的结束日期
	function getWeekEndDate() {
		var weekEndDate = new Date().setDate(nowDay - nowDayOfWeek + 7);
		return DateUtil.formatDate(weekEndDate);
	}

	// 获得上周的开始日期
	function getLastWeekStartDate() {
		var weekStartDate = new Date().setDate(nowDay - nowDayOfWeek - 6);
		return DateUtil.formatDate(weekStartDate);
	}

	// 获得上周的结束日期
	function getLastWeekEndDate() {

		var weekEndDate = new Date().setDate(nowDay - nowDayOfWeek);
		return DateUtil.formatDate(weekEndDate);
	}

	// 获得本月的开始日期
	function getMonthStartDate() {
		var monthStartDate = new Date(nowYear, nowMonth, 1);
		return DateUtil.formatDate(monthStartDate);
	}

	// 获得本月的结束日期
	function getMonthEndDate() {
		var monthEndDate = new Date(nowYear, nowMonth, getMonthDays(nowMonth));
		return DateUtil.formatDate(monthEndDate);
	}

	// 获得上月开始时间
	function getLastMonthStartDate() {
		var lastMonthStartDate = new Date(lastYear, lastMonth, 1);
		return DateUtil.formatDate(lastMonthStartDate);
	}

	// 获得上月结束时间
	function getLastMonthEndDate() {
		var lastMonthEndDate = new Date(lastYear, lastMonth,
				getMonthDays(lastMonth));
		return DateUtil.formatDate(lastMonthEndDate);
	}

	DateUtil = {
		formatDate : function(time) {
			if (!time) {
				return "";
			}
			var date = new Date(time);
			return date.format("yyyy-MM-dd");
		},
		formatDatetime : function(time) {
			if (!time) {
				return "";
			}
			var date = new Date(time);
			return date.format("yyyy-MM-dd hh:mm:ss");
		},
		getCurrentDate : function() {
			return new Date().format("yyyy-MM-dd");
		},
		getLastDate : function() {
			return getLastDate();
		},
		getWeekStartDate : function() {
			return getWeekStartDate();
		},
		getWeekEndDate : function() {
			return getWeekEndDate();
		},
		getLastWeekStartDate : function() {
			return getLastWeekStartDate();
		},
		getLastWeekEndDate : function() {
			return getLastWeekEndDate();
		},
		getMonthStartDate : function() {
			return getMonthStartDate();
		},
		getMonthDate : function() {
			var cur = new Date();
			cur.setDate(1);
			return cur.format("yyyy-MM-dd");

		},
		getMonthEndDate : function() {
			return getMonthEndDate();
		},
		getLastMonthStartDate : function() {
			return getLastMonthStartDate();
		},
		getLastMonthEndDate : function() {
			return getLastMonthEndDate();
		}

	}
})();

(function($) {
	// 备份jquery的ajax方法
	var _ajax = $.ajax;
	window.$ajax = _ajax;

	// 重写jquery的ajax方法
	$.ajax = function(opt) {
		if (!opt.dataType) {
			opt.dataType = "json";
		}
		if (!opt.type) {
			opt.type = "post";
		}
		// 备份opt中error和success方法
		var fn = {
			error : function(XMLHttpRequest, textStatus, errorThrown) {
			},
			success : function(data, textStatus, xhr) {
			}
		}
		if (opt.error) {
			fn.error = opt.error;
		}
		if (opt.success) {
			fn.success = opt.success;
		}

		// 扩展增强处理
		var _opt = $.extend(opt, {
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				var statusCode = XMLHttpRequest.status;
				// 错误方法增强处理
				if (statusCode == 404) {
					Msg.error("[" + opt.url + "] 404 not found");
				} else {
					fn.error(XMLHttpRequest, textStatus, errorThrown);
				}
			},
			success : function(data, textStatus, xhr) {
				var ceipstate = xhr.getResponseHeader("ceipstate")
				if (ceipstate == 1) {// 正常响应
					fn.success(data, textStatus, xhr);
				} else if (ceipstate == 2) {// 后台异常
					Msg.error("后台异常，请联系管理员!");
				} else if (ceipstate == 3) { // 业务异常
					Msg.info(data.msg);
				} else if (ceipstate == 4) {// 未登陆异常
					Msg.info("登陆超时，请重新登陆");
				} else if (ceipstate == 5) {// 没有权限
					Msg.info("没有权限");
				} else if (ceipstate == 6) {
					Msg.confirm(data.msg, {
						btn : [ '确定' ]
					}, function() {
						top.location.href = base + "/daili/loginError.do";
					});
				} else {
					fn.success(data, textStatus, xhr);
				}
			}
		});
		_ajax(_opt);
	};
})(jQuery);

function html_encode(str) {
	var s = "";
	if (str.length == 0)
		return "";
	s = str.replace(/&/g, "&gt;");
	s = s.replace(/</g, "&lt;");
	s = s.replace(/>/g, "&gt;");
	s = s.replace(/ /g, "&nbsp;");
	s = s.replace(/\'/g, "&#39;");
	s = s.replace(/\"/g, "&quot;");
	s = s.replace(/\n/g, "<br>");
	return s;
}

function html_decode(str) {
	var s = "";
	if (str.length == 0)
		return "";
	s = str.replace(/&gt;/g, "&");
	s = s.replace(/&lt;/g, "<");
	s = s.replace(/&gt;/g, ">");
	s = s.replace(/&nbsp;/g, " ");
	s = s.replace(/&#39;/g, "\'");
	s = s.replace(/&quot;/g, "\"");
	s = s.replace(/<br>/g, "\n");
	return s;
}

/**
 * JSON
 */
var JSON = JSON || {};
(function() {

	function f(n) {
		// Format integers to have at least two digits.
		return n < 10 ? '0' + n : n;
	}

	if (typeof Date.prototype.toJSON !== 'function') {

		Date.prototype.toJSON = function(key) {

			return isFinite(this.valueOf()) ? this.getUTCFullYear() + '-'
					+ f(this.getUTCMonth() + 1) + '-' + f(this.getUTCDate())
					+ 'T' + f(this.getUTCHours()) + ':'
					+ f(this.getUTCMinutes()) + ':' + f(this.getUTCSeconds())
					+ 'Z' : null;
		};

		String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function(
				key) {
			return this.valueOf();
		};
	}

	var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, gap, indent, meta = { // table
		// of
		// character
		// substitutions
		'\b' : '\\b',
		'\t' : '\\t',
		'\n' : '\\n',
		'\f' : '\\f',
		'\r' : '\\r',
		'"' : '\\"',
		'\\' : '\\\\'
	}, rep;
	function quote(string) {
		escapable.lastIndex = 0;
		return escapable.test(string) ? '"'
				+ string.replace(escapable,
						function(a) {
							var c = meta[a];
							return typeof c === 'string' ? c : '\\u'
									+ ('0000' + a.charCodeAt(0).toString(16))
											.slice(-4);
						}) + '"' : '"' + string + '"';
	}
	function str(key, holder) {
		var i, // The loop counter.
		k, // The member key.
		v, // The member value.
		length, mind = gap, partial, value = holder[key];
		if (value && typeof value === 'object'
				&& typeof value.toJSON === 'function') {
			value = value.toJSON(key);
		}
		if (typeof rep === 'function') {
			value = rep.call(holder, key, value);
		}
		switch (typeof value) {
		case 'string':
			return quote(value);
		case 'number':
			return isFinite(value) ? String(value) : 'null';
		case 'boolean':
		case 'null':
			return String(value);
		case 'object':
			if (!value) {
				return 'null';
			}
			gap += indent;
			partial = [];
			if (Object.prototype.toString.apply(value) === '[object Array]') {

				length = value.length;
				for (i = 0; i < length; i += 1) {
					partial[i] = str(i, value) || 'null';
				}
				v = partial.length === 0 ? '[]' : gap ? '[\n' + gap
						+ partial.join(',\n' + gap) + '\n' + mind + ']' : '['
						+ partial.join(',') + ']';
				gap = mind;
				return v;
			}
			if (rep && typeof rep === 'object') {
				length = rep.length;
				for (i = 0; i < length; i += 1) {
					k = rep[i];
					if (typeof k === 'string') {
						v = str(k, value);
						if (v) {
							partial.push(quote(k) + (gap ? ': ' : ':') + v);
						}
					}
				}
			} else {
				for (k in value) {
					if (Object.hasOwnProperty.call(value, k)) {
						v = str(k, value);
						if (v) {
							partial.push(quote(k) + (gap ? ': ' : ':') + v);
						}
					}
				}
			}
			v = partial.length === 0 ? '{}' : gap ? '{\n' + gap
					+ partial.join(',\n' + gap) + '\n' + mind + '}' : '{'
					+ partial.join(',') + '}';
			gap = mind;
			return v;
		}
	}
	if (typeof JSON.encode !== 'function') {
		JSON.encode = function(value, replacer, space) {
			var i;
			gap = '';
			indent = '';
			if (typeof space === 'number') {
				for (i = 0; i < space; i += 1) {
					indent += ' ';
				}
			} else if (typeof space === 'string') {
				indent = space;
			}
			rep = replacer;
			if (replacer
					&& typeof replacer !== 'function'
					&& (typeof replacer !== 'object' || typeof replacer.length !== 'number')) {
				throw new Error('JSON.stringify');
			}
			return str('', {
				'' : value
			});
		};
	}
	if (typeof JSON.decode !== 'function') {
		JSON.decode = function(text) {
			return eval("(" + text + ")");
		};
	}
}());

var Game = {};
Game.Table = function(cfg) {
	var defCfg = {
		method : 'post',
		cache : false,
		striped : true,
		pagination : true,
		pageList : [ 10, 25, 50, 100 ],
		contentType : "application/x-www-form-urlencoded",
		pageSize : 10,
		pageNumber : 1,
		queryParamsType : null,
		sidePagination : 'server',// 设置为服务器端分页
		showRefresh : true,
		showColumns : true,
		showToggle : true,
		minimumCountColumns : 2
	}

	for ( var key in defCfg) {
		if (cfg[key] === undefined) {
			cfg[key] = defCfg[key];
		}
	}
	return $('#' + cfg.id).bootstrapTable(cfg);
};

// 重写bootstraptable footer方法
(function() {
	var BootstrapTable = $.fn.bootstrapTable.Constructor;

	var sprintf = $.fn.bootstrapTable.utils.sprintf;

	var calculateObjectValue = $.fn.bootstrapTable.utils.calculateObjectValue;

	var oldLoadFn = BootstrapTable.prototype.load;

	BootstrapTable.prototype.load = function(res) {
		this["aggsData"] = res.aggsData;
		oldLoadFn.call(this, res);
	}

	var renderRow = function(cs, fn, that) {
		var data = that.getData();
		var html = [];
		html.push("<tr>");
		$.each(cs, function(i, column) {
			var falign = '', // footer align style
			style = '', class_ = sprintf(' class="%s"', column['class']);

			if (!column.visible) {
				return;
			}

			if (that.options.cardView && (!column.cardVisible)) {
				return;
			}

			falign = sprintf('text-align: %s; ', column.falign ? column.falign
					: column.align);
			style = sprintf('vertical-align: %s; ', column.valign);
			var widthStr = "";
			if (column.width != undefined) {
				widthStr = " width=" + column.width + " ";
			}
			html.push('<td', widthStr, class_, sprintf(' style="%s"', falign
					+ style), '>');
			html.push('<div class="th-inner">');

			html.push(calculateObjectValue(column, column[fn], [ data,
					that.aggsData ], '&nbsp;')
					|| '&nbsp;');

			html.push('</div>');
			html.push('<div class="fht-cell"></div>');
			html.push('</div>');
			html.push('</td>');
		});
		html.push("</tr>");
		return html;
	}

	var resetFooterFn = BootstrapTable.prototype.resetFooter;

	BootstrapTable.prototype.resetFooter = function() {

		if (!this.options.showPageSummary && !this.options.showAllSummary) {
			resetFooterFn.call(this);
			return;
		}

		var that = this;

		if (!this.options.showFooter || this.options.cardView) { // do
			// nothing
			return;
		}

		if (!this.options.cardView && this.options.detailView) {
			html
					.push('<td><div class="th-inner">&nbsp;</div><div class="fht-cell"></div></td>');
		}
		var html = "";
		if (this.options.showPageSummary) {
			var h1 = renderRow(this.columns, "pageSummaryFormat", that);
			html += h1.join('');
		}
		if (this.options.showAllSummary) {
			var h2 = renderRow(this.columns, "allSummaryFormat", that);
			html += h2.join('');
		}
		this.$tableFooter.html("<table><tbody>" + html + "</tbody></table>");
		clearTimeout(this.timeoutFooter_);
		this.timeoutFooter_ = setTimeout($.proxy(this.fitFooter, this),
				this.$el.is(':hidden') ? 100 : 0);
	};

	BootstrapTable.prototype.onSort = function(event) {
		var $this = event.type === "keypress" ? $(event.currentTarget) : $(
				event.currentTarget).parent(), $this_ = this.$header.find('th')
				.eq($this.index());

		this.$header.add(this.$header_).find('span.order').remove();

		if (this.options.sortName === $this.data('field')) {
			this.options.sortOrder = this.options.sortOrder === 'asc' ? 'desc'
					: 'asc';
		} else {
			this.options.sortName = $this.data('field');
			this.options.sortOrder = $this.data('order') === 'asc' ? 'desc'
					: 'asc';
		}
		this.trigger('sort', this.options.sortName, this.options.sortOrder);

		$this.add($this_).data('order', this.options.sortOrder);

		// Assign the correct sortable arrow
		this.getCaret();

		if (this.options.sidePagination === 'server'
				&& this.options.sortType != 'local') {
			this.initServer(this.options.silentSort);
			return;
		}

		this.initSort();
		this.initBody();
	};

})();

// 对Date的扩展，将 Date 转化为指定格式的String
// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
// 例子：
// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423
// (new Date()).Format("yyyy-M-d h:m:s.S") ==> 2006-7-2 8:9:4.18
Date.prototype.format = function(fmt) {
	var o = {
		"M+" : this.getMonth() + 1, // 月份
		"d+" : this.getDate(), // 日
		"h+" : this.getHours(), // 小时
		"m+" : this.getMinutes(), // 分
		"s+" : this.getSeconds(), // 秒
		"q+" : Math.floor((this.getMonth() + 3) / 3), // 季度
		"S" : this.getMilliseconds()
	// 毫秒
	};
	if (/(y+)/.test(fmt))
		fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "")
				.substr(4 - RegExp.$1.length));
	for ( var k in o)
		if (new RegExp("(" + k + ")").test(fmt))
			fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k])
					: (("00" + o[k]).substr(("" + o[k]).length)));
	return fmt;
}