<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	<style type="text/css">
	.lotteryView_sxtw .sxtwBox dl{
		border-color:#F0AD4E !important;
	}
	.lotteryView_sxtw .sxtwBox dl dt{
		border-color: #F0AD4E !important;
		background-color: #FF9726;
		color: #fff;
	}
	.sxtwBox dl span.sx{
		width: 45px !important;
		border-right: 1px solid #F0AD4E;
	}
	.sxtwBox dl span.sGameStatusItem{
		width: 45px !important;
		margin: 0;
		padding: 0;
		border-right: 1px solid #F0AD4E;
		border-bottom: 1px solid #F0AD4E;
		background-color: transparent;
		color: #762D08 !important;
		font-size: 14px;
		text-align: center;
		line-height: 34px !important;
		height: 34px !important;
		background-color: #F9F2EB !important;
	}
	.sxtwBox dd{
		padding-top: 0 !important;
	}
	.sxtwBox dl span.sxcode{
		width: 210px !important;
		border-right: 1px solid #F0AD4E;
	}
	.sxtwBox dl span.sxbl{
		width: 100px !important;
		border-right: 1px solid #F0AD4E;
	}
	.sxtwBox dl span.ammount{
		width: 110px !important;
	}
	.sxtwBox dl  a.code-box{
		width: 210px;
		background-color: #fff;
		float: left;
		height: 34px !important;
		border-right: 1px solid #F0AD4E;
		border-bottom: 1px solid #F0AD4E;
	}
	.sxtwBox dl  a.code-box span{
		margin-top: 4px;
		
	} 
	.sxtwBox dl  a.code-box span.red{
		background: none;
		background-color: #F13131;
		border-radius: 50%;
	}
	.sxtwBox dl  a.code-box span.blue{
		background: none;
		border-radius: 50%;
		background-color: #2a74dd !important;
	}
	.sxtwBox dl  a.code-box span.green{
		background: none;
		border-radius: 50%;
		background-color: #1ca01c  !important;
	}
	
	.sxtwBox dl dd .num{
		width: 100px !important;
		border-right: 1px solid #F0AD4E;
		height: 34px !important;
		line-height: 34px !important;
		border-bottom: 1px solid #F0AD4E;
	}
	.sxtwBox dl dd .input{
		width: 110px !important;
		height: 34px !important;
		border-bottom: 1px solid #F0AD4E;
	}
	.sxtwBox dl dd .input input{
	  width: 85px !important;
    height: 21px;
    border: #b0b0b0 1px solid !important;
    padding: 2px;
    text-align: center;
    margin-top: 2px;
    margin-left: 10px;}
  
	.lhcBox1 dl span.sGameStatusItem.ts{
		width: 100px !important;
	}
	.lhcBox1 dl span.num{
		width: 100px !important;
	}
	.lhcBox1 dl span.input{
		width: 109px !important;
	
	}
	.lotteryView_lhc2 .lhcBox2 dl dt span.sp1{
		width: 45px !important;
		border-right: 1px solid #F0AD4E;
	}.lotteryView_lhc2 .lhcBox2 dl dt span.sp2{
		width: 93px !important;
		
	}

	.sxtwBox dl dd .num.wnum{
		width: 45px !important;
		border-right: 1px solid #F0AD4E;
	}
	.sxtwBox dl dd .input.winput{
		width: 94px !important;
	}
	.sxtwBox dl dd .input.winput input{
		width: 68px !important;
	}
