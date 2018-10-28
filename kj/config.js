// 彩票开奖配置
var cheerio = require('cheerio');
var querystring = require('querystring');
var myhost = 'www.222345678.com';


var req_arg = {
  'year': '2018',
  'type': '1',
}
var date = new Date();
var year = date.getFullYear();
req_arg['year'] = year;
var lhc_query = querystring.stringify(req_arg);
// console.log(lhc_query);
var lhc_query_len = Buffer.byteLength(lhc_query);

exports.cp = [
  { //
    title: '360彩票重庆时时彩', //
    source: '360彩票', //
    name: 'cqssc', //
    enable: true, //
    timer: 'cqssc1', //
    option: { //
      host: 'api.api68.com', //
      timeout: 50000, //重
      path: '/CQShiCai/getBaseCQShiCaiList.do?lotCode=10002', //庆
      headers: { //时
        "User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) " //时
      } //彩
    }, //
    parse: function (str) {
      try {
        var tmp = JSON.parse(str);
        var tmpdata = tmp.result.data[0];

        var number = String(tmpdata.preDrawIssue);
        var numstr = number.substr(0, 8) + '-' + number.substr(8, 3);

        if (tmpdata) {
          return {
            type: 1,
            time: tmpdata.preDrawTime,
            number: numstr,
            data: tmpdata.preDrawCode
          };
        }
      } catch (err) {
        throw ('--------360彩票重庆时时彩解析数据不正确');
      }
    }
  },
  { //
    title: '澳门快三', //
    source: '杏彩', //
    name: 'amk3', //
    enable: true, //
    timer: 'amk3', //
    option: { //
      host: myhost, //
      timeout: 50000, //
      path: '/index.php/xingcai/xcamk3', //
      headers: {
        "User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) " //
      }
    },
    parse: function (str) {
      try {
        str = str.substr(0, 200); //
        var reg = /<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; //
        var m; //杏
        if (m = str.match(reg)) { //彩
          return { //系
            type: 63, //统
            time: m[3], //彩
            number: m[1], //
            data: m[2] //
          }; //
        } //
      } catch (err) { //
        throw ('澳门快三解析数据不正确'); //
      } //
    } //
  },
  { //
    title: '3分彩时时彩', //
    source: '杏彩', //
    name: 'sfssc', //
    enable: true, //
    timer: 'sfssc', //
    option: { //
      host: myhost, //
      timeout: 50000, //
      path: '/index.php/xingcai/xcsfssc', //
      headers: { //
        "User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) " //
      } //
    }, //
    parse: function (str) { //
      try { //
        str = str.substr(0, 200); //
        var reg = /<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; //
        var m; //
        if (m = str.match(reg)) { //

          return { //
            type: 86, //
            time: m[3], //
            number: m[1], //
            data: m[2] //
          }; //
        } //
      } catch (err) { //杏
        throw ('3分彩时时彩解析数据不正确'); //彩
      } //系
    } //统
  }, //
  { //
    title: '北京pk10',
    source: '北京福彩网',
    name: 'bjpk10',
    enable: true,
    timer: 'bjpk10',
    option: {
      host: 'api.api68.com',
      timeout: 50000,
      path: '/pks/getPksHistoryList.do?lotCode=10001',
      headers: {
        "User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
      }
    },
    parse: function (str) {
      try {

        var tmp = JSON.parse(str);
        var tmpdata = tmp.result.data[0];
        var number = String(tmpdata.preDrawIssue);

        if (tmpdata) {
          return {
            type: 20,
            time: tmpdata.preDrawTime,
            number: number,
            data: tmpdata.preDrawCode
          };
        }
      } catch (err) { //拾
        throw ('北京福彩网pk10解析数据不正确'); //
      } //
    } //
  }, //
  { //
    title: '幸运28', //
    source: '杏彩', //
    name: 'xy28', //
    enable: true, //
    timer: 'xy28', //
    option: { //杏
      host: myhost, //彩
      timeout: 50000, //系
      path: '/index.php/xingcai/xy28', //统
      headers: { //彩
        "User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) " //
      } //
    }, //
    parse: function (str) { //
      try { //
        str = str.substr(0, 200); //
        var reg = /<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; //
        var m; //
        if (m = str.match(reg)) { //
          return { //
            type: 80, //
            time: m[3], //
            number: m[1], //
            data: m[2] //
          }; //
        } //
      } catch (err) { //
        throw ('幸运28解析数据不正确'); //
      } //
    } //
  }, //
  {
    title: '六合彩', //
    source: '1680118.com', //
    name: 'hklhc', //
    enable: true, //
    timer: 'hklhc', //
    stype: 34, //
    option: { //
      hostname: "1680660.com",
      port: 80,
      timeout: 50000, //香
      method: 'POST',
      postdata: lhc_query,
      path: '/smallSix/findSmallSixHistory.do', //港
      headers: { //彩
        'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Length': lhc_query_len,
      }
    },
    parse: function (str) { //
      // console.log(str);
      try {
        var tmp = JSON.parse(str);
        var tmpdata = tmp.result.data.bodyList[0];

        var number = String(tmpdata.preDrawDate);
        var timestamp = Date.parse(new Date(tmpdata.preDrawDate));
        number = number.replace('-', '');
        number = number.replace('-', '');

        if (tmpdata) {
          return {
            type: 34,
            time: tmpdata.preDrawDate,
            number: number,
            data: tmpdata.preDrawCode
          };
        }
      } catch (err) {
        throw ('--------六合彩获取失败!!!');
      }
    },

  },
  {
    title: '三分pk10', //
    source: '杏彩', //
    name: 'twpk10', //
    enable: true, //
    timer: 'twpk10', //
    option: { //
      host: myhost, //
      timeout: 50000, //
      path: '/index.php/xingcai/xcsfpk10', //
      headers: { //
        "User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) " //
      } //
    }, //
    parse: function (str) { //
      try { //
        str = str.substr(0, 200); //
        var reg = /<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; //
        var m;
        if (m = str.match(reg)) {
          return {
            type: 85,
            time: m[3],
            number: m[1],
            data: m[2]
          };
        }
      } catch (err) {
        throw ('三分pk10解析数据不正确');
      }
    }
  },

];

