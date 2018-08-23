<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.lotteryView_sxtw .sxtwBox dl dt.sxtitle span.sp1{
		width: 171px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		padding: 0 !important;
	}
	.lotteryView_sxtw .sxtwBox dl dt.sxtitle span.sp2{
		width: 343px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		padding: 0 !important;
	}
	.lotteryView_sxtw .sxtwBox dl dd span.sp2{
		width: 343px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		padding: 0 !important;
		height: 34px !important;
		border-bottom: 1px solid #F0AD4E;
		line-height: 34px !important;
	}
	.lotteryView_sxtw .sxtwBox dl dd a.sp2{
		width: 343px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		padding: 0 !important;
		height: 34px !important;
		border-bottom: 1px solid #F0AD4E;
		line-height: 34px !important;
		float: left;
	}
	.lotteryView_sxtw .sxtwBox dl dd span.sp1.input input{
		display: block;
		margin:3px auto !important;
		border-color: #b0b0b0 !important;
	}
	.lotteryView_sxtw .sxtwBox dl dd span.sp1{
		width: 171px !important;
		border-right: 1px solid #F0AD4E;
		margin: 0 !important;
		border-bottom: 1px solid #F0AD4E;
		padding: 0 !important;
		height: 34px !important;
		line-height: 34px !important;
	}
	.lotteryView_sxtw .sxtwBox dl dd a.sp2 span.red{
		background: none;
		background-color: #F13131;
		height: 25px;
		width: 25px;
		line-height: 25px;
		text-align: center;
		border-radius: 50%;
		margin-top: 4px;
	}.lotteryView_sxtw .sxtwBox dl dd a.sp2 span.blue{
		background: none;
		background-color: #2a74dd !important;
		height: 25px;
		width: 25px;
		line-height: 25px;
		text-align: center;
		border-radius: 50%;
		margin-top: 4px;
	}
	.lotteryView_sxtw .sxtwBox dl dd a.sp2 span.green{
		background: none;
		background-color: #1ca01c  !important;
		height: 25px;
		width: 25px;
		line-height: 25px;
		text-align: center;
		border-radius: 50%;
		margin-top: 4px;
	}
</style>
<div class="dGameStatus hklhc lotteryView_sxtw" action="tzlhcSelect" length="1">
      <div class="Contentbox" id="Contentbox_0">
        <div class="sxtwBox" >
		<dl style="width:860px;">
			<dt class="sxtitle">
		<span class="sp1">种类</span><span class="sp2">号码</span><span class="sp1">赔率</span><span class="sp1 border-r-none">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem sp1">金</span>
		<a class="sp2">
			<span class="blue">03</span>
			<span class="blue">04</span>
			<span class="green">17</span>
			<span class="red">18</span>
			<span class="blue">25</span>
			<span class="blue">26</span>
			<span class="green">33</span>
			<span class="red">34</span>
			<span class="blue">47</span>
			<span class="blue">48</span>
		</a>
		<span class="num sp1"><?=$this->getLHCRte('RteWXJ',$this->played)?></span>
		<span class="input sp1 border-r-none"><input maxlength="5" id="RteWXJ" name="LTTBP" acno="金" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">木</span>
		<a class="sp2">
			<span class="red">07</span>
			<span class="red">08</span>
			<span class="blue">15</span>
			<span class="green">16</span>
			<span class="red">29</span>
			<span class="red">30</span>
			<span class="blue">37</span>
			<span class="green">38</span>
			<span class="red">45</span>
			<span class="red">46</span>
		</a>
		<span class="num sp1"><?=$this->getLHCRte('RteWXM',$this->played)?></span>
		<span class="input sp1 border-r-none"><input maxlength="5" id="RteWXM" name="LTTBP" acno="木" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">水</span>
		<a class="sp2">
			<span class="green">05</span>
			<span class="green">06</span>
			<span class="red">13</span>
			<span class="blue">14</span>
			<span class="green">21</span>
			<span class="green">22</span>
			<span class="red">35</span>
			<span class="blue">36</span>
			<span class="green">43</span>
			<span class="green">44</span>
		</a>
		<span class="num sp1"><?=$this->getLHCRte('RteWXS',$this->played)?></span>
		<span class="input sp1 border-r-none"><input maxlength="5" id="RteWXS" name="LTTBP" acno="水" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1">火</span>
		<a class="sp2">
			<span class="red">01</span>
			<span class="red">02</span>
			<span class="blue">09</span>
			<span class="blue">10</span>
			<span class="red">23</span>
			<span class="red">24</span>
			<span class="blue">31</span>
			<span class="green">32</span>
			<span class="green">39</span>
			<span class="red">40</span>
		</a>
		<span class="num sp1"><?=$this->getLHCRte('RteWXH',$this->played)?></span>
		<span class="input sp1 border-r-none"><input maxlength="5" id="RteWXH" name="LTTBP" acno="火" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem sp1" style="border-bottom: none; height: 35px;">土</span>
		<a class="sp2" style="border-bottom: none; height: 35px;">
			<span class="green">11</span>
			<span class="red">12</span>
			<span class="red">19</span>
			<span class="blue">20</span>
			<span class="green">27</span>
			<span class="green">28</span>
			<span class="blue">41</span>
			<span class="blue">42</span>
			<span class="green">49</span>
		</a>
		<span class="num sp1" style="border-bottom: none; height: 35px;"><?=$this->getLHCRte('RteWXT',$this->played)?></span>
		<span class="input sp1 border-r-none" style="border-bottom: none; height: 35px;"><input maxlength="5" id="RteWXT" name="LTTBP" acno="土" type="text"></span>
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