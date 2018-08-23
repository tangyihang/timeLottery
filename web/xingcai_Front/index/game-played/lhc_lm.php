<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.lotteryView_lhc .lhcBox dl dd span.input{
		width: 135px !important;
		text-align: center;
	}
	.lotteryView_lhc .lhcBox dl dd span.input input{
		width: 25px;
		height: 25px;
	}
	.lotteryView_lhc3 .lhcBox3 dl{
		border-color: #F0AD4E;
	}
	.lotteryView_lhc3 .lhcBox3 dl dt span{
		width: 33.3333%;
		margin-left: -1px;
		border-right: 1px solid #F0AD4E;
	}
	.lotteryView_lhc3 .lhcBox3 dl dd{
		padding: 0;
	}
	.lotteryView_lhc3 .lhcBox3 dl dd span{
		width: 33.3333% !important;
		margin-left: -1px;
		border-right: 1px solid #F0AD4E;
		padding: 0 !important;
		height: 34px !important;
		line-height: 34px !important;
		border-bottom: none;
		border-top: 1px solid #F0AD4E;
		text-align:center ;
	}
	.lotteryView_lhc3 .lhcBox3 dl dd span.input{
		border-right: none;
	}
	.lotteryView_lhc3 .lhcBox3 dl dd span.input input{
		margin-top: 8px;
	}
	.lotteryView_lhc3 .lhcBox3 dl dd span.sGameStatusItem{
		    background-color: #F9F2EB !important;
    font-size: 14px;
    font-weight: 400;
    color: #762D08 !important;
	}