</style>
</style>
<div class="dGameStatus hklhc lotteryView_sxtw" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="sxtwBox" >
		<dl class="border-r-none">
			<dt>
		<span class="sx">生肖</span><span class="sxcode">号码</span><span class="sxbl">赔率</span><span class="ammount">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">鼠</span>
		<a class="code-box">
			<span  class="blue">10</span>
			<span class="green">22</span>
			<span class="green">34</span>
			<span class="red">46</span>
		</a>
		<span class="num"><?=$this->getLHCRte('RteLTTA01',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA01" name="LTTBP" acno="鼠" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">牛</span>
		<a class="code-box">
			<span  class="red">09</span>
			<span class="blue">21</span>
			<span class="green">33</span>
			<span class="green">45</span>
		</a>
		
		<span class="num"><?=$this->getLHCRte('RteLTTA02',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA02" name="LTTBP" acno="牛" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">虎</span>
		<a class="code-box">
			<span class="red">08</span>
			<span class="red">20</span>
			<span class="blue">32</span>
			<span class="green">44</span>
		</a>
		
		<span class="num"><?=$this->getLHCRte('RteLTTA03',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA03" name="LTTBP" acno="虎" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">兔</span>
		<a class="code-box">
			<span  class="green">07</span>
			<span class="red">19</span>
			<span class="red">31</span>
			<span class="blue">43</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteLTTA04',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA04" name="LTTBP" acno="兔" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">龙</span>
		<a class="code-box">
			<span  class="green">06</span>
			<span class="green">18</span>
			<span class="red">30</span>
			<span class="blue">42</span>
		</a>
		
		<span class="num"><?=$this->getLHCRte('RteLTTA05',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA05" name="LTTBP" acno="龙" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">蛇</span>
		<a class="code-box">
			<span class="blue">05</span>
			<span class="green">17</span>
			<span class="green">29</span>
			<span class="red">41</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteLTTA06',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA06" name="LTTBP" acno="蛇" type="text"></span>
		</dd>
		</dl>
		<dl>
			<dt>
		<span class="sx">生肖</span><span class="sxcode">号码</span><span class="sxbl">赔率</span><span class="ammount">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">马</span>
		<a class="code-box">
			<span  class="blue">04</span>
			<span class="blue">16</span>
			<span class="green">28</span>
			<span class="green">40</span>
		</a>
		
		<span class="num"><?=$this->getLHCRte('RteLTTA07',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA07" name="LTTBP" acno="马" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">羊</span>
		<a class="code-box" style="padding: 0;">
			<span class="red">03</span>
			<span class="blue">15</span>
			<span class="blue">27</span>
			<span class="green">39</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteLTTA08',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA08" name="LTTBP" acno="羊" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">鸡</span>
		<a class="code-box">
			<span  class="red">01</span>
			<span class="red">13</span>
			<span class="blue">25</span>
			<span class="blue">37</span>
			<span class="green">49</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteLTTA09',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA09" name="LTTBP" acno="鸡" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">猴</span>
		<a  class="code-box">
			<span  class="red">02</span>
			<span class="red">14</span>
			<span class="blue">26</span>
			<span class="blue">38</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteLTTA10',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA10" name="LTTBP" acno="猴" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">狗</span>
		<a class="code-box">
			<span  class="green">12</span>
			<span class="red">24</span>
			<span class="red">36</span>
			<span class="blue">48</span>
		</a>
		
		<span class="num"><?=$this->getLHCRte('RteLTTA11',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA11" name="LTTBP" acno="狗" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">猪</span>
		<a class="code-box">
			<span  class="blue">11</span>
			<span class="green">23</span>
			<span class="red">35</span>
			<span class="red">47</span>
		</a>
		
		<span class="num"><?=$this->getLHCRte('RteLTTA12',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLTTA12" name="LTTBP" acno="猪" type="text"></span>
		</dd>
		</dl>
		
		<div class="dGameStatus hklhc lotteryView_lhc2" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox2" >
		<dl class="border-r-none">
			<dt>
		<span class="sp1">号码</span><span class="sp1">赔率</span><span class="sp2">金额</span>
			</dt>
		<dd>
		<span id="RteSPBSOED" class="sGameStatusItem">0尾</span><span class="num wnum" ><?=$this->getLHCRte('RteLTTSD0',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD0" name="LTTSD" acno="0尾" type="text"></span>
		</dd>
		<dd>
		<span id="RteSPBSOES" class="sGameStatusItem">1尾</span><span class="num wnum" ><?=$this->getLHCRte('RteLTTSD1',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD1" name="LTTSD" acno="1尾" type="text"></span>
		</dd>
		</dl>
			<dl class="border-r-none">
		<dt>
		<span class='sp1'>号码</span><span class='sp1' >赔率</span><span class='sp2' >金额</span>
			</dt>
		<dd>
		<span id="RteSPBSOEO" class="sGameStatusItem">2尾</span><span class="num wnum"><?=$this->getLHCRte('RteLTTSD2',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD2" name="LTTSD" acno="2尾" type="text"></span>
		</dd>
		<dd>
		<span id="RteSPBSOEE" class="sGameStatusItem">3尾</span><span class="num wnum"><?=$this->getLHCRte('RteLTTSD3',$this->played)?></span>
		<span class="input winput"> <input maxlength="5" id="RteLTTSD3" name="LTTSD" acno="3尾" type="text"></span>
		</dd>
			</dl>
			<dl class="border-r-none">
		<dt>
		<span class='sp1'>号码</span><span class='sp1'>赔率</span><span class='sp2' >金额</span>
			</dt>
		<dd>
		<span id="RteSPTBSOED" class="sGameStatusItem">4尾</span><span class="num wnum" ><?=$this->getLHCRte('RteLTTSD4',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD4" name="LTTSD" acno="4尾" type="text"></span>
		</dd>
		<dd>
		<span id="RteSPTBSOES" class="sGameStatusItem">5尾</span><span class="num wnum"><?=$this->getLHCRte('RteLTTSD5',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD5" name="LTTSD" acno="5尾" type="text"></span>
		</dd>
			</dl>
			<dl class="border-r-none">
		<dt>
		<span class='sp1'>号码</span><span class='sp1'>赔率</span><span class='sp2'>金额</span>
			</dt>
		<dd>
		<span id="RteSPTBSOEO" class="sGameStatusItem">6尾</span><span class="num wnum"><?=$this->getLHCRte('RteLTTSD6',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD6" name="LTTSD" acno="6尾" type="text"></span>
		</dd>
		<dd>
		<span id="RteSPTBSOEE" class="sGameStatusItem">7尾</span><span class="num wnum"> <?=$this->getLHCRte('RteLTTSD7',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD7" name="LTTSD" acno="7尾" type="text"></span>
		</dd>
			</dl>
			<dl style="width: 189px !important;">
		<dt>
		<span class='sp1'>号码</span><span class='sp1'>赔率</span><span class='sp2'>金额</span>
			</dt>
		<dd>
		<span id="RteSPSBSD" class="sGameStatusItem">8尾</span><span class="num wnum" ><?=$this->getLHCRte('RteLTTSD8',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD8" name="LTTSD" acno="8尾" type="text"></span>
		</dd>
		<dd>
		<span id="RteSPSBSS" class="sGameStatusItem">9尾</span><span class="num wnum"><?=$this->getLHCRte('RteLTTSD9',$this->played)?></span>
		<span class="input winput" ><input maxlength="5" id="RteLTTSD9" name="LTTSD" acno="9尾" type="text"></span>
		</dd>
			</dl>	

    
		</div>
                 
         </div>
              </div>    
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