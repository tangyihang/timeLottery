<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<div class="pp" action="sscr3zuxhz" length="2" random="">
	<div id="wei-shu" length="3" class="lotteryMember" >
	<dl id="poschoose"><dt>选择位置:</dt>
		<dd><input type="checkbox" class="posChoose" value="16">万位</dd>
		<dd><input type="checkbox" class="posChoose" value="8">千位</dd>
		<dd><input type="checkbox" class="posChoose" value="4">百位</dd>
		<dd><input type="checkbox" class="posChoose" value="2">十位</dd>
		<dd><input type="checkbox" class="posChoose" value="1">个位</dd>
	</dl>
	</div>
	<div class="code-wrapper">
	<input type="button" value="1" class="code min d" />
	<input type="button" value="2" class="code min s" />
	<input type="button" value="3" class="code min d" />
	<input type="button" value="4" class="code min s" />
	<input type="button" value="5" class="code max d" />
	<input type="button" value="6" class="code max s" />
	<input type="button" value="7" class="code max d" />
	<input type="button" value="8" class="code max s" />
	<input type="button" value="9" class="code max d" />
	<input type="button" value="10" class="code max s" />
	<input type="button" value="11" class="code max d" />
	<input type="button" value="12" class="code max s" />
	<input type="button" value="13" class="code max d" />
	<input type="button" value="14" class="code max s" />
	<input type="button" value="15" class="code max d" />
	<input type="button" value="16" class="code max s" />
	<input type="button" value="17" class="code max d" />
	<input type="button" value="18" class="code max s" />
	<input type="button" value="19" class="code max d" />
	<input type="button" value="20" class="code max s" />
	<input type="button" value="21" class="code max d" />
	<input type="button" value="22" class="code max s" />
	<input type="button" value="23" class="code max d" />
	<input type="button" value="24" class="code max s" />
	<input type="button" value="25" class="code max d" />
	<input type="button" value="26" class="code max s" />
	</div>
</div>
<?php $maxPl=$this->getPl($this->type, $this->played); ?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>
