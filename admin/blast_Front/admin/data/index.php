<?php
$para = $_GET;

// 默认取今天的数据
if (isset($para['date'])) {
	$date = strtotime($para['date']);
} else {
	$date = strtotime('00:00');
}
// 取彩种信息
$sql = "select * from {$this->prename}type where id=?";
$typeInfo = $this->getRow($sql, $this->type);

if ($this->type == 34) {
	//六合彩
	$timedb = $this->prename . 'lhc_time';
	$sql = "select * from {$timedb} where type={$this->type} order by actionNo";
} else {
	$timedb = $this->prename . 'data_time';
	$sql = "select * from {$timedb} where type={$this->type} order by actionTime";
}

// 取当前彩种开奖时间表
$times = $this->getPage($sql, $this->page, $this->pageSize);
//print_r($times);

if ($this->type == 34) {
	//六合彩
	$dateString = '';
} else {
	$dateString = date('Y-m-d ');
}

$sql = "select * from {$this->prename}data where type={$this->type} and ";

$sqlAmount = "select sum(b.mode * b.beiShu * b.actionNum) betAmount, count(distinct(b.playedId)) facount, count(distinct(b.username)) useracount, sum(b.bonus) zjAmount, sum(b.fanDianAmount) fanDianAmount from blast_bets b where type={$this->type} and b.isDelete=0";
$all = $this->getRow($sqlAmount);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved"><?=$typeInfo['title']?>开奖数据
		<form class="submit_link wz" action="/index.php/data/index/<?=$this->type?>" target="ajax" call="defaultSearch" dataType="html">
			期数：<input name="actionNo" type="text"  />
			<label style="margin-left:30px;"><a class="item" href="data/index/<?=$this->type?><?=$args[0]['id']?>?date=<?=date('Y-m-d', $date - 24 * 3600)?>">前一天</a></label>
			<label><a class="item" href="data/index/<?=$this->type?><?=$args[0]['id']?>?date=<?=date('Y-m-d', $this->time)?>">今天</a></label>
			<label><a class="item" href="data/index/<?=$this->type?><?=$args[0]['id']?>?date=<?=date('Y-m-d', $date + 24 * 3600)?>">后一天</a></label>
			<label>日期：<input name="date" type="date" /></label>
			<input type="submit" value="查找" class="alt_btn">
			<input type="reset" value="重置条件">
		</form>
		</h3>
	</header>

	<table class="tablesorter" cellspacing="0">
		<thead>
			<tr>
				<th>彩种</th>
				<th>场次</th>
				<th>期数</th>
				<th>日期</th>
				<th>开奖数据</th>
				<th>状态</th>
				<th>开奖时间</th>
				<th>方案总数</th>
				<th>参与人数</th>
				<th>投注金额</th>
				<th>中奖金额</th>
				<th>返点金额</th>
				<th>手动开奖</th>
			</tr>
		</thead>
		<tbody>
			<?php
$count = array();
if ($para['actionNo']) {
	$times = array('data' => array('id' => '--'));
}

