<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.lotteryView_lhc5 .lhcBox5 dl{
	border-right: none !important;
	border-bottom: 1px solid #F0AD4E !important;
}
input{
	border-color: #b0b0b0 !important;
}
</style>
<div class="dGameStatus lotteryView_lhc4">
        
                <div class="Contentbox" id="Contentbox_0">
        <div class="specialtr lhcBox4" >
		
		<table>
            <tbody>
		<dl class="border-r-none">
			<dt class="sxtitle">
		<span class="pjfp">类型</span><span class="pjfp">赔率</span><span class="border-r-none pjfp">金额</span>
			</dt>
		<dd>
		<span id="RteNOHIT5" class="sGameStatusItem pjfp m0">五不中</span><span class="num pjfp" ><?=$this->getLHCRte('RteNOHIT5',$this->played)?></span>
		<span class="input pjfp border-r-none" ><input id="RteNOHIT5" class="mt5" type="radio" value="NOHIT5" name="txtGameItem" rel="5" pri="<?=$this->getLHCRte('RteNOHIT5',$this->played)?>" maxlen="500" class="inputnoborder"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp m0">六不中</span><span class="num pjfp" ><?=$this->getLHCRte('RteNOHIT6',$this->played)?></span>
		<span class="input pjfp border-r-none " ><input type="radio" class="mt5" value="NOHIT6" name="txtGameItem" rel="6" pri="<?=$this->getLHCRte('RteNOHIT6',$this->played)?>" maxlen="450" class="inputnoborder"></span>
		</dd>
		</dl>
			<dl class="border-r-none">
		<dt class="sxtitle">
		<span class="pjfp">类型</span><span class="pjfp">赔率</span><span class="pjfp border-r-none">金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem pjfp m0">七不中</span><span class="num pjfp" ><?=$this->getLHCRte('RteNOHIT7',$this->played)?></span>
		<span class="input pjf border-r-none" ><input type="radio" value="NOHIT7" class="mt5" name="txtGameItem" rel="7" pri="<?=$this->getLHCRte('RteNOHIT7',$this->played)?>" maxlen="420" class="inputnoborder"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp m0">八不中</span><span class="num pjfp" ><?=$this->getLHCRte('RteNOHIT8',$this->played)?></span>
		<span class="input pjfp border-r-none" ><input type="radio" class="mt5" value="NOHIT8" name="txtGameItem" rel="8" pri="<?=$this->getLHCRte('RteNOHIT8',$this->played)?>" maxlen="400" class="inputnoborder"></span>
		</dd>
			</dl>
			<dl class="border-r-none">
		<dt class="sxtitle">
		<span class="pjfp">类型</span><span class="pjfp">赔率</span><span class="pjfp border-r-none">金额</span>
			</dt>
		<dd>
		<span id="LOTTOTBSOED" class="sGameStatusItem pjfp m0">九不中</span><span class="num pjfp" ><?=$this->getLHCRte('RteNOHIT9',$this->played)?></span>
		<span class="input border-r-none pjfp"><input type="radio" value="NOHIT9" name="txtGameItem"  class="mt5" pri="<?=$this->getLHCRte('RteNOHIT9',$this->played)?>" maxlen="220" class="inputnoborder"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp m0">十不中</span><span class="num pjfp"><?=$this->getLHCRte('RteNOHIT10',$this->played)?></span>
		<span class="input border-r-none pjfp" ><input type="radio" class="mt5" value="NOHIT10" name="txtGameItem" rel="10" pri="<?=$this->getLHCRte('RteNOHIT10',$this->played)?>" maxlen="200" class="inputnoborder"></span>
		</dd>
			</dl>
			<dl >
		<dt class="sxtitle">
		<span class="pjfp">类型</span><span class="pjfp">赔率</span><span class="pjfp border-r-none">金额</span>
			</dt>
		<dd>
		<span id="LOTTOTBSOEO" class="sGameStatusItem m0 pjfp">十一不中</span><span class="num pjfp" ><?=$this->getLHCRte('RteNOHIT11',$this->played)?></span>
		<span class="input pjfp border-r-none" ><input type="radio" class="mt5" value="NOHIT11" name="txtGameItem" rel="11" pri="<?=$this->getLHCRte('RteNOHIT11',$this->played)?>" maxlen="180" class="inputnoborder"></span>
		</dd>
		<dd>
		<span class="sGameStatusItem pjfp m0">十二不中</span><span class="num pjfp" ><?=$this->getLHCRte('RteNOHIT12',$this->played)?></span>
		<span class="input pjfp border-r-none" ><input type="radio" class="mt5" value="NOHIT12" name="txtGameItem" rel="12" pri="<?=$this->getLHCRte('RteNOHIT12',$this->played)?>" maxlen="150" class="inputnoborder"></span>
		</dd>
			</dl>
			</tbody></table>
		</div>

		        <span class="sTitle"><span id="sItemTitle"></span><span class="sNote" id="sExplain"></span></span>
			<div class="specialtable lotteryView_lhc5">
                <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox5">
		<dl>
			<dt class="sxtitle">
		<span class="pjfp5">号码</span><span></span><span class="pjfp5 border-r-none">选择</span>
			</dt>
		<dd>
		<span class="red pjfp5 m0"><i>01</i></span>
		<span class="input pjfp5 border-r-none"><input type="checkbox" class="mt5" value="01" id="checkbox_01" class="inputnoborder" acno="01"></span>
		</dd>
		<dd>
		<span class="red pjfp5 m0"><i>02</i></span>
		<span class="input pjfp5 border-r-none"><input type="checkbox"  class="mt5" value="02" id="checkbox_02" class="inputnoborder" acno="02"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>03</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" class="mt5" value="03" id="checkbox_03" class="inputnoborder" acno="03"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>04</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" class="mt5" value="04" id="checkbox_04" class="inputnoborder" acno="04"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>05</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" class="mt5" value="05" id="checkbox_05" class="inputnoborder" acno="05"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>06</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" class="mt5" value="06" id="checkbox_06" class="inputnoborder" acno="06"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>07</i></span>
		<span class="input border-r-none pjfp5"><input type="checkbox" value="07" class="mt5" id="checkbox_07" class="inputnoborder" acno="07"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>08</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="08" class="mt5" id="checkbox_08" class="inputnoborder" acno="08"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>09</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="09" class="mt5" id="checkbox_09" class="inputnoborder" acno="09"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>10</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="10" class="mt5" id="checkbox_10" class="inputnoborder" acno="10"></span>
		</dd></dl>
		<dl>
			<dt class="sxtitle">
		<span class="pjfp5">号码</span><span></span><span class="pjfp5 border-r-none">选择</span>
			</dt>
		<dd>
		<span class="green pjfp5 m0"><i>11</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="11"  class="mt5" id="checkbox_11" class="inputnoborder" acno="11"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>12</i></span> 
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="12" class="mt5" id="checkbox_12" class="inputnoborder" acno="12"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>13</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="13" class="mt5" id="checkbox_13" class="inputnoborder" acno="13"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>14</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="14" class="mt5" id="checkbox_14" class="inputnoborder" acno="14"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>15</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="15" class="mt5" id="checkbox_15" class="inputnoborder" acno="15"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>16</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="16"  class="mt5" id="checkbox_16" class="inputnoborder" acno="16"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>17</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="17" class="mt5" id="checkbox_17" class="inputnoborder" acno="17"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>18</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="18" class="mt5" id="checkbox_18" class="inputnoborder" acno="18"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>19</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="19" class="mt5" id="checkbox_19" class="inputnoborder" acno="19"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>20</i></span>
		<span class="input border-r-none pjfp5"><input s type="checkbox" value="20" class="mt5" id="checkbox_20" class="inputnoborder" acno="20"></span>
		</dd></dl>
		<dl>
			<dt class="sxtitle">
		<span class="pjfp5">号码</span><span></span><span class="pjfp5 border-r-none">选择</span>
			</dt>
		<dd>
		<span class="green pjfp5 m0"><i>21</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="21" class="mt5" id="checkbox_21" class="inputnoborder" acno="21"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>22</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="22" class="mt5" id="checkbox_22" class="inputnoborder" acno="22"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>23</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="23" class="mt5" id="checkbox_23" class="inputnoborder" acno="23"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>24</i></span>
		<span class="input border-r-none pjfp5"><input type="checkbox" value="24" class="mt5" id="checkbox_24" class="inputnoborder" acno="24"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>25</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="25" class="mt5" id="checkbox_25" class="inputnoborder" acno="25"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>26</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="26"  class="mt5" id="checkbox_26" class="inputnoborder" acno="26"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>27</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="27" class="mt5" id="checkbox_27" class="inputnoborder" acno="27"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>28</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="28" class="mt5" id="checkbox_28" class="inputnoborder" acno="28"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>29</i></span>
		<span class="input border-r-none pjfp5"><input type="checkbox" value="29"  class="mt5" id="checkbox_29" class="inputnoborder" acno="29"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>30</i></span>
		<span class="input border-r-none pjfp5"><input type="checkbox" value="30"  class="mt5" id="checkbox_30" class="inputnoborder" acno="30"></span>
		</dd></dl>
		<dl>
			<dt class="sxtitle">
		<span class="pjfp5">号码</span><span></span><span class="pjfp5 border-r-none">选择</span>
			</dt>
		<dd>
		<span class="blue pjfp5 m0"><i>31</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="31" class="mt5"  id="checkbox_31" class="inputnoborder" acno="31"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>32</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="32" class="mt5"  id="checkbox_32" class="inputnoborder" acno="32"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>33</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="33" class="mt5"  id="checkbox_33" class="inputnoborder" acno="33"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>34</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="34" class="mt5"  id="checkbox_34" class="inputnoborder" acno="34"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>35</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="35"  class="mt5" id="checkbox_35" class="inputnoborder" acno="35"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>36</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="36" class="mt5"  id="checkbox_36" class="inputnoborder" acno="36"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>37</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="37" class="mt5"  id="checkbox_37" class="inputnoborder" acno="37"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>38</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="38" class="mt5"  id="checkbox_38" class="inputnoborder" acno="38"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>39</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="39" class="mt5"  id="checkbox_39" class="inputnoborder" acno="39"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>40</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="40" class="mt5"  id="checkbox_40" class="inputnoborder" acno="40"></span>
		</dd></dl>
		<dl style="border-right: 1px solid #F0AD4E !important;">
			<dt class="sxtitle">
		<span class="pjfp5">号码</span><span></span><span class="pjfp5 border-r-none">选择</span>
			</dt>
		<dd>
		<span class="blue pjfp5 m0"><i>41</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="41" class="mt5" id="checkbox_41" class="inputnoborder" acno="41"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>42</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="42" class="mt5" id="checkbox_42" class="inputnoborder" acno="42"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>43</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="43" class="mt5" id="checkbox_43" class="inputnoborder" acno="43"></span>
		</dd><dd>
		<span class="green pjfp5 m0"><i>44</i></span>
		<span class="input border-r-none pjfp5"><input type="checkbox" value="44" class="mt5" id="checkbox_44" class="inputnoborder" acno="44"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>45</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="45" id="checkbox_45" class="inputnoborder" acno="45"></span>
		</dd><dd>
		<span class="red pjfp5 m0"><i>46</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="46" class="mt5" id="checkbox_46" class="inputnoborder" acno="46"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>47</i></span>
		<span class="input border-r-none pjfp5"><input  type="checkbox" value="47" class="mt5" id="checkbox_47" class="inputnoborder" acno="47"></span>
		</dd><dd>
		<span class="blue pjfp5 m0"><i>48</i></span>
		<span class="input border-r-none pjfp5"><input type="checkbox" value="48" class="mt5" id="checkbox_48" class="inputnoborder" acno="48"></span>
		</dd>
		<dd style="border-bottom: 1px solid #F0AD4E; ">
		<span class="green pjfp5 m0" ><i>49</i></span>
		<span class="input border-r-none pjfp5" ><input type="checkbox" value="49" class="mt5"  id="checkbox_49" class="inputnoborder" acno="49"></span>

		</dd><dd style="height: 34px;">
		</dd>
		</dl>
		 </div>    </div>
            </div>

		<table class="betnum1">
                <tbody><tr>
                  
                </tr>
                <tr>
                    <td>
                        <div readonly="" multiple="" id="mulCollocation" name="mulCollocation"></div>
                    </td>
                </tr>
            </tbody>
			</table>
	
		

    
		   </div>    </div>
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