<?php $this->display('C38_header.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>喜洋洋彩-官方网站</title>
	<style>
	body {margin:0; padding:0; font-family:"Microsoft YaHei",Helvetica, Arial, "5b8b4f53", "Microsoft YaHei", sans-serif;}
    #subContent_bet_re {padding:0;}
    #newsDetail .title {font-size:20px; line-height:26px; min-height: 35px; background: url("/images/nsc/notice_title-line.png") no-repeat center bottom; color:#694d85; padding:25px 30px 10px; margin: 0; text-align: center;}
	#newsDetail .detail {line-height:24px; color:#694d85; font-size:14px; padding:2px 15px 2px 0; margin: 10px 20px 0 30px;  overflow-y: auto;}
    #newsDetail .detail p {margin: 0;}
    #newsDetail .detail::-webkit-scrollbar{width:8px;background:#e3ddec;border-radius:9px;-webkit-border-radius:9px;-moz-border-radius:9px;}
    #newsDetail .detail::-webkit-scrollbar-thumb{background:#a59dbc;border-radius:9px;-webkit-border-radius:9px;-moz-border-radius:9px;}
    h1{
    	text-align: center;
    	font-size: 24px;
    	color: #fff;
    	letter-spacing: 8px;
    	background-image: -webkit-gradient(linear, left top, left bottom, from(#b31515), to(#f13131));
    background-image: -moz-linear-gradient(top, #b31515, #f13131);
    background-image: -o-linear-gradient(top, #b31515, #f13131);
    font-weight: 400;
    height: 64px;
    line-height: 64px;
    /* background-image: -webkit-linear-gradient(top, #b31515, #f13131); */
    /* background-image: linear-gradient(to bottom, #b31515, #f13131); */
    }
    .content-wrapper{
    	width: 1000px;
    	margin: 0 auto;
    	border: 1px solid #e5e4e4;
    }
    .menu-list{
    	width: 200px;
    	float: left;
    	list-style: none;
    	margin: 0;
    	padding: 0;
    }
    
    .menu-list li a{
    	display: block;
    	height: 50px;
    	line-height: 50px;
    	text-decoration: none;
    	color: #4C4C4C;
    	font-size: 16px;
    	font-weight: 400;
    	width: 198px;
      text-indent: 10px;
    	border-bottom: 1px solid #e5e4e4;
    	border-right: 2px solid transparent;
    	overflow: hidden;
    	white-space: nowrap;
    	text-overflow: ellipsis;
    }
    .menu-list li.active a{
    	border-right-color: #F13131;
    }
    .notice-content{
    	float: right;
    	width: 998px;
    	border-left: 1px solid #e5e4e4;
    	margin: 0;
    	padding: 0;
    	
    }
    .list-icon{
    	width: 10px;
    	height: 10px;
    	border-radius: 50%;
    	background-color: #F13131;
    	display: inline-block;
    	margin-right: 10px;
    }
    .b-top{
    	border-top: 1px solid #e5e4e4;
    }
    #newsDetail .title{
    	background: none;
    	border-bottom: 1px solid #e5e4e4;
    	color: #F13131;
    }
    </style>
</head>
<body>
<div class="mask_list"></div>
<div class="content-wrapper">
	<!--<ul class="menu-list">
        <?php
/*        foreach ($args[0]['list']['data'] as $key => $val) {
            if($val['id'] == $args[0]['infoid']){
                echo '<li class="active"><a href="/index.php/notice/view_new/'.$val['id'].'" ><span class="list-icon"></span>'.$val['title'].'</a></li>';
            }else{
                echo '<li class=""><a href="/index.php/notice/view_new/'.$val['id'].'" ><span class="list-icon"></span>'.$val['title'].'</a></li>';
            }
        }
        */?>
	</ul>
    --><?php
/*    //print_r($args);
    */?>
	<div id="newsDetail" class="notice-content">
      <h3 class="title"><?= $args[0]['info']['title'] ?></h3>
      <div class="detail">
		    <p> <?= nl2br($args[0]['info']['content']) ?></p>
		  </div>
  </div>
  <div style="clear: both;"></div>
    <?php $this->display('C38_footer.php');?>
</div>

        <script type="text/javascript">
        $(function(){
            if(!fnCheckIe()){
                var _scale = $(".layer",parent.parent.parent.document).attr("zoom");
                $("body").css("zoom",_scale);
            };
            $(".menu-list li").click(function(){
            	$(this).addClass("active").siblings("li").removeClass("active");
            })
        });
      //判断ie
      function fnCheckIe(){
        var broswer = navigator.userAgent;
        if(broswer.indexOf("MSIE") != -1){
          return true;
        }else{
          return false;
        }
      }
    </script>
</body>
</html>
