<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style type="text/css">
	.lotteryView_lhc .lhcBox dl dd span{
		color: #000;
		font-size: 15px;
	}
	.lotteryView_lhc .lhcBox dl dd span.titles{
		line-height: 52px;
		padding-left: 10px;
	}
	.lotteryView_lhc .lhcBox dl dd span.num{
	 display: block;
	 width: 100% !important;
	 text-align: center;
		color:red;
		border: none;
		height: 20px !important;
		line-height: 20px;
	}
	.lotteryView_lhc .lhcBox dl dd span.input{
	  display: block;
	  width: 100% !important;
	  height: 29px !important;
	}
	.lotteryView_lhc .lhcBox dl dd span.input input{
		width: 80% !important;
		display: block;
		padding: 0;
		margin: 4px auto !important;
		margin-left: 0;
	}
	.lotteryView_lhc .lhcBox dl dd span input{
		width: 50px;
	}
	.lotteryView_lhc .lhcBox dl dd{
		height: 50px;
	}
	.lotteryView_lhc .lhcBox dl {
		width:150px;
	}
	.lotteryView_lhc .lhcBox dl dd span.titles.pjfp5{
		margin: 0 !important;
    width: 50% !important;
    margin-left: -1px !important;
    border-right: 1px solid #F0AD4E;
    padding: 0 !important;
    height: 49px !important;
    line-height: 50px !important;
    border-top: none;
    border-bottom: 1px solid #F0AD4E;
    text-align: center;
	}
	.lotteryView_lhc .lhcBox dl dd a.input-box.pjfp5{
		margin: 0 !important;
    width: 50% !important;
    margin-left: -1px !important;
    border-right: 1px solid #F0AD4E;
    padding: 0 !important;
    height: 49px !important;
    line-height: 50px !important;
    border-top: none;
    border-bottom: 1px solid #F0AD4E;
    text-align: center;
    float: left;
	}
	
</style>
<div class="dGameStatus hklhc lotteryView_lhc" action="tzlhcSelect" length="1">
      <div class="Contentbox" id="Contentbox_0">
        <div class="lhcBox" >
		<dl class="border-r-none">
			<dt>
				正码一
			</dt>
			<?php $data = $this->getLHCInfo($this->played,1);
				foreach ($data as $val) { ?>
			<dd>
				<span class="titles pjfp5"><?=$val['rName']?></span>
				<a class="input-box pjfp5">
					<span class="num"><?=$val['Rte']?></span>
				  <span class="input"><input maxlength="5" id="<?=$val['flag']?>" name="LOTTO" acno="01" type="text"></span>
				</a>
			</dd>

			<?php	}
			?>
			
		</dl>
		<dl class="border-r-none">
			<dt>
				正码二
			</dt>
			<?php $data = $this->getLHCInfo($this->played,2);
				foreach ($data as $val) { ?>
			<dd>
				<span class="titles pjfp5"><?=$val['rName']?></span>
				<a class="input-box pjfp5">
					<span class="num"><?=$val['Rte']?></span>
				  <span class="input"><input maxlength="5" id="<?=$val['flag']?>" name="LOTTO" acno="01" type="text"></span>
				</a>
				
			</dd>

			<?php	}
			?>
			
		</dl>
		<dl class="border-r-none">
			<dt>
				正码三
			</dt>
			<?php $data = $this->getLHCInfo($this->played,3);
				foreach ($data as $val) { ?>
			<dd>
				<span class="titles pjfp5"><?=$val['rName']?></span>
				<a class="input-box pjfp5">
					<span class="num"><?=$val['Rte']?></span>
				  <span class="input"><input maxlength="5" id="<?=$val['flag']?>" name="LOTTO" acno="01" type="text"></span>
				</a>
				
			</dd>

			<?php	}
			?>
			
		</dl>
		<dl class="border-r-none">
			<dt>
				正码四
			</dt>
			<?php $data = $this->getLHCInfo($this->played,4);
				foreach ($data as $val) { ?>
			<dd>
				<span class="titles pjfp5"><?=$val['rName']?></span>
				<a class="input-box pjfp5">
					<span class="num"><?=$val['Rte']?></span>
					<span class="input"><input maxlength="5" id="<?=$val['flag']?>" name="LOTTO" acno="01" type="text"></span>
				</a>
				
			</dd>

			<?php	}
			?>
			
		</dl>
		<dl class="border-r-none">
			<dt>
				正码五
			</dt>
			<?php $data = $this->getLHCInfo($this->played,5);
				foreach ($data as $val) { ?>
			<dd>
				<span class="titles pjfp5"><?=$val['rName']?></span>
				<a class="input-box pjfp5">
					<span class="num"><?=$val['Rte']?></span>
					<span class="input"><input maxlength="5" id="<?=$val['flag']?>" name="LOTTO" acno="01" type="text"></span>
				</a>
				
			</dd>

			<?php	}
			?>
			
		</dl>
		<dl class="border-r-none">
			<dt>
				正码六
			</dt>
			<?php $data = $this->getLHCInfo($this->played,6);
				foreach ($data as $val) { ?>
			<dd>
				<span class="titles pjfp5"><?=$val['rName']?></span>
				<a class="input-box pjfp5">
					<span class="num"><?=$val['Rte']?></span>
					<span class="input"><input maxlength="5" id="<?=$val['flag']?>" name="LOTTO" acno="01" type="text"></span>
				</a>
				
			</dd>

			<?php	}
			?>
			
		</dl>
		
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