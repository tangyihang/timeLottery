<?php $this->display('C38_header_new.php'); ?>

<div id="nsc_subContent" style="border:0">


<?php $this->display('siderbar.php'); ?>
<link rel="stylesheet" href="/css/nsc/reset.css?v=1.16.11.9" />
<link rel="stylesheet" href="/css/nsc/list.css?v=1.16.11.9" />
<link rel="stylesheet" href="/css/nsc/activity.css?v=1.16.11.9" />

</head>
<body>

<div id="subContent_bet_re" class="subContent_bet_re">



<form action="/index.php/safe/nickname" method="post" target="ajax" onajax="safeBefornickname" call="safeSetnickname">
<div class="organizing-data_box">
<table width="100%" border="0" cellspacing="1" cellpadding="10">
    <tr>
    <td class="tdz3_left">用户昵称：</td>
    <td class="tdz3_right"><input type="text" maxlength="6" name="nickname" value="<?=$this->user['nickname']?>"/> <span class="text_hint">由2至6个字符组成</span></td>
    </tr>
</table>
<div class="list_btn_box">
<input type="submit" value="修改" class="formChange" />
<input name="" type="reset" value="重置" class="formReset"  onclick="form.reset()"/>
</div>
</div>
        </form>
<form action="/index.php/safe/care" method="post" target="ajax" onajax="safeBeforcare" call="safeSetcare">
<div class="organizing-data_box">
<table width="100%" border="0" cellspacing="1" cellpadding="10">
    <tr>
    <td class="tdz3_left">预留信息：</td>
    <td class="tdz3_right"><input type="text" maxlength="18" name="care" value="<?=$this->user['care']?>"/><span class="text_hint text_hint-c">为防止钓鱼网站骗取您的钱财，请务必填写此信息<br />由1至6个汉字组成</span></td>
    </tr>
</table>
<div class="list_btn_box">
<input type="submit" value="修改" class="formChange" />
<input name="" type="reset" value="重置" class="formReset"  onclick="form.reset()"/>
</div>
</div>
        </form>
</div></div></div></div></div>
<?php $this->display('C38_footer.php'); ?>

 </body>
 </html>