// 出错时等待 15                                                                                                
exports.errorSleepTime = 15;

// 重启时间间隔，以小时为单位，0为不重启
//exports.restartTime=0.4;
exports.restartTime = 0;

exports.submit = {

  host: 'localhost',
  path: '/index.php/dataSource/kj'
}

exports.dbinfo = {
  host: '127.0.0.1',
  user: 'timelottery',
  password: 'NSxehHCGPNRSFzFk',
  database: 'timelottery',
  'multipleStatements': true
}

global.log = function (log) {
  var date = new Date();
  console.log('[' + date.toDateString() + ' ' + date.toLocaleTimeString() + '] ' + log)
}

function getFromXJFLCPWeb(str, type) {
  str = str.substr(str.indexOf('<td><a href="javascript:detatilssc'), 300).replace(/[\r\n]+/g, '');

  var reg = /(\d{10}).+(\d{2}\:\d{2}).+<p>([\d ]{9})<\/p>/,
    match = str.match(reg);

  if (!match) throw new Error('数据不正确');
  //console.log('期号：%s，开奖时间：%s，开奖数据：%s', match[1], match[2], match[3]);

  try {
    var data = {
      type: type,
      time: match[1].replace(/^(\d{4})(\d{2})(\d{2})\d{2}/, '$1-$2-$3 ') + match[2],
      number: match[1].replace(/^(\d{8})(\d{2})$/, '$1-$2'),
      data: match[3].split(' ').join(',')
    };
    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }
}

function getCQsscGw(str, type, gameName) {

  str = str.substr(str.indexOf('name="description"'), 100).replace(/[\r\n]+/g, '');
  var reg = new RegExp(gameName + "第(\\d+-\\d+)期开奖号码:(\\d+),开奖时间", "");

  var match = str.match(reg);

  if (!match) throw new Error('-------------------------' + gameName + '官网数据不正确');

  var ano = match[1];

  var data = match[2] + '';
  var data = data.split("").join(',');

  var myDate = new Date();
  var year = myDate.getFullYear(); //年
  var month = myDate.getMonth() + 1; //月
  var day = myDate.getDate(); //日
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var mytime = year + "-" + month + "-" + day + " " + myDate.toLocaleTimeString();

  try {
    var data = {
      type: type,
      time: mytime,
      number: ano,
      data: data
    }

    //	console.log(gameName);
    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析' + gameName + '官网数据失败');
  }
}

