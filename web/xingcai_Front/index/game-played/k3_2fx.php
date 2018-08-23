<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.game .pp input.code.reset{
		margin-top: -4px !important;
	}
</style>
<div class="pp pp11" action="tz11x5Select" length="1" >
	<div class="title">号码</div>
	<div class="code-wrapper" style="margin-top: 6px;">
	<input type="button" value="11*" class="code reset" />
	<input type="button" value="22*" class="code reset" />
    <input type="button" value="33*" class="code reset" />
    <input type="button" value="44*" class="code reset" />
    <input type="button" value="55*" class="code reset" />
    <input type="button" value="66*" class="code reset" />
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