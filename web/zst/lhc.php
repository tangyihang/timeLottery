<?php
ob_start('ob_output');
function ob_output($html) {
    // 一些用户喜欢使用windows笔记本编辑文件，因此在输出时需要检查是否包含BOM头
    if (ord(substr($html, 0, 1)) === 239 && ord(substr($html, 1, 2)) === 187 && ord(substr($html, 2, 1)) === 191) {
        $html = substr($html, 3);
    }

    // gzip输出
    if (
        !headers_sent() && // 如果页面头部信息还没有输出
        extension_loaded("zlib") && // 而且zlib扩展已经加载到PHP中
        array_key_exists('HTTP_ACCEPT_ENCODING', $_SERVER) &&
        stripos($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip") !== false// 而且浏览器说它可以接受GZIP的页面
    ) {
        $html = gzencode($html, 3);
        header('Content-Encoding: gzip');
        header('Vary: Accept-Encoding');
    }
    header('Content-Length: ' . strlen($html));
    return $html;
}
require '../xingcai_config.php';
$id = array('34');
//$id=array('1','6','9','10','12','14','26','15','16','34','20','7','5','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','85','86','87');
$pgsid = array('30', '50', '80', '100', '120', '200', '300', '');
include dirname(__FILE__) . "/inc/comfunc.php";
//此处设置彩种id
$typeid = intval($_GET['typeid']);
if (!in_array($typeid, $id)) {
    echo "<script>alert('当前彩种暂没有走势图')</script>";
    $typeid = 1;
}
if (!$typeid) {
    $typeid = 14;
}

//每页默认显示
$pgs = intval($_GET['pgs']);
if (!in_array($pgs, $pgsid)) {
    die("pgs error");
}

if (!$pgs) {
    $pgs = 30;
}

//当前页面
$page = intval($_GET['page']);
if (!$page) {
    $page = 1;
}

//传参
$toUrl  = "?page=";
$params = http_build_query($_REQUEST, '', '&');
if (!$mydb) {
    $mydb = new MYSQL($dbconf);
}

$gRs = $mydb->row($conf['db']['prename'] . "type", "shortName", "id=" . $typeid);
if ($gRs) {
    $shortName = $gRs[0][0];
}

$fromTime = $_GET['fromTime'];
$toTime   = $_GET['toTime'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:esun=""><head>
<title>喜羊羊彩游戏平台  - 查看历史号码走势  </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/line.css"  rel="stylesheet" type="text/css">

<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.17.1.23"></script>
<script language="javascript" type="text/javascript" src="js/line.js"></script>

<script type="text/javascript" src="js/layui.js"></script>
<script type="text/javascript">window.onerror=function(){return true;}</script>
<script language="javascript">
fw.onReady(function(){
	var nols = $(".ball04,.ball03");
	$("#no_miss").click(function(){

		var checked = $(this).attr("checked");
		$.each(nols,function(i,n){
			if(checked==true || checked=='checked'){
				n.style.display='none';
			}else{
				n.style.display='block';
			}
		});
	});

	//切换漏号分析
	$('.lhfx_tit').hover(function(){
		$('.lhfx_lotterylist').show();
		$('.lhfx_lotterylist').unbind().hover(function(){
		},function(){
			$(this).hide();
		});
	},function(){});
});
function resize(){
    window.onresize = func;
    function func(){
        window.location.href=window.location.href;
    }
}
$(function(){
	$(".datetxt").datepicker({ onSelect: function(dateText, inst) {$(this).val(dateText);} });
})
</script>
<script>
layui.use('laydate', function(){
  var laydate = layui.laydate;

  var start = {
    min: laydate.now()
    ,max: '2099-06-16 23:59:59'
    ,istoday: false
    ,choose: function(datas){
      end.min = datas; //开始日选好后，重置结束日的最小日期
      end.start = datas //将结束日的初始值设定为开始日
    }
  };

  var end = {
    min: laydate.now()
    ,max: '2099-06-16 23:59:59'
    ,istoday: false
    ,choose: function(datas){
      start.max = datas; //结束日选好后，重置开始日的最大日期
    }
  };

  document.getElementById('LAY_demorange_s').onclick = function(){
    start.elem = this;
    laydate(start);
  }
  document.getElementById('LAY_demorange_e').onclick = function(){
    end.elem = this
    laydate(end);
  }

});
</script>

<body style="background:none;">
<div id="searchBox" style="background: #f8f8f8; padding:10px 0;">
	<div class="lhfx_tit"><span><?=$shortName?></span><span class="showAll"></span>基本走势</div>
    <div class="secondary_tabs">
        <ul>
            <li data="num_30" class="hover"><a href="?typeid=<?=$typeid?>&pgs=30" class="ml10<?php if ($pgs == 30) {
    echo ' on';
}
?>" target="_self">最近30期</a></li>
            <li data="num_50"><a href="?typeid=<?=$typeid?>&pgs=50" class="ml10<?php if ($pgs == 50) {
    echo ' on';
}
?>" target="_self">最近50期</a></li>
            <li data="num_100"><a href="?typeid=<?=$typeid?>&pgs=80" class="ml10<?php if ($pgs == 80) {
    echo ' on';
}
?>" target="_self">最近80期</a></li>
			<li data="num_100"><a href="?typeid=<?=$typeid?>&pgs=200" class="ml10<?php if ($pgs == 200) {
    echo ' on';
}
?>" target="_self">最近200期</a></li>
			<li data="num_100"><a href="?typeid=<?=$typeid?>&pgs=300" class="ml10<?php if ($pgs == 300) {
    echo ' on';
}
?>" target="_self">最近300期</a></li>
        </ul>
    </div>
    	<div class="lhfx_search_time">
		<form action="" method="get">
		<input type="hidden" name="typeid" value="<?=$typeid?>" />
            <input type="hidden" name="pgs" value="<?=$pgs?>" />
		时间范围：
		<input type="text" value="<?=$fromTime?>" name="fromTime" onclick="layui.laydate({elem: this, festival: true})" class="time_input">
		<span class="image"></span>
		<label>至</label>
		<input type="text" value="<?=$toTime?>" onclick="layui.laydate({elem: this, festival: true})" name="toTime" class="time_input">
		<span class="image"></span>
		<input type="submit" value="查询" id="showissue1" class="time_btn">
		</form>
	</div>
	<div class="clearfix"></div>
