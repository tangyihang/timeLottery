<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.lotteryView_sxtw .sxtwBox dl dt.sxtitle span.sp1{
		width: 93px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		padding: 0 !important;
		
	}
	.lotteryView_sxtw .sxtwBox dl dt.sxtitle span.sp2{
		width:182px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		padding: 0 !important;
		
	}
	.lotteryView_sxtw .sxtwBox dl dd span.sp1{
		width: 93px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		border-bottom: 1px solid #F0AD4E;
		padding: 0 !important;
		height: 34px !important;
		line-height: 34px !important;
		
	}.lotteryView_sxtw .sxtwBox dl dd span.sp1.input{
		width: 96px !important;
		border-right: none;
		margin: 0 !important;
		border-bottom: 1px solid #F0AD4E;
		padding: 0 !important;
		height: 34px !important;
		line-height: 34px !important;
		
	}
	.lotteryView_sxtw .sxtwBox dl dd span.sp2{
		width:182px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		border-bottom: 1px solid #F0AD4E;
		padding: 0 !important;
		height: 34px !important;
		line-height: 34px !important;
		
	}
	.lotteryView_sxtw .sxtwBox dl dd .sp2 span.red{
		background: none;
		background-color: #F13131;
		height: 25px;
		width: 25px;
		line-height: 25px;
		text-align: center;
		border-radius: 50%;
		margin-top: 4px;
	}.lotteryView_sxtw .sxtwBox dl dd .sp2 span.blue{
		background: none;
		background-color: #2a74dd !important;
		height: 25px;
		width: 25px;
		line-height: 25px;
		text-align: center;
		border-radius: 50%;
		margin-top: 4px;
	}
	.lotteryView_sxtw .sxtwBox dl dd .sp2 span.green{
		background: none;
		background-color: #1ca01c  !important;
		height: 25px;
		width: 25px;
		line-height: 25px;
		text-align: center;
		border-radius: 50%;
		margin-top: 4px;
	}
	.lotteryView_sxtw .sxtwBox dl dd span.sp1.input input{
		display: block;
		margin:3px auto !important;
		border-color: #b0b0b0  !important;
	}
</style>
<div class="dGameStatus hklhc lotteryView_sxtw" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="sxtwBox" >
		<dl style="width: 467px;overflow: hidden';" class="border-r-none">
			<dt class="sxtitle" >
		<span class="sp1">生肖</span><span class="sp2">号码</span><span class="sp1">赔率</span><span class="sp1 border-r-none">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem sp1">鼠</span>
		<span class="sp2">
			<span class="blue">10</span>
			<span class="green">22</span>
			<span class="green">34</span>
			<span class="red">46</span>
		</span>
		
		<span class="num sp1"><?=$this->getLHCRte('RteZXS',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXS" name="LTTBP" acno="鼠" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">牛</span>
		<span class="sp2">
			<span class="red">09</span>
			<span class="blue">21</span>
			<span class="green">33</span>
			<span class="green">45</span>
		</span>
		
		<span class="num sp1"><?=$this->getLHCRte('RteZXN',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXN" name="LTTBP" acno="牛" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">虎</span>
		<span class="sp2">
			<span  class="red">08</span>
			<span class="red">20</span>
			<span class="blue">32</span>
			<span class="green">44</span>
		</span>
		
		<span  class="num sp1"><?=$this->getLHCRte('RteZXH',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXH" name="LTTBP" acno="虎" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">兔</span>
		<span class="sp2">
			<span  class="green">07</span>
			<span class="red">19</span>
			<span class="red">31</span>
			<span class="blue">43</span>
		</span>
		
		<span  class="num sp1"><?=$this->getLHCRte('RteZXT',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXT" name="LTTBP" acno="兔" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">龙</span>
		<span class="sp2">
			<span  class="green">06</span>
			<span class="green">18</span>
			<span class="red">30</span>
			<span class="blue">42</span>
		</span>
		<span class="num sp1"><?=$this->getLHCRte('RteZXL',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXL" name="LTTBP" acno="龙" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1" style="border-bottom: none;">蛇</span>
		<span class="sp2" style="border-bottom: none;">
			<span  class="blue">05</span>
			<span class="green">17</span>
			<span class="green">29</span>
			<span class="red">41</span>
		</span>
		<span class="num sp1" style="border-bottom: none;"><?=$this->getLHCRte('RteZXShe',$this->played)?></span>
		<span class="input sp1" style="border-bottom: none;"><input maxlength="5" id="RteZXShe" name="LTTBP" acno="蛇" type="text"></span>
		</dd>
		</dl>
		<dl style="width:468px;">
			<dt class="sxtitle">
		<span class="sp1">生肖</span><span class="sp2">号码</span><span class="sp1">赔率</span><span class="sp1 border-r-none">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem sp1">马</span>
		<span class="sp2">
			<span class="blue">04</span>
			<span class="blue">16</span>
			<span class="green">28</span>
			<span class="green">40</span>
		</span>
		<span class="num sp1"><?=$this->getLHCRte('RteZXSM',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXSM" name="LTTBP" acno="马" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">羊</span>
		<span class="sp2">
			<span class="red">03</span>
			<span class="blue">15</span>
			<span class="blue">27</span>
			<span class="green">39</span>
		</span>
		<span class="num sp1"><?=$this->getLHCRte('RteZXY',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXY" name="LTTBP" acno="羊" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">鸡</span>
		<span class="sp2">
			<span class="red">01</span>
			<span class="red">13</span>
			<span class="blue">25</span>
			<span class="blue">37</span>
			<span class="green">49</span>
		</span>
		<span class="num sp1"><?=$this->getLHCRte('RteZXJ',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXJ" name="LTTBP" acno="鸡" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">猴</span>
		<span class="sp2">
			<span class="red">02</span>
			<span class="red">14</span>
			<span class="blue">26</span>
			<span class="blue">38</span>
		</span>
		<span class="num sp1"><?=$this->getLHCRte('RteZXSHou',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXSHou" name="LTTBP" acno="猴" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">狗</span>
		<span class="sp2">
			<span  class="green">12</span>
			<span class="red">24</span>
			<span class="red">36</span>
			<span class="blue">48</span>
		</span>
		<span class="num sp1"><?=$this->getLHCRte('RteZXG',$this->played)?></span>
		<span class="input sp1"><input maxlength="5" id="RteZXG" name="LTTBP" acno="狗" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1" style="border-bottom: none;">猪</span>
		<span class="sp2" style="border-bottom: none;">
			<span  class="blue">11</span>
			<span class="green">23</span>
			<span class="red">35</span>
			<span class="red">47</span>
		</span>
		
		<span class="num sp1" style="border-bottom: none;"><?=$this->getLHCRte('RteZXZ',$this->played)?></span>
		<span class="input sp1" style="border-bottom: none;"><input maxlength="5" id="RteZXZ" name="LTTBP" acno="猪" type="text"></span>
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