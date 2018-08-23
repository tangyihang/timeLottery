<div class="warp lotteryBox">

<div class="lotteryBody">
    <?php
    if($this->type == 83 || $this->type == 34){
        echo '<div id="nfdprize-text" class="m-lott-methodBox">';
    }else{
        echo '<div id="nfdprize-text" class="m-lott-methodBox" style="height: 38px;padding:  10px;">';
    }
    ?>

      <span class="nfdprize_text" id="m-lott-listContent">玩法选择<b class="cur"></b></span>
      <?php
      if($this->type == 83 || $this->type == 34){

      }else{
          echo '<div class="_shark" onclick="gameActionAddCode_random()"></div>';
      }
      ?>

			<!--<div class="tz_work" style="height: 30px; float: right; ">
				<div class="ball_write">
					<div class="write_bg">
						<div class="jiangjin" id="game-dom">
						  <div class="fandian-k fl" >
						      <input type="button" class="min" value="" step="-0.1"/>
						      <input type="button" class="max" value="" step="0.1"/>
						      <strong>奖金/返点：</strong>
						      <div id="slider-range-min" class="tiao slider fandian-box" value="<?= $this->ifs($_COOKIE['fanDian'], 0) ?>" data-bet-count="<?= $this->settings['betMaxCount'] ?>" data-bet-zj-amount="<?= $this->settings['betMaxZjAmount'] ?>" max="<?= $this->user['fanDian'] ?>" game-fan-dian="<?= $this->settings['fanDianMax'] ?>" fan-dian="<?= $this->user['fanDian'] ?>" game-fan-dian-bdw="<?= $this->settings['fanDianBdwMax'] ?>" fan-dian-bdw="<?= $this->user['fanDianBdw'] ?>" min="0" step="1" slideCallBack="gameSetFanDian"></div>
						      <span id="fandian-value" class="fdmoney" style=" color: #000 !important;"><?= $maxPl ?>/0%</span>
						  </div>
						</div>
					</div>
				</div>
			</div>-->
			
  </div>
<div class="lotteryLeft _lottery_menu" style="min-height: auto;margin-top: -2px;">
                     <div class="m-lott-methodBox-list" style="height: auto;border-width: 2px;"> 
                    <div class="lotteryGroup">
                        <ul id="groupList" style="width: 1004.18px;">
<?php
$check1 = $this->settings['checkLogin1'];
$check2 = $this->settings['checkLogin2'];
$this->getTypes();
$sql    = "select id, groupName, enable from {$this->prename}played_group where enable=1 and type=? order by sort";
$groups = $this->getObject($sql, 'id', $this->types[$this->type]['type']);
if ($this->groupId && !$groups[$this->groupId])
    unset($this->groupId);
if ($groups)
    foreach ($groups as $key => $group) {
        if (!$this->groupId)
            $this->groupId = $group['id'];
?>
                       <li><a href="#" tourl="/index.php/index/group_new/<?= $this->type . '/' . $group['id'] ?>" <?= ($this->groupId == $group['id']) ? ' class="took"' : '' ?>     onclick="showx(<?= $group['id'] ?>)" ><?= $group['groupName'] ?></a></li>
					   <?php
    }
?>
					   
					   </ul>
             </div>	
             <fieldset style="border-width: 1px 0 0 0;">
             	<legend align="center" class="morePlay" style="font-size: 16px;padding:0 10px ;">更多玩法</legend>
            
             <div id="submenu" >
							<div class="tz_xz" style="border-bottom: none;">
							<?php
							$sql= "select groupName from {$this->prename}played_group where id=?";
							$groupName = $this->getValue($sql, $this->groupId);
							
							$sql= "select id, name, playedTpl, enable  from {$this->prename}played where enable=1 and groupId=? order by sort";
							$playeds = $this->getRows($sql, $this->groupId);
							if (!$playeds) {
							    echo '<td colspan="7" align="center">暂无玩法</td>';
							    return;
							}
							if (!$this->played)
							    $this->played = $playeds[0]['id'];
							?>
							<?php
							if ($playeds)
							    foreach ($playeds as $played) {
							        if ($this->played == $played['id'])
							            $tpl = $played['playedTpl'];
							        if ($played['enable']) {
							?>
								<a data_id="<?= $played['id'] ?>" href="#" tourl="/index.php/index/played_new/<?= $this->type ?>/<?= $played['id'] ?>" <?= ($played['id'] == $this->played) ? ' class="tag"' : '' ?> style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $played['name'] ?></a>
								<?php
							        }
							    }
							?>
						</div>
						
				  </div>
				   </fieldset>
</div>	

</div>	

<script>
	$(".morePlay").text($("#groupList li").eq(0).find("a").text());
</script>


</div>	