</div>
<!--<div class="wo_choose">
<span>标注形式选择</span>
    <input type="checkbox" name="checkbox2" value="checkbox" id="has_line" class="no_bk-bg"><label for="has_line">显示走势折线</label>
    <input type="checkbox" name="checkbox" value="checkbox" id="no_miss" onclick="toggleMiss();" /><label for="has_line">不带遗漏数据</label>
	</div>
-->





<script src="lhc/jquery-1.11.2.min.js"></script>
<script src="lhc/_user_.js"></script>
<link href="lhc/_live_games.css" rel="stylesheet">
<link href="lhc/code.css" rel="stylesheet" type="text/css">
<link href="lhc/g_HK6.css" rel="stylesheet" type="text/css">
<link href="lhc/color_trend.css" rel="stylesheet" type="text/css">
<link href="lhc/standard.css" rel="stylesheet">
<link href="lhc/jquery.mCustomScrollbar.css" rel="stylesheet">
<link href="lhc/table.css" rel="stylesheet">
<link href="lhc/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="lhc/buttons.css">
<link rel="stylesheet" type="text/css" href="lhc/calendar-newbee.css">
<link href="lhc/dialog.css" rel="stylesheet" type="text/css">
<link href="lhc/foot.css" rel="stylesheet" type="text/css">
<style>
    body{font-size:12px;}
</style>
<script>
    try{
        //下面是静态资源url的前缀
        if( typeof(_prefixURL)!="object" )
        {
            window._prefixURL = {
                statics:"/fhcp/statics"?"/fhcp/statics":"/fhcp/statics",
                common:"/common/statics"?"/common/statics":"/common/statics"
            };
        }
    }catch (e) { console.log(e);  }