if ($this->type == 34) {
	//六合彩
	$dateString = '';
} else {
	$dateString = date('Y-m-d ', $date);
}
foreach ($times['data'] as $var) {
	if ($para['actionNo']) {
		$data = $this->getRow("select * from {$this->prename}data where type={$this->type} and number='{$para['actionNo']}'");
		$date = $data['time'];
		$var = array('actionNo' => '--', 'actionTime' => date('Y-m-d H:i:s', $date));
		$dateString = '';
	} else {
		if ($this->type == 1) {
			// 重庆彩特殊处理
			$number = 1000 + $var['actionNo'];
			if ($var['actionNo'] > 120) {
				$number = date('Ymd-', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd-', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data  where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);
		} else if ($this->type == 5) {
			// 分分彩特殊处理
			$number = 10000 + $var['actionNo'];
			if ($var['actionNo'] > 1440) {
				$number = date('Ymd-', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd-', $date) . substr($number, 1);

			}

			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);
			//echo $sql;

		} else if ($this->type == 12) {
			// 新疆彩特殊处理
			$number = 1000 + $var['actionNo'];
			if ($var['actionNo'] > 96) {
				$number = date('Ymd-', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd', $date) . substr($number, 1);

			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 61 || $this->type == 62 || $this->type == 75 || $this->type == 77) {
//澳门时时彩 台湾时时彩 巴西快乐彩
			$number = 1000 + $var['actionNo'];
			if ($var['actionNo'] > 288) {
				$number = date('Ymd-', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd-', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 16) {
//江西11选5
			$number = 100 + $var['actionNo'];
			if ($var['actionNo'] > 84) {
				$number = date('Ymd-', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd-', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 7) {
//山东11选5
			$number = 100 + $var['actionNo'];
			if ($var['actionNo'] > 78) {
				$number = date('17md', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('17md', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 15) {
//上海11选5
			$number = 100 + $var['actionNo'];
			if ($var['actionNo'] > 90) {
				$number = date('17md', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('17md', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 60) {
//天津时时彩
			$number = 1000 + $var['actionNo'];
			if ($var['actionNo'] > 84) {
				$number = date('Ymd', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 6) {
//澳门时时彩 台湾时时彩 巴西快乐彩
			$number = 100 + $var['actionNo'];
			if ($var['actionNo'] > 84) {
				$number = date('17md', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('17md', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 76) {
//巴西1.5分彩
			// 新疆彩特殊处理
			$number = 1000 + $var['actionNo'];
			if ($var['actionNo'] > 960) {
				$number = date('Ymd-', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd-', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 9 || $this->type == 10) {
// 福彩3D 排列3
			$number = date('Yz', $date);
			$number = substr($number, 0, 4) . substr(substr($number, 4) + 1000, 1);
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 79) {
//江苏快3
			$number = 1000 + $var['actionNo'];
			if ($var['actionNo'] > 82) {
				$number = date('Ymd', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('Ymd', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 71 || $this->type == 72) {
//幸运农场
			$number = 1000 + $var['actionNo'];
			if ($var['actionNo'] > 288) {
				$number = date('17md', strtotime(date('Y-m-d', $date - 1 * 24 * 60 * 60))) . substr($number, 1);
			} else {
				$number = date('17md', $date) . substr($number, 1);
			}
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 11) {
			// 时时乐
			$number = 100 + $var['actionNo'];
			$number = date('Ymd-', $date) . substr($number, 1);
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 20) {
//北京PK10
			$number = 179 * (strtotime(date('Y-m-d', $date)) - strtotime('2007-11-11')) / 3600 / 24 + $var['actionNo'] - 5046;
			//echo $number;die;
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 65) {
//澳门PK10
			$number = 288 * (strtotime(date('Y-m-d', $date)) - strtotime('2007-11-11')) / 3600 / 24 + $var['actionNo'] - 6789;
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 66) {
//台湾PK10
			$number = 288 * (strtotime(date('Y-m-d', $date)) - strtotime('2007-11-11')) / 3600 / 24 + $var['actionNo'] - 4321;
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 78) {
// 北京快乐8
			$number = 179 * (strtotime(date('Y-m-d', $date)) - strtotime('2004-09-19')) / 3600 / 24 + $var['actionNo'] - 3837;
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 73) {
// 澳门快乐8
			$number = 288 * (strtotime(date('Y-m-d', $date)) - strtotime('2004-09-19')) / 3600 / 24 + $var['actionNo'] - 1234;
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 74) {
// 韩国快乐8
			$number = 288 * (strtotime(date('Y-m-d', $date)) - strtotime('2004-09-19')) / 3600 / 24 + $var['actionNo'] - 4567;
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);

		} else if ($this->type == 34) {
			// 六合彩
			$number = 1000 + $var['actionNo'];
			$number = date('Y', $date) . substr($number, -3);
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);
		} else {
			$number = 1000 + $var['actionNo'];
			$number = date('Ymd-', $date) . substr($number, 1);
			$sql = "select * from {$this->prename}data where type={$this->type} and number='$number'";
			$data = $this->getRow($sql);
		}
	}
	if ($data['data']) {
		$amountData = $this->getRow($sqlAmount . " and actionNo=?", $data['number']);
	} else {
		$amountData = array();
	}
	$count['betAmount'] += $amountData['betAmount'];
	$count['zjAmount'] += $amountData['zjAmount'];
	$count['fanDianAmount'] += $amountData['fanDianAmount'];
	?>
			<tr>
				<td><?=$typeInfo['title']?></td>
				<td><?=$var['actionNo']?></td>
				<td><?=$this->iff($this->type == 34, date('Y') . substr((1000 + $var['actionNo']), -3), $this->ifs($data['number'], '--'))?></td>
				<td><?=$this->iff($this->type == 34, date('Y-m-d', strtotime($var['actionTime'])), date('Y-m-d', $date))?></td>
				<td><?=$this->ifs($data['data'], '--')?></td>
				<td><?=$this->iff($data['data'], '已开奖', '未开奖')?></td>
				<td><?=$dateString . $var['actionTime']?></td>
				<td><?=$this->ifs($amountData['facount'], '0')?></td>
				<td><?=$this->ifs($amountData['useracount'], '0')?></td>
				<td><?=$this->ifs($amountData['betAmount'], '--')?></td>
				<td><?=$this->ifs($amountData['zjAmount'], '--')?></td>
				<td><?=$this->ifs($amountData['fanDianAmount'], '--')?></td>
				<td>
				    <?php if ($data['data']) {?>
					<a href="/index.php/data/updatedata/<?=$this->type?>/<?=$var['actionNo']?>/<?=$dateString . $var['actionTime']?>" target="modal" width="340" title="添加开奖号码" modal="true" button="确定:dataAddCode|取消:defaultCloseModal">修改</a>
					<a href="/index.php/data/kj" target="ajax" data-type="<?=$typeInfo['id']?>" data-number="<?=$data['number']?>" data-time="<?=$dateString . $var['actionTime']?>" data-data="<?=$data['data']?>" onajax="setKjData" call="setKj" title="重新对没有开奖的投注开奖">开奖</a>
					<?} else {?>
					<a href="/index.php/data/add/<?=$this->type?>/<?=$var['actionNo']?>/<?=$dateString . $var['actionTime']?>" target="modal" width="450" title="添加开奖号码" modal="true" button="确定:dataAddCode|取消:defaultCloseModal">添加</a>
					<?}?>

				</td>
			</tr>
			<?php }?>
            <tr>
                <td><span class="spn9">本页总结</span></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
				<td>--</td>
                <td>--</td>
                <td><?=$this->ifs($count['betAmount'], '--')?></td>
                <td><?=$this->ifs($count['zjAmount'], '--')?></td>
                <td><?=$this->ifs($count['fanDianAmount'], '--')?></td>
                <td>--</td>
            </tr>
            <tr>
                <td><span class="spn9">全部总结</span></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
				<td>--</td>
                <td>--</td>
                <td><?=$this->ifs($all['betAmount'], '--')?></td>
                <td><?=$this->ifs($all['zjAmount'], '--')?></td>
                <td><?=$this->ifs($all['fanDianAmount'], '--')?></td>
                <td>--</td>
            </tr>

		</tbody>
	</table>
	<footer>
	<?php
if ($para) {
	$rel .= '?' . http_build_query($para, '', '&');
}
$rel = $this->controller . '/' . $this->action . '-{page}/' . $this->type . '?' . http_build_query($_GET, '', '&');
$this->display('inc/page.php', 0, $times['total'], $rel, 'dataPageAction');
?>
	</footer>
</article>

<script>

$('.id_win_type').on('change', function(){
    win_change();
});

function win_change(obj){
	var win_type =  $(obj).find("option:selected").val();
	// console.log(win_type);
	if (win_type == "1"){
        $('.win_type_val').html('');

        var t = "";
        for (var i=3; i <= 18; i++) {
            t += '<div onclick="win_selected_num(this);" style="margin-top:3px;cursor: pointer;margin-left:10px;float:left;text-align:center;width: 20px;height: 20px;border:0.5px solid red; border-radius: 10px;line-height: 20px;">'+
                i+'</div>';
        }
        $('.win_type_val').append(t);

	} else if (win_type == "2"){
		$('.win_type_val').html('');
		var list = ['大', '小', '单', '双'];

		var t = "";
        for (var i=0; i <= list.length-1; i++) {
            t += '<div onclick="win_selected_word(this);" style="margin-top:3px;cursor: pointer;margin-left:10px;float:left;text-align:center;width: 20px;height: 20px;border:0.5px solid red; border-radius: 10px;line-height: 20px;">'+
                list[i]+'</div>';
        }
		$('.win_type_val').append(t);
	}
}


function rand_value(v){
    var t = "";
    var p = v/3;

    if (v == 3) {
        return '1,1,1';
    }

    if (v == 18) {
        return '6,6,6';
    }

    var v1 = v - 6;
    if (v1 > 6 &&  v1 <= 12 ){
    	var min = v1-6;
    	var max = 6 - min;
    	var one_r = Math.round( Math.random()*max )+min;
    } else {
    	var one = v - 2 - 1;
	    if (one > 5) {
	        var one_r = parseInt(Math.round( Math.random()*5 ) )+1;
	    } else {
	        var one_r = parseInt(Math.round( Math.random()*one ) )+1;
	    }
    }

    var v2 = v - one_r;
    if ( v2 > 6){
    	var min = v2-6;
    	var max = 6 - min;
    	var two_r = parseInt(Math.round( Math.random()*max) )+min;
    } else {
    	var two = v - one_r - 1 - 1;
	    if (two > 5) {
	        var two_r = parseInt(Math.round( Math.random()*5) )+1;
	    } else {
	        var two_r = parseInt(Math.round( Math.random()*two) )+1;
	    }
    }

    var three = v - one_r - two_r;
    return one_r+ ',' + two_r + ',' + three;
}



function win_selected_num(obj){
    var v = $(obj).text();
    var num = parseInt(v);

    var r = rand_value(num);
    $('.input_data_v').val(r);
}


function clear_win_selected_word(_word){
   $('.win_type_val').children().each(function(i){
        var color = $(this).css('background-color');
        var word  = $(this).text();
        // console.log(word, _word);
        if (word == _word) {
            $(this).css('background', 'none');
        }
    });
}


function win_selected_word(obj){
    var v = $(obj).text();
    $(obj).css('background-color', 'red');

    var list = {};

    $('.win_type_val').children().each(function(i){
        var color = $(this).css('background-color');
        var word  = $(this).text();
        if (color == 'rgb(255, 0, 0)') {
            list[word] = 'selected';
        } else {
            list[word] = 'none';
        }

    });


    if (list['大'] == 'selected' && list['小'] == 'selected' ){
        if ( v == '大' ){
            clear_win_selected_word('小');
        } else {
            clear_win_selected_word('大');
        }
    }


    if (list['单'] == 'selected' && list['双'] == 'selected' ){
        if ( v == '单' ){
            clear_win_selected_word('双');
        } else {
            clear_win_selected_word('单');
        }
    }

    //计算
    list = {};

    $('.win_type_val').children().each(function(i){
        var color = $(this).css('background-color');
        var word  = $(this).text();
        if (color == 'rgb(255, 0, 0)') {
            list[word] = 'selected';
        } else {
            list[word] = 'none';
        }
    });


    var num = parseInt(Math.round( Math.random()*15))+3;
    if ( list['大'] ==  'selected' ) {
        num = parseInt(Math.round(Math.random()*7))+11;

        if (list['单'] ==  'selected'){
            num = parseInt(Math.round(Math.random()*7))+11;
            if (num % 2 == 1 ){
            } else {
                if (num == 18){
                    num = num - 1;
                } else {
                    num = num + 1;
                }
            }
        } else if (list['双'] ==  'selected'){
            num = parseInt(Math.round(Math.random()*7))+11;
            if (num % 2 == 1 ){
                num = num + 1;
            }
        }


    } else if ( list['小'] ==  'selected'){
        num = parseInt(Math.round( Math.random()*7))+3;

        if (list['单'] ==  'selected'){
            num = parseInt(Math.round( Math.random()*7))+3;
            if (num % 2 == 1 ){
            } else {
                if (num == 18){
                    num = num - 1;
                } else {
                    num = num + 1;
                }
            }
        } else if (list['双'] ==  'selected'){
            num = parseInt(Math.round( Math.random()*7))+3;
            if (num % 2 == 1 ){
                num = num + 1;
            }
        }
    }

    var r = rand_value(num);
    $('.input_data_v').val(r);
}


</script>