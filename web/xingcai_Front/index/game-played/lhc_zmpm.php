<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	
</style>
<div class="dGameStatus hklhc lotteryView_lhc" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox" >
		<dl>
			<dt>
		<span>号码</span><span>赔率</span><span>金额</span>
			</dt>
		<dd>
		<span class="red"><i>01</i></span><span class="num"><?=$this->getLHCRte('RteLO01',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO01" name="LOTTO" acno="01" type="text"></span>
		</dd>
		<dd>
		<span class="red"><i>02</i></span><span class="num"><?=$this->getLHCRte('RteLO02',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO02" name="LOTTO" acno="02" type="text"></span>
		</dd><dd>
		<span class="blue"><i>03</i></span><span class="num"><?=$this->getLHCRte('RteLO03',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO03" name="LOTTO" acno="03" type="text"></span>
		</dd><dd>
		<span class="blue"><i>04</i></span><span class="num"><?=$this->getLHCRte('RteLO04',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO04" name="LOTTO" acno="04" type="text"></span>
		</dd><dd>
		<span class="green"><i>05</i></span><span class="num"><?=$this->getLHCRte('RteLO05',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO05" name="LOTTO" acno="05" type="text"></span>
		</dd><dd>
		<span class="green"><i>06</i></span><span class="num"><?=$this->getLHCRte('RteLO06',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO06" name="LOTTO" acno="06" type="text"></span>
		</dd><dd>
		<span class="red"><i>07</i></span><span class="num"><?=$this->getLHCRte('RteLO07',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO07" name="LOTTO" acno="07" type="text"></span>
		</dd><dd>
		<span class="red"><i>08</i></span><span class="num"><?=$this->getLHCRte('RteLO08',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO08" name="LOTTO" acno="08" type="text"></span>
		</dd><dd>
		<span class="blue"><i>09</i></span><span class="num"><?=$this->getLHCRte('RteLO09',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO09" name="LOTTO" acno="09" type="text"></span>
		</dd><dd>
		<span class="blue"><i>10</i></span><span class="num"><?=$this->getLHCRte('RteLO10',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO10" name="LOTTO" acno="10" type="text"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><span>赔率</span><span>金额</span>
			</dt>
		<dd>
		<span class="green"><i>11</i></span><span class="num"><?=$this->getLHCRte('RteLO11',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO11" name="LOTTO"  acno="11" type="text"></span>
		</dd><dd>
		<span class="red"><i>12</i></span><span class="num"><?=$this->getLHCRte('RteLO12',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO12" name="LOTTO" acno="12" type="text"></span>
		</dd><dd>
		<span class="red"><i>13</i></span><span class="num"><?=$this->getLHCRte('RteLO13',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO13" name="LOTTO" acno="13" type="text"></span>
		</dd><dd>
		<span class="blue"><i>14</i></span><span class="num"><?=$this->getLHCRte('RteLO14',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO14" name="LOTTO" acno="14" type="text"></span>
		</dd><dd>
		<span class="blue"><i>15</i></span><span class="num"><?=$this->getLHCRte('RteLO15',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO15" name="LOTTO" acno="14" type="text"></span>
		</dd><dd>
		<span class="green"><i>16</i></span><span class="num"><?=$this->getLHCRte('RteLO16',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO16" name="LOTTO" acno="16" type="text"></span>
		</dd><dd>
		<span class="green"><i>17</i></span><span class="num"><?=$this->getLHCRte('RteLO17',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO17" name="LOTTO" acno="17" type="text"></span>
		</dd><dd>
		<span class="red"><i>18</i></span><span class="num"><?=$this->getLHCRte('RteLO18',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO18" name="LOTTO" acno="18" type="text"></span>
		</dd><dd>
		<span class="red"><i>19</i></span><span class="num"><?=$this->getLHCRte('RteLO19',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO19" name="LOTTO" acno="19" type="text"></span>
		</dd><dd>
		<span class="blue"><i>20</i></span><span class="num"><?=$this->getLHCRte('RteLO20',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO20" name="LOTTO" acno="20" type="text"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><span>赔率</span><span>金额</span>
			</dt>
		<dd>
		<span class="green"><i>21</i></span><span class="num"><?=$this->getLHCRte('RteLO21',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO21" name="LOTTO"  acno="21" type="text"></span>
		</dd><dd>
		<span class="green"><i>22</i></span><span class="num"><?=$this->getLHCRte('RteLO22',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO22" name="LOTTO"  acno="22" type="text"></span>
		</dd><dd>
		<span class="red"><i>23</i></span><span class="num"><?=$this->getLHCRte('RteLO23',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO23" name="LOTTO"  acno="23" type="text"></span>
		</dd><dd>
		<span class="red"><i>24</i></span><span class="num"><?=$this->getLHCRte('RteLO24',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO24" name="LOTTO"  acno="24" type="text"></span>
		</dd><dd>
		<span class="blue"><i>25</i></span><span class="num"><?=$this->getLHCRte('RteLO25',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO25" name="LOTTO"  acno="25" type="text"></span>
		</dd><dd>
		<span class="blue"><i>26</i></span><span class="num"><?=$this->getLHCRte('RteLO26',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO26" name="LOTTO"  acno="26" type="text"></span>
		</dd><dd>
		<span class="green"><i>27</i></span><span class="num"><?=$this->getLHCRte('RteLO27',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO27" name="LOTTO"  acno="27" type="text"></span>
		</dd><dd>
		<span class="green"><i>28</i></span><span class="num"><?=$this->getLHCRte('RteLO28',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO28" name="LOTTO"  acno="28" type="text"></span>
		</dd><dd>
		<span class="red"><i>29</i></span><span class="num"><?=$this->getLHCRte('RteLO29',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO29" name="LOTTO"  acno="29" type="text"></span>
		</dd><dd>
		<span class="red"><i>30</i></span><span class="num"><?=$this->getLHCRte('RteLO30',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO30" name="LOTTO"  acno="30" type="text"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><span>赔率</span><span>金额</span>
			</dt>
		<dd>
		<span class="blue"><i>31</i></span><span class="num"><?=$this->getLHCRte('RteLO31',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO31" name="LOTTO" acno="31" type="text"></span>
		</dd><dd>
		<span class="green"><i>32</i></span><span class="num"><?=$this->getLHCRte('RteLO32',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO32" name="LOTTO" acno="32" type="text"></span>
		</dd><dd>
		<span class="green"><i>33</i></span><span class="num"><?=$this->getLHCRte('RteLO33',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO33" name="LOTTO" acno="33" type="text"></span>
		</dd><dd>
		<span class="red"><i>34</i></span><span class="num"><?=$this->getLHCRte('RteLO34',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLOTTO34" name="LOTTO" acno="34" type="text"></span>
		</dd><dd>
		<span class="red"><i>35</i></span><span class="num"><?=$this->getLHCRte('RteLO35',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO35" name="LOTTO" acno="35" type="text"></span>
		</dd><dd>
		<span class="blue"><i>36</i></span><span class="num"><?=$this->getLHCRte('RteLO36',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO36" name="LOTTO" acno="36" type="text"></span>
		</dd><dd>
		<span class="blue"><i>37</i></span><span class="num"><?=$this->getLHCRte('RteLO37',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO37" name="LOTTO" acno="37" type="text"></span>
		</dd><dd>
		<span class="green"><i>38</i></span><span class="num"><?=$this->getLHCRte('RteLO38',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO38" name="LOTTO" acno="38" type="text"></span>
		</dd><dd>
		<span class="green"><i>39</i></span><span class="num"><?=$this->getLHCRte('RteLO39',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO39" name="LOTTO" acno="39" type="text"></span>
		</dd><dd>
		<span class="red"><i>40</i></span><span class="num"><?=$this->getLHCRte('RteLO40',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO40" name="LOTTO" acno="40" type="text"></span>
		</dd></dl>
		<dl>
			<dt>
		<span>号码</span><span>赔率</span><span>金额</span>
			</dt>
		<dd>
		<span class="blue"><i>41</i></span><span class="num"><?=$this->getLHCRte('RteLO41',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO41" name="LOTTO" acno="41" type="text"></span>
		</dd><dd>
		<span class="blue"><i>42</i></span><span class="num"><?=$this->getLHCRte('RteLO42',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO42" name="LOTTO" acno="42" type="text"></span>
		</dd><dd>
		<span class="green"><i>43</i></span><span class="num"><?=$this->getLHCRte('RteLO43',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO43" name="LOTTO" acno="43" type="text"></span>
		</dd><dd>
		<span class="green"><i>44</i></span><span class="num"><?=$this->getLHCRte('RteLO44',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO44" name="LOTTO" acno="44" type="text"></span>
		</dd><dd>
		<span class="red"><i>45</i></span><span class="num"><?=$this->getLHCRte('RteLO45',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO45" name="LOTTO" acno="45" type="text"></span>
		</dd><dd>
		<span class="red"><i>46</i></span><span class="num"><?=$this->getLHCRte('RteLO46',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO46" name="LOTTO" acno="46" type="text"></span>
		</dd><dd>
		<span class="blue"><i>47</i></span><span class="num"><?=$this->getLHCRte('RteLO47',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO47" name="LOTTO" acno="47" type="text"></span>
		</dd><dd>
		<span class="blue"><i>48</i></span><span class="num"><?=$this->getLHCRte('RteLO48',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO48" name="LOTTO" acno="48" type="text"></span>
		</dd>
		<dd>
		<span class="green"><i>49</i></span><span class="num"><?=$this->getLHCRte('RteLO49',$this->played)?></span>
		<span class="input"><input maxlength="5" id="RteLO49" name="LOTTO" acno="49" type="text"></span>
		</dd><dd style="height: 34px; border-bottom: 1px solid #F0AD4E;">
		</dd>
		</dl>
		
		
		<div class="dGameStatus hklhc lotteryView_lhc1" action="tzlhcSelect" length="1">
                <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox1" >
		<dl>
			<dt>
		<span>号码</span><span >赔率</span><span>金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">总大</span><span class="num" ><?=$this->getLHCRte('RteLTTBSOED',$this->played)?></span>
		<span class="input"  style="width: 131px !important;"><input maxlength="5" style="width: 107px;" id="RteLTTBSOED" name="LTTBSOE" acno="总大" type="text"></span>
		</dd>
		</dl>
			<dl>
		<dt>
		<span>号码</span><span >赔率</span><span >金额</span>
			</dt>
		<dd>
		<span class="sGameStatusItem">总小</span><span class="num" ><?=$this->getLHCRte('RteLTTBSOES',$this->played)?></span>
		<span class="input"  style="width: 131px !important;"><input maxlength="5" style="width: 107px;" id="RteLTTBSOES" name="LTTBSOE" acno="总小" type="text"></span>
		</dd>
			</dl>
			<dl>
		<dt>
		<span>号码</span><span >赔率</span><span >金额</span>
			</dt>
		<dd>
		<span id="LOTTOTBSOED" class="sGameStatusItem">总单</span><span class="num" ><?=$this->getLHCRte('RteLTTBSOEO',$this->played)?></span>
		<span class="input"  style="width: 131px !important;"><input maxlength="5" style="width: 107px;" id="RteLTTBSOEO" name="LTTBSOE" acno="总单" type="text"></span>
		</dd>
			</dl>
			<dl>
		<dt>
		<span>号码</span><span >赔率</span><span 金额</span>
			</dt>
		<dd>
		<span id="LOTTOTBSOEO" class="sGameStatusItem">总双</span><span class="num" ><?=$this->getLHCRte('RteLTTBSOEE',$this->played)?></span>
		<span class="input"  style="width: 131px !important;"><input style="width: 107px;" maxlength="5" id="RteLTTBSOEE" name="LTTBSOE" acno="总双" type="text"></span>
		</dd>
			</dl>

    
		</div>
                 
         </div>
              </div>    </div>    </div>
            </div>
		
				<div class="addOrderBox" >
                <div class="addOrderLeft addOrderLeft625">
                                   
                   <input type="button" class="addBtn" onclick="bringRte();" value="添加投注">
                    <div class="chooseMsg">
                        <p>总金额共 <span id="sTotalCredit">0</span> 元</p>
                    </div>
                </div>
           
            </div>