</script>
<script type="text/javascript" src="lhc/_user_.js"></script>
<script type="text/javascript" src="lhc/libs.js"></script>
<script type="text/javascript" src="lhc/skin.js"></script>
<style>
    /*out*/
    .ele-game-wrap{width:100%!important;}
    /* .ele-game-wrap{background-color:rgba(0,0,0,0);}*/
    .sixOnColr{background: rgb(234, 114, 26);color: rgb(255, 255, 255)!important;}
</style>
<div id="ele-game-wrap" class="ele-game-wrap  clearfix " data-mcs-theme="minimal">
    <div id="ele-live-wrap" class="ele-live-wrap" style="overflow: auto">
        <!-- 开奖结果 -->
        <div class="lot-six-bg">
            <!-- 六合彩开奖内容 -->
            <div id="drawTable">
                <table class="list table_ball table">
                    <script type="text/javascript" src="lhc/hk6Base.js"></script>
                    <thead>
                    <tr>
                        <th rowspan="2">期数</th>
                        <th rowspan="2">开奖时间</th>
                        <th rowspan="2">正码一</th>
                        <th rowspan="2">正码二</th>
                        <th rowspan="2">正码三</th>
                        <th rowspan="2">正码四</th>
                        <th rowspan="2">正码五</th>
                        <th rowspan="2">正码六</th>
                        <th rowspan="2">特码</th>
                        <th colspan="4">总和</th>
                        <th colspan="5">特码</th>
                    </tr>
                    <tr>
                        <th>总数</th>
                        <th>单双</th>
                        <th>大小</th>
                        <th>七色波</th>
                        <th>单双</th>
                        <th>大小</th>
                        <th>合单双</th>
                        <th>合大小</th>
                        <th>大小尾</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
if ($fromTime) {
    $fromTime = strtotime($fromTime);
}

if ($toTime) {
    $toTime = strtotime($toTime) + 24 * 3600;
}

$pg = trim($_REQUEST["page"]);
if (!$pg) {$pg = 1;}
if (!$pgs) {$pgs = 30;}
$tableStr  = $conf['db']['prename'] . "data";
$tableStr2 = $conf['db']['prename'] . "data a";
$fieldsStr = "time, number, data";

$fieldsStr2 = "a.time, a.number, a.data";
$whereStr   = " type=$typeid ";
$whereStr2  = " a.type=$typeid ";
if ($fromTime && $toTime) {
    $whereStr .= " and time between $fromTime and $toTime";
    $whereStr2 .= " and a.time between $fromTime and $toTime";
} elseif ($fromTime) {
    $whereStr .= ' and time>=' . $fromTime;
    $whereStr2 .= ' and a.time>=' . $fromTime;
} elseif ($toTime) {
    $whereStr .= ' and time<' . $toTime;
    $whereStr2 .= ' and a.time<' . $toTime;
} else {}
$orderStr = " order by a.id desc"; //排序
//$data=array_reverse($data);//排序
$totalNumber = $mydb->row_count($tableStr, $whereStr);

$red   = array('01', '02', '07', '08', '12', '13', '18', '19', '23', '24', '29', '30', '34', '35', '40', '45', '46');
$blue  = array('03', '04', '09', '10', '14', '15', '20', '25', '26', '31', '36', '37', '41', '42', '47', '48');
$green = array('05', '06', '11', '16', '17', '21', '22', '27', '28', '32', '33', '38', '39', '43', '44', '49');

