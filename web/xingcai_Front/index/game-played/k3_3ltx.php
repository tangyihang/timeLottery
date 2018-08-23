<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.code-wrapper{
		padding-bottom: 7px;
	    padding-top: 1px;
	    margin-top: 7px;
	}
	.code-wrapper input{
		margin-left: 10px !important;
	}
</style>
<div class="pp pp11" action="tz11x5Select" length="1" >
	<div class="title">号码</div>
	<div class="code-wrapper">
	<input type="button" value="123,234,345,456" class="code reset2" />
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