function getFrom9800(str, type) {

  console.log(str);
  str = str.substr(str.indexOf('bai12'), 560);

  var reg = /<TD bgColor=#f6f6f6 align="center">(\d+)<\/TD>[\s\S].*?<TD align=middle>(.*?)<\/TD>[\s\S].*?<TD align=middle>[\s\S].*?<font color="#FF0000"><b>(\d+) (\d+) (\d+) (\d+) (\d+) (\d+)<\/b><\/font>[\s\S].*?\+ <b><font color="#009933">(\d+)<\/font><\/b>/,
    match = str.match(reg);

  var myDate = new Date();
  var year = myDate.getFullYear(); //年
  var month = myDate.getMonth() + 1; //月
  var day = myDate.getDate(); //日
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var mytime = match[2] + " " + myDate.toLocaleTimeString();
  try {
    var data = {
      type: type,
      time: mytime,
      number: match[1]
    }

    data.data = match[3] + "," + match[4] + "," + match[5] + "," + match[6] + "," + match[7] + "," + match[8] + "," + match[9];

    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }

}

function getCQssc(str, type) {

  str = str.substr(str.indexOf('id="n_cqssc"'), 700).replace(/[\r\n]+/g, '');

  var reg = /value="(\d)"/g;

  //var reg=/<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
  var data = '';
  while (reg.test(str)) {
    data += RegExp.$1 + ",";

  }

  if (data.length == 0) {
    throw new Error('重庆时时彩数据不正确');

  }
  data = data.substr(0, data.length - 1);
  reg = /<td class="qihao">(\d+)[\s\S]*?<\/td>/;
  var match = str.match(reg);
  if (!match) throw new Error('重庆时时彩数据不正确');

  var myDate = new Date();
  var year = myDate.getFullYear(); //年
  var month = myDate.getMonth() + 1; //月
  var day = myDate.getDate(); //日
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var mytime = year + "-" + month + "-" + day + " " + myDate.toLocaleTimeString();
  var ano = match[1];

  if (ano.length == 7) ano = year + ano.replace(/(\d{8})(\d{3})/, '$1-$2');
  if (ano.length == 6) ano = year + ano.replace(/(\d{4})(\d{2})/, '$1-0$2');
  if (ano.length == 9) ano = '20' + ano.replace(/(\d{6})(\d{2})/, '$1-$2');
  if (ano.length == 10) ano = ano.replace(/(\d{8})(\d{2})/, '$1-0$2');
  var mynumber = ano.replace(/(\d{8})(\d{3})/, '$1-$2');

  try {
    var data = {
      type: type,
      time: mytime,
      number: mynumber,
      data: data
    }

    return data;
  } catch (err) {
    throw ('解析重庆时时彩数据失败');
  }
}

function getFromshishicai(str, type) {
  str = str.substr(str.indexOf('<th class="borRB">'), 380);
  var reg = /<th class=".*?">[\s\S]*?<\/th>[\s\S]*?<th class=".*?">[\s\S]*?<\/th>[\s\S]*?<tr><td class=".*?">([\d+\-]+?)<\/td><td class=".*?">(\d+)<\/td><\/tr>/,
    match = str.match(reg);
  var myDate = new Date();
  var year = myDate.getFullYear(); //年
  var month = myDate.getMonth() + 1; //月
  var day = myDate.getDate(); //日
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var mytime = year + "-" + month + "-" + day + " " + myDate.toLocaleTimeString();
  try {
    var data = {
      type: type,
      time: mytime,
      number: match[1],
      data: match[2].split('').join(',')
    }
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }
}

function getFromCaileleWeb(str, type, slen) {
  if (!slen) slen = 380;
  str = str.substr(str.indexOf('<tr bgcolor="#FFFAF3">'), slen);
  //console.log(str);
  var reg = /<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\- \:]+)<\/td>[\s\S]*?<td.*?>((?:[\s\S]*?<div class="ball_yellow">\d+<\/div>){3,5})\s*<\/td>/,
    match = str.match(reg);
  if (match.length > 1) {

    if (match[1].length == 7) match[1] = '2014' + match[1].replace(/(\d{4})(\d{3})/, '$1-$2');
    if (match[1].length == 8) {
      if (parseInt(type) != 11) {
        match[1] = '20' + match[1].replace(/(\d{6})(\d{2})/, '$1-0$2');
      } else {
        match[1] = '20' + match[1].replace(/(\d{6})(\d{2})/, '$1-$2');
      }
    }
    if (match[1].length == 9) match[1] = '20' + match[1].replace(/(\d{6})(\d{2})/, '$1-$2');
    if (match[1].length == 10) match[1] = match[1].replace(/(\d{8})(\d{2})/, '$1-0$2');
    var mynumber = match[1].replace(/(\d{8})(\d{3})/, '$1-$2');
    try {
      var data = {
        type: type,
        time: match[2],
        number: mynumber
      }

      reg = /<div.*>(\d+)<\/div>/g;
      data.data = match[3].match(reg).map(function (v) {
        var reg = /<div.*>(\d+)<\/div>/;
        return v.match(reg)[1];
      }).join(',');

      //console.log(data);
      return data;
    } catch (err) {
      throw ('解析数据失败');
    }
  }
}