$weekdate = array(0 => '日', 1 => '一', 2 => '二', 3 => '三', 4 => '四', 5 => '五', 6 => '六');
if ($totalNumber > 0) {

    $countcount = 0;
    $perNumber  = $pgs; //每页显示的记录数
    $page       = $pg; //获得当前的页面值
    if (!isset($page)) {
        $page = 1;
    }

    $totalPage  = ceil($totalNumber / $perNumber); //计算出总页数
    $startCount = ($page - 1) * $perNumber; //分页开始,根据此方法计算出开始的记录
    $data       = $mydb->row($tableStr2, $fieldsStr2, $whereStr2 . ' ' . $orderStr . " limit $startCount,$perNumber");
    if ($data) {
        foreach ($data as $var) {

            $red1   = 0;
            $blue1  = 0;
            $green1 = 0;

            $dArry     = explode(",", $var[2]);
            $var['d1'] = $dArry[0];
            $var['d2'] = $dArry[1];
            $var['d3'] = $dArry[2];
            $var['d4'] = $dArry[3];
            $var['d5'] = $dArry[4];
            $var['d6'] = $dArry[5];
            $var['d7'] = $dArry[6];

            for ($j = 0; $j < 7; $j++) {
                if (in_array($dArry[$j], $red)) {
                    $red1++;
                } elseif (in_array($dArry[$j], $blue)) {
                    $blue1++;
                } elseif (in_array($dArry[$j], $green)) {
                    $green1++;
                }
            }

            if ($red1 > $blue1 && $red1 > $green1) {
                $total_type3     = '红波';
                $total_type3_css = 'G7SB_R';
            }

            if ($blue1 > $red1 && $blue1 > $green1) {
                $total_type3     = '蓝波';
                $total_type3_css = 'G7SB_B';
            }
            if ($green1 > $red1 && $green1 > $blue1) {
                $total_type3     = '绿波';
                $total_type3_css = 'G7SB_G';
            }

            if (($green1 == $red1 && $green1 > $blue1) || ($green1 == $blue1 && $green1 > $red1) || ($red1 == $blue1 && $red1 > $green1)) {
                $total_type3     = '和局';
                $total_type3_css = '';
            }

            $total           = $var['d1'] + $var['d2'] + $var['d3'] + $var['d4'] + $var['d5'] + $var['d6'] + $var['d7'];
            $total_type1     = $total % 2 == 0 ? '总和双' : '总和单';
            $total_type1_css = $total % 2 == 0 ? 'GZDS_S' : 'GZDS_D';

            $total_type2     = $total > 160 ? '总和大' : '总和小';
            $total_type2_css = $total > 160 ? 'GZDX_D' : 'GZDX_X';

            $t1     = $var['d7'] % 2 == 0 ? '双' : '单';
            $t1_css = $var['d7'] % 2 == 0 ? 'GDS_S' : 'GDS_D';

            $t2     = $var['d7'] > 25 ? '大' : '小';
            $t2_css = $var['d7'] > 25 ? 'GDX_D' : 'GDX_X';

            $t_t    = intval(substr($var['d7'], 0, 1)) + intval(substr($var['d7'], 1, 1));
            $t3     = $t_t % 2 == 0 ? '合双' : '合单';
            $t3_css = $t_t % 2 == 0 ? 'GHDS_S' : 'GHDS_D';

            $t4     = $t_t > 15 ? '合大' : '合小';
            $t4_css = $t_t > 15 ? 'GHDX_D' : 'GHDX_X';

            $t5     = $var['d7'] > 15 ? '尾大' : '尾小';
            $t5_css = $var['d7'] > 15 ? 'GWDX_D' : 'GWDX_X';
            echo '<tr class="">
                        <td class="period">' . $var[1] . '</td>
                        <td class="drawTime">' . date('m-d', $var[0]) . '&nbsp;&nbsp;' . $weekdate[date('w', $var[0])] . '&nbsp;&nbsp;' . date('H:i', $var[0]) . '</td>
                        <td class="name"><span class="b' . $var['d1'] . '">' . $var['d1'] . '</span>
                            <script>document.write(get_animal_by_ball_time(\'' . $var['d1'] . '\', \'' . date('Y-m-d', $var[0]) . '\'));</script></td>
                        <td class="name"><span class="b' . $var['d2'] . '">' . $var['d2'] . '</span>
                            <script>document.write(get_animal_by_ball_time(\'' . $var['d2'] . '\', \'' . date('Y-m-d', $var[0]) . '\'));</script>
                        </td>
                        <td class="name"><span class="b' . $var['d3'] . '">' . $var['d3'] . '</span>
                            <script>document.write(get_animal_by_ball_time(\'' . $var['d3'] . '\', \'' . date('Y-m-d', $var[0]) . '\'));</script>
                        </td>
                        <td class="name"><span class="b' . $var['d4'] . '">' . $var['d4'] . '</span>
                            <script>document.write(get_animal_by_ball_time(\'' . $var['d4'] . '\', \'' . date('Y-m-d', $var[0]) . '\'));</script>
                        </td>
                        <td class="name"><span class="b' . $var['d5'] . '">' . $var['d5'] . '</span>
                            <script>document.write(get_animal_by_ball_time(\'' . $var['d5'] . '\',\'' . date('Y-m-d', $var[0]) . '\'));</script>
                        </td>
                        <td class="name"><span class="b' . $var['d6'] . '">' . $var['d6'] . '</span>
                            <script>document.write(get_animal_by_ball_time(\'' . $var['d6'] . '\', \'' . date('Y-m-d', $var[0]) . '\'));</script>
                        </td>
                        <td class="name"><span class="b' . $var['d7'] . '">' . $var['d7'] . '</span>
                            <script>document.write(get_animal_by_ball_time(\'' . $var['d7'] . '\', \'' . date('Y-m-d', $var[0]) . '\'));</script>
                        </td>
                        <td class="other1">' . $total . '</td>

                        <td class="other ' . $total_type1_css . '">' . $total_type1 . '</td>

                        <td class="other ' . $total_type2_css . '">' . $total_type2 . '</td>

                        <td class="other ' . $total_type3_css . '">' . $total_type3 . '</td>


                        <td class="other ' . $t1_css . '">' . $t1 . '</td>

                        <td class="other ' . $t2_css . '">' . $t2 . '</td>

                        <td class="other ' . $t3_css . '">' . $t3 . '</td>

                        <td class="ohter ' . $t4_css . '">' . $t4 . '</td>

                        <td class="other ' . $t5_css . '">' . $t5 . '</td>
                    </tr>';
        }
    }

}
?>
                    </tbody></table>

            </div>
        </div>
    </div>
</div>

<div class="lhfx_lotterylist">
    <dl>
        <dt>快3</dt>
        <dd><a href="/zst/k3.php?typeid=63">澳门快三</a></dd>
        <!--<dd><a href="/zst/k3.php?typeid=79">江苏快三</a></dd>
        <dd><a href="/zst/k3.php?typeid=81">安徽快三</a></dd>
        <dd><a href="/zst/k3.php?typeid=82">广西快三</a></dd>
        <dd><a href="/zst/3d.php?typeid=9">福彩3D</a></dd>
        <dd><a href="/zst/3d.php?typeid=10">排列三</a></dd>-->
    </dl>
    <dl>
        <dt>时时彩</dt>
        <dd><a href="/zst/index.php?typeid=86">三分时时彩</a></dd>
        <dd><a href="/zst/index.php?typeid=1 ">重庆时时彩</a></dd>
        <!--<dd><a href="/zst/index.php?typeid=12">新疆时时彩</a></dd>
        <dd><a href="/zst/index.php?typeid=60">天津时时彩</a></dd>
        <dd><a href="/zst/index.php?typeid=87">上海时时彩</a></dd>
        <dd><a href="/zst/index.php?typeid=14">河内5分彩</a></dd>
        <dd><a href="/zst/index.php?typeid=5">河内1分彩</a></dd>-->
    </dl>
    <!--<dl>
        <dt>11选5</dt>
        <dd><a href="/zst/11x5.php?typeid=7">山东11选5</a></dd>
        <dd><a href="/zst/11x5.php?typeid=16">江西11选5</a></dd>
        <dd><a href="/zst/11x5.php?typeid=6">广东11选5</a></dd>
        <dd><a href="/zst/11x5.php?typeid=15">上海11选5</a></dd>
    </dl>-->
    <!-- <dl>
        <DT>PC蛋蛋</DT>
        <dd><a href="/zst/index.php?typeid=83">北京28</a></dd>
        <dd><a href="/zst/index.php?typeid=80">幸运28</a></dd>
    </dl> -->
    <dl>
        <dt>PK10</dt>
        <dd><a href="/zst/pk10.php?typeid=20">北京PK10</a></dd>
        <dd><a href="/zst/pk10.php?typeid=85">三分PK10</a></dd>
    </dl>
    <!-- <dl>
        <dt>六合彩</dt>
        <dd><a href="/zst/lhc.php?typeid=34">六合彩</a></dd>
    </dl> -->
</div>
</body>
</html>
