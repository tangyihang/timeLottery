<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
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
</style>
<div class="dGameStatus hklhc lotteryView_sxtw" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="sxtwBox" >
		<dl style="border-right:transparent;">
			<dt>
		<span class="sx">生肖</span>
		<span class="sxcode">号码</span>
		<span class="sxbl">赔率</span>
		<span class="ammount">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">鼠</span>
		  <a class="code-box">
			  <span class="blue">10</span>
			  <span class="green">22</span>
			  <span class="green">34</span>
			  <span class="red">46</span>
		  </a>
		  <span class="num"><?=$this->getLHCRte('RteSPA01',$this->played)?></span>
		   <span class="input"><input maxlength="5" id="RteSPA01" name="SPANM" acno="鼠" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">牛</span>
		<a class="code-box">
			<span  class="red">09</span>
			<span class="blue">21</span>
			<span class="green">33</span>
			<span class="green">45</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteSPA02',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA02" name="SPANM" acno="牛" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">虎</span>
		<a class="code-box">
			<span class="red">08</span>
			<span class="red">20</span>
			<span class="blue">32</span>
			<span class="green">44</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteSPA03',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA03" name="SPANM" acno="虎" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">兔</span>
		<a class="code-box">
			<span  class="green">07</span>
		<span class="red">19</span>
		<span class="red">31</span>
		<span class="blue">43</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteSPA04',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA04" name="SPANM" acno="兔" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">龙</span>
		<a class="code-box">
			<span  class="green">06</span>
			<span class="green">18</span>
			<span class="red">30</span>
			<span class="blue">42</span>
		</a>
		<span  class="num"><?=$this->getLHCRte('RteSPA05',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA05" name="SPANM" acno="龙" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">蛇</span>
		<a class="code-box">
			<span  class="blue">05</span>
			<span class="green">17</span>
			<span class="green">29</span>
			<span class="red">41</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteSPA06',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA06" name="SPANM" acno="蛇" type="text"></span>
		</dd>
		</dl>
		<dl>
			<dt>
		<span class="sx">生肖</span><span class="sxcode">号码</span><span class="sxbl">赔率</span><span class="sxammount">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">马</span>
		<a  class="code-box">
			<span  class="blue">04</span>
			<span class="blue">16</span>
			<span class="green">28</span>
			<span class="green">40</span>
		</a>
		
		<span 
			 class="num"><?=$this->getLHCRte('RteSPA07',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA07" name="SPANM" acno="马" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">羊</span>
		<a class="code-box">
			<span class="red">03</span>
			<span class="blue">15</span>
			<span class="blue">27</span>
			<span class="green">39</span>
		</a>
		<span class="num"><?=$this->getLHCRte('RteSPA08',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA08" name="SPANM" acno="羊" type="text"></span>
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
		<span class="num"><?=$this->getLHCRte('RteSPA09',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA09" name="SPANM" acno="鸡" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">猴</span>
		<a class="code-box">
			<span  class="red">2</span>
			<span class="red">14</span>
			<span class="blue">26</span>
			<span class="blue">38</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteSPA10',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA10" name="SPANM" acno="猴" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">狗</span>
		<a class="code-box">
			<span  class="green">12</span>
			<span class="red">24</span>
			<span class="red">36</span>
			<span class="blue">48</span>
		</a>
		<span class="num"><?=$this->getLHCRte('RteSPA11',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA11" name="SPANM" acno="狗" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem">猪</span>
		<a class="code-box">
			<span  class="blue">11</span>
			<span class="green">23</span>
			<span class="red">35</span>
			<span class="red">47</span>
		</a>
		
		<span  class="num"><?=$this->getLHCRte('RteSPA12',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPA12" name="SPANM" acno="猪" type="text"></span>
		</dd>
		</dl>
		<div class="dGameStatus hklhc lotteryView_lhc1" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox1" >
		<dl style="width:311px;border-right:none;">
			<dt>
		<span style="width:99px !important;border-right:1px solid #F0AD4E;">特别号头数</span><span style="width: 100px !important; border-right: 1px solid #F0AD4E;">赔率</span><span style="width: 108px;">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem ts">0头</span><span  class="num"><?=$this->getLHCRte('RteSPTD0',$this->played)?></span>
		<span class="input"><input  maxlength="5" id="RteSPTD0" name="SPTD" acno="0头" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">1头</span><span  class="num"><?=$this->getLHCRte('RteSPTD1',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPTD1" name="SPTD" acno="1头" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">2头</span><span  class="num"><?=$this->getLHCRte('RteSPTD2',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPTD2" name="SPTD" acno="2头" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">3头</span><span class="num"><?=$this->getLHCRte('RteSPTD3',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPTD3" name="SPTD" acno="3头" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">4头</span><span class="num"><?=$this->getLHCRte('RteSPTD4',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPTD4" name="SPTD" acno="4头" type="text"></span>
		</dd>
		</dl>	
		
		<dl style="width:311px; border-right:none">
			<dt>
		<span style="width:99px !important;border-right: 1px solid #F0AD4E;">特别号尾数</span><span style="width: 100px !important;border-right: 1px solid #F0AD4E;"> 赔率</span><span  style="width: 108px;">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem ts">0尾</span><span  class="num"><?=$this->getLHCRte('RteSPSD0',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD0" name="SPSD" acno="0尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">1尾</span><span   class="num"><?=$this->getLHCRte('RteSPSD1',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD1" name="SPSD" acno="1尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">2尾</span><span  class="num"><?=$this->getLHCRte('RteSPSD2',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD2" name="SPSD" acno="2尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">3尾</span><span  class="num"><?=$this->getLHCRte('RteSPSD3',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD3" name="SPSD" acno="3尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">4尾</span><span class="num"><?=$this->getLHCRte('RteSPSD4',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD4" name="SPSD" acno="4尾" type="text"></span>
		</dd>
		</dl>
		
 		<dl style="width:312px;">
			<dt>
		<span style="width:99px !important;">特别号头数</span><span  style="width: 100px !important;border-right: 1px solid #F0AD4E;">赔率</span><span  style="width: 108px;">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem ts">5尾</span><span class="num"><?=$this->getLHCRte('RteSPSD5',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD5" name="SPSD" acno="5尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">6尾</span><span  class="num"><?=$this->getLHCRte('RteSPSD6',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD6" name="SPSD" acno="6尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">7尾</span><span class="num"><?=$this->getLHCRte('RteSPSD7',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD7" name="SPSD" acno="7尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">8尾</span><span  class="num"><?=$this->getLHCRte('RteSPSD8',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD8" name="SPSD" acno="8尾" type="text"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem ts">9尾</span><span  class="num"><?=$this->getLHCRte('RteSPSD9',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteSPSD9" name="SPSD" acno="9尾" type="text"></span>
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