</style>
<div class="dGameStatus hklhc lotteryView_lhc3" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
				
        <div class="lhcBox3" >
				
		<dl class="border-r-none">
			<dt class="sxtitle">
		<span>号码</span><span>赔率</span><span class="border-r-none">选择</span>
			</dt>
		<dd class="sxcontent">
		<span  class="sGameStatusItem">四全中</span><span class="num"><?=$this->getLHCRte('RteLM4OF4',$this->played)?></span>
		<span class="input" ><input  id="RteLM4OF4" type="radio" value="LM4OF4" rel="4" pri="<?=$this->getLHCRte('RteLM4OF4',$this->played)?>" name="txtGameItem" class="inputnoborder"></span>
		</dd>
		</dl>
			<dl class="border-r-none">
		<dt  class="sxtitle">
		<span>号码</span><span >赔率</span><span >选择</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">三全中</span><span class="num" ><?=$this->getLHCRte('RteLM3OF3',$this->played)?></span>
		<span class="input" ><input id="RteLM3OF3" type="radio" value="LM3OF3" rel="3" pri="<?=$this->getLHCRte('RteLM3OF3',$this->played)?>" name="txtGameItem" class="inputnoborder"></span>
		</dd>
			</dl>
			<dl class="border-r-none">
		<dt  class="sxtitle">
		<span>号码</span><span >赔率</span><span>选择</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">三中二</span><span class="num" ><?=$this->getLHCRte('RteLM2OF31',$this->played)?></span>
		<span class="input" ><input id="RteLM2OF31" type="radio" value="LM2OF31" rel="3" pri="<?=$this->getLHCRte('RteLM2OF31',$this->played)?>" name="txtGameItem" class="inputnoborder"></span>
		</dd>
			</dl>
			<dl class="border-r-none">
		<dt  class="sxtitle">
		<span>号码</span><span >赔率</span><span >选择</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">二中二</span><span class="num" ><?=$this->getLHCRte('RteLM2OF2',$this->played)?></span>
		<span class="input" ><input id="RteLM2OF2" type="radio" value="LM2OF2" rel="2" pri="<?=$this->getLHCRte('RteLM2OF2',$this->played)?>" name="txtGameItem" class="inputnoborder"></span>
		</dd>
			</dl>
			<dl class="border-r-none">
		<dt  class="sxtitle">
		<span>号码</span><span>赔率</span><span >选择</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">二中特</span><span class="num" ><?=$this->getLHCRte('RteLMSPOF21',$this->played)?></span>
		<span class="input" ><input id="RteLMSPOF21" type="radio" value="LMSPOF21" rel="2" pri="<?=$this->getLHCRte('RteLMSPOF21',$this->played)?>" name="txtGameItem" class="inputnoborder"></span>
		</dd>
			</dl>	
			<dl>
		<dt  class="sxtitle">
		<span>号码</span><span >赔率</span><span >选择</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">特串</span><span class="num" ><?=$this->getLHCRte('RteLMSPOF',$this->played)?></span>
		<span class="input" ><input id="RteLMSPOF" type="radio" value="LMSPOF" name="txtGameItem" rel="1" pri="<?=$this->getLHCRte('RteLMSPOF',$this->played)?>" class="inputnoborder"></span>
		</dd>
			</dl>			
			</div></div></div>
    
		<div class="dGameStatus hklhc lotteryView_lhc" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox" >	  
		<dl>
			<dt>
		<span>号码</span><span >选择</span>
			</dt>
		<dd>
		<span class="red"><i>01</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="1" id="checkbox_01" name="checkbox" class="inputnoborder" acno="01"></span>
		</dd>
		<dd>
		<span class="red"><i>02</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="2" id="checkbox_02" name="checkbox" class="inputnoborder" acno="02"></span>
		</dd><dd>
		<span class="blue"><i>03</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="3" id="checkbox_03" name="checkbox" class="inputnoborder" acno="03"></span>
		</dd><dd>
		<span class="blue"><i>04</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="4" id="checkbox_04" name="checkbox" class="inputnoborder" acno="04"></span>
		</dd><dd>
		<span class="green"><i>05</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="5" id="checkbox_05" name="checkbox" class="inputnoborder" acno="05"></span>
		</dd><dd>
		<span class="green"><i>06</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="6" id="checkbox_06" name="checkbox" class="inputnoborder" acno="06"></span>
		</dd><dd>
		<span class="red"><i>07</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="7" id="checkbox_07" name="checkbox" class="inputnoborder" acno="07"></span>
		</dd><dd>
		<span class="red"><i>08</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="8" id="checkbox_08" name="checkbox" class="inputnoborder" acno="08"></span>
		</dd><dd>
		<span class="blue"><i>09</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="9" id="checkbox_09" name="checkbox" class="inputnoborder" acno="09"></span>
		</dd><dd>
		<span class="blue"><i>10</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="10" id="checkbox_10" name="checkbox" class="inputnoborder" acno="10"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><span >选择</span>
			</dt>
		<dd>
		<span class="green"><i>11</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="11" id="checkbox_11" name="checkbox" class="inputnoborder" acno="11"></span>
		</dd><dd>
		<span class="red"><i>12</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="12" id="checkbox_12" name="checkbox" class="inputnoborder" acno="12"></span>
		</dd><dd>
		<span class="red"><i>13</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="13" id="checkbox_13" name="checkbox" class="inputnoborder" acno="13"></span>
		</dd><dd>
		<span class="blue"><i>14</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="14" id="checkbox_14" name="checkbox" class="inputnoborder" acno="14"></span>
		</dd><dd>
		<span class="blue"><i>15</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="15" id="checkbox_15" name="checkbox" class="inputnoborder" acno="15"></span>
		</dd><dd>
		<span class="green"><i>16</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="16" id="checkbox_16" name="checkbox" class="inputnoborder" acno="16"></span>
		</dd><dd>
		<span class="green"><i>17</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="17" id="checkbox_17" name="checkbox" class="inputnoborder" acno="17"></span>
		</dd><dd>
		<span class="red"><i>18</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="18" id="checkbox_18" name="checkbox" class="inputnoborder" acno="18"></span>
		</dd><dd>
		<span class="red"><i>19</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="19" id="checkbox_19" name="checkbox" class="inputnoborder" acno="19"></span>
		</dd><dd>
		<span class="blue"><i>20</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="20" id="checkbox_20" name="checkbox" class="inputnoborder" acno="20"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><!--<span>&nbsp;</span>--><span >选择</span>
			</dt>
		<dd>
		<span class="green"><i>21</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="21" id="checkbox_21" name="checkbox" class="inputnoborder" acno="21"></span>
		</dd><dd>
		<span class="green"><i>22</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="22" id="checkbox_22" name="checkbox" class="inputnoborder" acno="22"></span>
		</dd><dd>
		<span class="red"><i>23</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="23" id="checkbox_23" name="checkbox" class="inputnoborder" acno="23"></span>
		</dd><dd>
		<span class="red"><i>24</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="24" id="checkbox_24" name="checkbox" class="inputnoborder" acno="24"></span>
		</dd><dd>
		<span class="blue"><i>25</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="25" id="checkbox_25" name="checkbox" class="inputnoborder" acno="25"></span>
		</dd><dd>
		<span class="blue"><i>26</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="26" id="checkbox_26" name="checkbox" class="inputnoborder" acno="26"></span>
		</dd><dd>
		<span class="green"><i>27</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="27" id="checkbox_27" name="checkbox" class="inputnoborder" acno="27"></span>
		</dd><dd>
		<span class="green"><i>28</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="28" id="checkbox_28" name="checkbox" class="inputnoborder" acno="28"></span>
		</dd><dd>
		<span class="red"><i>29</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="29" id="checkbox_29" name="checkbox" class="inputnoborder" acno="29"></span>
		</dd><dd>
		<span class="red"><i>30</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="30" id="checkbox_30" name="checkbox" class="inputnoborder" acno="30"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><!--<span>&nbsp;</span>--><span >选择</span>
			</dt>
		<dd>
		<span class="blue"><i>31</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="31" id="checkbox_31" name="checkbox" class="inputnoborder" acno="31"></span>
		</dd><dd>
		<span class="green"><i>32</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="32" id="checkbox_32" name="checkbox" class="inputnoborder" acno="32"></span>
		</dd><dd>
		<span class="green"><i>33</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="33" id="checkbox_33" name="checkbox" class="inputnoborder" acno="33"></span>
		</dd><dd>
		<span class="red"><i>34</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="34" id="checkbox_34" name="checkbox" class="inputnoborder" acno="34"></span>
		</dd><dd>
		<span class="red"><i>35</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="35" id="checkbox_35" name="checkbox" class="inputnoborder" acno="35"></span>
		</dd><dd>
		<span class="blue"><i>36</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="36" id="checkbox_36" name="checkbox" class="inputnoborder" acno="36"></span>
		</dd><dd>
		<span class="blue"><i>37</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="37" id="checkbox_37" name="checkbox" class="inputnoborder" acno="37"></span>
		</dd><dd>
		<span class="green"><i>38</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="38" id="checkbox_38" name="checkbox" class="inputnoborder" acno="38"></span>
		</dd><dd>
		<span class="green"><i>39</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="39" id="checkbox_39" name="checkbox" class="inputnoborder" acno="39"></span>
		</dd><dd>
		<span class="red"><i>40</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="40" id="checkbox_40" name="checkbox" class="inputnoborder" acno="40"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><span>&nbsp;</span><span style="margin-left: -7px;">选择</span>
			</dt>
		<dd>
		<span class="blue"><i>41</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="41" id="checkbox_41" name="checkbox" class="inputnoborder" acno="41"></span>
		</dd><dd>
		<span class="blue"><i>42</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="42" id="checkbox_42" name="checkbox" class="inputnoborder" acno="42"></span>
		</dd><dd>
		<span class="green"><i>443</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="43" id="checkbox_43" name="checkbox" class="inputnoborder" acno="43"></span>
		</dd><dd>
		<span class="green"><i>44</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="44" id="checkbox_44" name="checkbox" class="inputnoborder" acno="44"></span>
		</dd><dd>
		<span class="red"><i>45</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="45" id="checkbox_45" name="checkbox" class="inputnoborder" acno="45"></span>
		</dd><dd>
		<span class="red"><i>46</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="46" id="checkbox_46" name="checkbox" class="inputnoborder" acno="46"></span>
		</dd><dd>
		<span class="blue"><i>47</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="47" id="checkbox_47" name="checkbox" class="inputnoborder" acno="47"></span>
		</dd><dd>
		<span class="blue"><i>48</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="48" id="checkbox_48" name="checkbox" class="inputnoborder" acno="48"></span>
		</dd>
		<dd>
		<span class="green"><i>49</i></span><!--<span class="num"></span>-->
		<span class="input"><input type="checkbox" value="49" id="checkbox_49" name="checkbox" class="inputnoborder" acno="49"></span>
		</dd><dd style="height: 34px; border-bottom: 1px solid #F0AD4E;">
		</dd>
		</dl>
		
		
    </div>    
		</div>
     </div>
		
	    <div id="dResult">
		
        <input type="hidden" id="txtRate" value="0">
        <input type="button" value="重设" onclick="resetTotal();" class="anniu" name="重设">
        <input type="button" value="确定" onclick="checkToSubmit();" class="anniu" name="确定">
            
   <div class="chooseMsg1">
   <span>元</span><span id="sTotalCredit">0</span><span>总金额共</span>
        <input type="text" name="sTotalBeishu" id="sTotalBeishu" value="1" class="beishu" />
        <span>倍数</span>
    </div>