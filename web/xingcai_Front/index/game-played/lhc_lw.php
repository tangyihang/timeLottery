<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />

	<div class="dGameStatus hklhc lotteryView_sxtw" action="tzlhcSelect" length="1">
		<div class="Contentbox" id="Contentbox_0">
		
			<div class="sxtwBox" >
		
		<div class="dGameStatus hklhc lotteryView_lhc1" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox1" >
		<dl>
			<dt class="sxtitle">
		<span >类别</span><span >赔率</span><span class="border-r-none">选择</span>
			</dt>
		<dd class="sxcontent">
		<span class="sGameStatusItem">二尾碰</span><span class="num" ><?=$this->getLHCRte('RteSNSD2',$this->played)?></span>
		<span class="input border-r-none"><input id="RteSNSD2" type="radio" value="SNSD2" name="txtGameItem" rel="2" pri="<?=$this->getLHCRte('RteSNSD2',$this->played)?>" class="inputnoborder"></span>
		</dd>
		</dl>
			<dl>
		<dt class="sxtitle">
		<span >类别</span><span>赔率</span><span class="border-r-none">选择</span>
			</dt>
		<dd class="sxcontent">
		<span class="sGameStatusItem">三尾碰</span><span class="num" ><?=$this->getLHCRte('RteSNSD3',$this->played)?></span>
		<span class="input border-r-none" ><input id="RteSNSD3" type="radio" value="SNSD3" name="txtGameItem" rel="3" pri="<?=$this->getLHCRte('RteSNSD3',$this->played)?>" class="inputnoborder"></span>
		</dd>
			</dl>
			<dl>
		<dt class="sxtitle">
		<span >类别</span><span >赔率</span><span class="border-r-none">选择</span>
			</dt>
		<dd class="sxcontent">
		<span id="LOTTOTBSOED" class="sGameStatusItem">四尾碰</span><span class="num"><?=$this->getLHCRte('RteSNSD4',$this->played)?></span>
		<span class="input border-r-none"><input id="RteSNSD4"  type="radio" value="SNSD4" name="txtGameItem" rel="4" pri="<?=$this->getLHCRte('RteSNSD4',$this->played)?>" class="inputnoborder"></span>
		</dd>
			</dl>
			<dl>
		<dt class="sxtitle">
		<span >类别</span><span >赔率</span><span class="border-r-none">选择</span>
			</dt>
		<dd class="sxcontent">
		<span id="LOTTOTBSOEO" class="sGameStatusItem">五尾碰</span><span class="num"><?=$this->getLHCRte('RteSNSD5',$this->played)?></span>
		<span class="input border-r-none" ><input id="RteSNSD5"  type="radio" value="SNSD5" name="txtGameItem" rel="5" pri="<?=$this->getLHCRte('RteSNSD5',$this->played)?>" class="inputnoborder"></span>
		</dd>
			</dl>

    
		</div>
                 
         </div>
              </div>
			  
			  
			  
		<dl class="border-r-none">
			<dt class="sxtitle">
		<span class="sp1">尾数</span><span class="sp2">号码</span><span class="sp3 border-r-none">选择</span>
			</dt>
		<dd class="sxbody">
		<span class="sGameStatusItem">0尾</span>
		<a class="code-box">
			<span  class="blue">10</span>
			<span class="green">20</span>
			<span class="green">30</span>
			<span class="red">40</span>
		</a>
		
	<!--	<span style="margin-left:60px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="0" id="SD0" name="txtSD"  acno="0尾" class="inputnoborder"></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">1尾</span>
		<a class="code-box">
			<span class="red">01</span>
			<span class="blue">11</span>
			<span class="green">21</span>
			<span class="green">31</span>
		</a>
		
		<!--<span class="green">41</span><span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="1" id="SD1" name="txtSD" acno="1尾" class="inputnoborder"></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">2尾</span>
		<a class="code-box">
			<span class="red">02</span>
			<span class="red">12</span>
			<span class="blue">22</span>
			<span class="green">32</span>
		</a>
		
		<!--<span class="green">42</span><span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="2" id="SD2" name="txtSD" acno="2尾" class="inputnoborder"/></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">3尾</span>
	  <a class="code-box">
	  	<span class="green">03</span>
		<span class="red">13</span>
		<span class="red">23</span>
		<span class="blue">33</span>
		<span class="green">43</span>
	  </a>
		
		<!--<span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="3" id="SD3" name="txtSD" acno="3尾" class="inputnoborder"></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">4尾</span>
		<a class="code-box">
			<span  class="green">04</span>
		<span class="green">14</span>
		<span class="red">24</span>
		<span class="blue">34</span>
		<span class="green">44</span>
		</a>
		
		<!--<span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="4" id="SD4" name="txtSD" acno="4尾" class="inputnoborder"></span>
		</dd>
		</dl>
		<dl >
			<dt class="sxtitle">
		<span class="sp1">尾数</span><span class="sp2">号码</span><span class="sp3 border-r-none">选择</span>
			</dt>
		<dd class="sxbody">
		<span class="sGameStatusItem">5尾</span>
		<a class="code-box">
			<span class="blue">05</span>
			<span class="blue">15</span>
			<span class="green">25</span>
			<span class="green">35</span>
			<span class="green">45</span>
		</a>
		
		<!--<span  class="num"></span>-->
		<span class="input"><input type="checkbox" value="5" id="SD5" name="txtSD" acno="5尾" class="inputnoborder"></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">6尾</span>
		<a class="code-box">
			<span  class="red">06</span>
			<span class="blue">16</span>
			<span class="blue">26</span>
			<span class="green">36</span>
			<span class="green">46</span>
		</a>
		
		<!--<span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="6" id="SD6" name="txtSD" acno="6尾" class="inputnoborder"></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">7尾</span>
		<a class="code-box">
			<span  class="red">07</span>
			<span class="blue">17</span>
			<span class="blue">27</span>
			<span class="green">37</span>
			<span class="green">47</span>
		</a>
		
		<!--<span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="7" id="SD7" name="txtSD" acno="7尾" class="inputnoborder"></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">8尾</span>
		<a class="code-box">
			<span  class="red">08</span>
			<span class="red">18</span>
			<span class="blue">28</span>
			<span class="blue">38</span>
			<span class="blue">48</span>
		</a>
		
		<!--<span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="8" id="SD8" name="txtSD" acno="8尾" class="inputnoborder"></span>
		</dd>
		<dd class="sxbody">
		<span class="sGameStatusItem">9尾</span>
		<a class="code-box">
			<span class="green">09</span>
			<span class="red">19</span>
			<span class="red">29</span>
			<span class="blue">39</span>
			<span class="blue">49</span>
		</a>
		
	<!--	<span style="margin-left:27px;" class="num"></span>-->
		<span class="input"><input type="checkbox" value="9" id="SD9" name="txtSD" acno="9尾" class="inputnoborder"></span>
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