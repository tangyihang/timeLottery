<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<div class="dGameStatus hklhc lotteryView_sxtw" action="tzlhcSelect" length="1">
      <div class="Contentbox" id="Contentbox_0">
        <div class="sxtwBox" >
		<dl style="width:725px; border-right: none;">
			<dt class="sxtitle">
		<span class="pjfp">种类</span><span class="pjfp">赔率</span><span class="pjfp">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem pjfp">2肖</span>
		<span  class="num pjfp"><?=$this->getLHCRte('RteZX2x',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZX2x" name="LTTBP" acno="2肖" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">3肖</span>
		<span  class="num pjfp"><?=$this->getLHCRte('RteZX3x',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZX3x" name="LTTBP" acno="3肖" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">4肖</span>
		<span  class="num pjfp"><?=$this->getLHCRte('RteZX4x',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZX4x" name="LTTBP" acno="4肖" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">5肖</span>
		<span  class="num pjfp"><?=$this->getLHCRte('RteZX5x',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZX5x" name="LTTBP" acno="5肖" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">6肖</span>
		<span  class="num pjfp"><?=$this->getLHCRte('RteZX6x',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZX6x" name="LTTBP" acno="6肖" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">7肖</span>
		<span class="num pjfp"><?=$this->getLHCRte('RteZX7x',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZX7x" name="LTTBP" acno="7肖" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">总肖单</span>
		<span class="num pjfp"><?=$this->getLHCRte('RteZXd',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZXd" name="LTTBP" acno="总肖单" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp">总肖双</span>
		<span class="num pjfp"><?=$this->getLHCRte('RteZXs',$this->played)?></span>
		<span class="input pjfp"><input maxlength="5" id="RteZXs" name="LTTBP" acno="总肖双" type="text"></span>
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