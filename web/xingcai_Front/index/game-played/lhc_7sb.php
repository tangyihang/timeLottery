<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	input{
		border-color: #b0b0b0 !important;
	}
</style>
<div class="dGameStatus hklhc lotteryView_sxtw" action="tzlhcSelect" length="1">
      <div class="Contentbox" id="Contentbox_0">
        <div class="sxtwBox" >
		<dl style="width:725px;">
			<dt class="sxtitle">
		<span class="pjfp">种类</span><span class="pjfp">赔率</span><span class="pjfp">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem pjfp">红波</span>
		<span class="num pjfp"><?=$this->getLHCRte('Rte7SBhb',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="Rte7SBhb" name="LTTBP" acno="红波" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">绿波</span>
		<span class="num pjfp"><?=$this->getLHCRte('Rte7SBlvb',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="Rte7SBlvb" name="LTTBP" acno="绿波" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">蓝波</span>
		<span  class="num pjfp"><?=$this->getLHCRte('Rte7SBlanb',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="Rte7SBlanb" name="LTTBP" acno="蓝波" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">和局</span>
		<span class="num pjfp"><?=$this->getLHCRte('Rte7SBhj',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="Rte7SBhj" name="LTTBP" acno="和局" type="text"></span>
		</dd>
		</dl>
			  </div>  
			  </div>
            </div>
		
				<div class="addOrderBox" >
                <div class="addOrderLeft addOrderLeftsxtw">
                                   
                   <input type="button" class="addBtn" onclick="bringRte();" value="添加投注">
                    <div class="chooseMsg">
                        <p>总金额共 <span id="sTotalCredit">0</span> 元</p>
                    </div>
                </div>
           
            </div>