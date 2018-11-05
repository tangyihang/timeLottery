<article class="module width_full">
	<header>
		<h3 class="tabs_involved">整站统计
			<form action="/index.php/countData/allDateSearch"  target="ajax" dataType="html" call="defaultList" class="submit_link wz">
				时间：从
                <input type="date" class="alt_btn" name="fromTime" /> 到
                <input type="date" class="alt_btn" name="toTime"/>&nbsp;&nbsp;
				<input type="submit" value="查找" class="alt_btn">
			</form>
		</h3>
	</header>
    
	<div class="tab_content">
    	<?php $this->display("count/alldate-list.php");?>
    </div>
</article>