function getFromPK103(str, type) {

  str = str.substr(str.indexOf('<div class="lott_cont">'), 350).replace(/[\r\n]+/g, '');
  // console.log(str);
  var reg = /[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>/,
    match = str.match(reg);
  if (!match) throw new Error('数据不正确');
  //console.log(match);
  try {
    var data = {
      type: type,
      time: match[3],
      number: match[1].replace(/^(\d{8})(\d{2})$/, '$1-$2'),
      data: match[2]
    };
    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }

}

function getFrom360CP(str, type) {

  str = str.substr(str.indexOf('<em class="red" id="open_issue">'), 380);
  //console.log(str);
  var reg = /[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
    match = str.match(reg);
  var myDate = new Date();
  var year = myDate.getFullYear(); //年
  var month = myDate.getMonth() + 1; //月
  var day = myDate.getDate(); //日
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var mytime = year + "-" + month + "-" + day + " " + myDate.toLocaleTimeString();
  //console.log(match);
  if (match.length > 1) {

    if (match[1].length == 7) match[1] = '2014' + match[1].replace(/(\d{4})(\d{3})/, '$1-$2');
    if (match[1].length == 8) match[1] = '20' + match[1].replace(/(\d{6})(\d{2})/, '$1-0$2');
    if (match[1].length == 9) match[1] = '20' + match[1].replace(/(\d{6})(\d{2})/, '$1-$2');
    if (match[1].length == 10) match[1] = match[1].replace(/(\d{8})(\d{2})/, '$1-0$2');
    var mynumber = match[1].replace(/(\d{8})(\d{3})/, '$1-$2');

    try {
      var data = {
        type: type,
        time: mytime,
        number: mynumber
      }

      reg = /<li class=".*?">(\d+)<\/li>/g;
      data.data = match[2].match(reg).map(function (v) {
        var reg = /<li class=".*?">(\d+)<\/li>/;
        return v.match(reg)[1];
      }).join(',');

      //console.log(data);
      return data;
    } catch (err) {
      throw ('解析数据失败');
    }
  }
}

function getFromBDCP(str, type) {

  var rawdata = str.substr(str.indexOf('var latest_draw_result'), 100).replace(/[\r\n]+/g, ''),
    rawnumber = str.substr(str.indexOf('var latest_draw_phase'), 100).replace(/[\r\n]+/g, ''),
    rawtime = str.substr(str.indexOf('var latest_draw_time'), 100).replace(/[\r\n]+/g, ''),
    regdata = /"(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})"/,
    regnumber = /(\d{6})/,
    //regtime=/(\d{4}-\d{2}-\d{2})/,
    regtime = /(\d{4}-\d{2}-\d{2}\W\d{2}:\d{2}:\d{2})/,
    matchdata = rawdata.match(regdata),
    matchnumber = rawnumber.match(regnumber),
    matchtime = rawtime.match(regtime);

  if (!matchdata) throw new Error('数据不正确');
  var data = matchdata[1] + ',' + matchdata[2] + ',' + matchdata[3] + ',' + matchdata[4] + ',' + matchdata[5] + ',' + matchdata[6] + ',' + matchdata[7] + ',' + matchdata[8] + ',' + matchdata[9] + ',' + matchdata[10]
  try {
    var data = {
      type: type,
      time: matchtime[1],
      number: matchnumber[1],
      data: data
    };
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }

}

function getFromPK10(str, type) {

  str = str.substr(str.indexOf('<div class="lott_cont">'), 350).replace(/[\r\n]+/g, '');
  //console.log(str);
  var reg = /<tr class=".*?">[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
    match = str.match(reg);
  if (!match) throw new Error('数据不正确');
  //console.log(match);
  try {
    var data = {
      type: type,
      time: match[3],
      number: match[1],
      data: match[2]
    };
    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }

}

function getFromK8(str, type) {

  str = str.substr(str.indexOf('<div class="lott_cont">'), 450).replace(/[\r\n]+/g, '');
  //console.log(str);
  var reg = /<tr class=".*?">[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
    match = str.match(reg);
  if (!match) throw new Error('数据不正确');
  //console.log(match);
  try {
    var data = {
      type: type,
      time: match[4],
      number: match[1],
      data: match[2] + '|' + match[3]
    };
    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }

}

function getFromCJCPWeb(str, type) {

  //console.log(str);
  str = str.substr(str.indexOf('<table class="qgkj_table">'), 1200);

  //console.log(str);

  var reg = /<tr>[\s\S]*?<td class=".*">(\d+).*?<\/td>[\s\S]*?<td class=".*">([\d\- \:]+)<\/td>[\s\S]*?<td class=".*">((?:[\s\S]*?<input type="button" value="\d+" class=".*?" \/>){3,5})[\s\S]*?<\/td>/,
    match = str.match(reg);

  //console.log(match);

  if (!match) throw new Error('数据不正确');
  try {
    var data = {
      type: type,
      time: match[2],
      number: match[1].replace(/(\d{8})(\d{2})/, '$1-0$2')
    }

    reg = /<input type="button" value="(\d+)" class=".*?" \/>/g;
    data.data = match[3].match(reg).map(function (v) {
      var reg = /<input type="button" value="(\d+)" class=".*?" \/>/;
      return v.match(reg)[1];
    }).join(',');

    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }

}

function getFromCaileleWeb_1(str, type) {
  str = str.substr(str.indexOf('<tbody id="openPanel">'), 120).replace(/[\r\n]+/g, '');

  var reg = /<tr.*?>[\s\S]*?<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\:\- ]+?)<\/td>[\s\S]*?<td.*?>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
    match = str.match(reg);
  if (!match) throw new Error('数据不正确');
  //console.log(match);
  var number, _number, number2;
  var d = new Date();
  var y = d.getFullYear();
  if (match[1].length == 9 || match[1].length == 8) {
    number = '20' + match[1];
  } else if (match[1].length == 7) {
    number = '2014' + match[1];
  } else {
    number = match[1];
  }
  _number = number;
  if (number.length == 11) {
    number2 = number.replace(/^(\d{8})(\d{3})$/, '$1-$2');
  } else {
    number2 = number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');
    _number = number.replace(/^(\d{8})(\d{2})$/, '$10$2');
  }
  try {
    var data = {
      type: type,
      time: _number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ') + match[2],
      number: number2,
      data: match[3]
    };
    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }
}

function getFrom360sd11x5(str, type) {

  str = str.substr(str.indexOf('<em class="red" id="open_issue">'), 380);
  //console.log(str);
  var reg = /[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
    match = str.match(reg);
  var myDate = new Date();
  var year = myDate.getFullYear(); //年
  var month = myDate.getMonth() + 1; //月
  var day = myDate.getDate(); //日
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var mytime = year + "-" + month + "-" + day + " " + myDate.toLocaleTimeString();
  //console.log(mytime);
  //console.log(match);

  if (!match) throw new Error('数据不正确');
  try {
    var data = {
      type: type,
      time: mytime,
      number: match[1].replace(/(\d{8})(\d{2})/, '$1-0$2')
    }

    reg = /<li class=".*?">(\d+)<\/li>/g;
    data.data = match[2].match(reg).map(function (v) {
      var reg = /<li class=".*?">(\d+)<\/li>/;
      return v.match(reg)[1];
    }).join(',');

    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }
}

function getFromCaileleWeb_2(str, type) {

  str = str.substr(str.indexOf('<tbody id="openPanel">'), 500).replace(/[\r\n]+/g, '');
  //console.log(str);
  var reg = /<tr>[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<td>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
    match = str.match(reg);
  if (!match) throw new Error('数据不正确');
  //console.log(match);
  var number, _number, number2;
  var d = new Date();
  var y = d.getFullYear();
  if (match[1].length == 9 || match[1].length == 8) {
    number = '20' + match[1];
  } else if (match[1].length == 7) {
    number = '2014' + match[1];
  } else {
    number = match[1];
  }
  _number = number;
  if (number.length == 11) {
    number2 = number.replace(/^(\d{8})(\d{3})$/, '$1-$2');
  } else {
    number2 = number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');
    _number = number.replace(/^(\d{8})(\d{2})$/, '$10$2');
  }
  try {
    var data = {
      type: type,
      time: _number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ') + match[2],
      number: number2,
      data: match[3]
    };
    //console.log(data);
    return data;
  } catch (err) {
    throw ('解析数据失败');
  }
}