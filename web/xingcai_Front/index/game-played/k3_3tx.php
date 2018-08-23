<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.game .pp input.code{
		margin: 0;
		margin-left: 30px;
		margin-top: -4px;
	}
</style>
<div class="pp pp11" action="tz11x5Select" length="1" >
	<div class="title">号码</div>
	<div class="code-wrapper" style="margin-top: 6px;">
			<input type="button" value="111,222,333,444,555,666" class="code reset2" />
			<input type="button" value="111,222,333,444,555,666" class="code reset2" />
	</div>
	
	
</div>
<?php
	
	$maxPl=$this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>