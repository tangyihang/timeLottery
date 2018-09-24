<link type="text/css" rel="stylesheet" href="/files/draw.css"/>
<div class="wrap-bg" style="min-height: 587px;">
    <div class="main">
        <div class="clear"></div>
        <div>
            <div id="_iframe_divs">

                <div id="_games_2" class="cz-box" style="display: block;">
                    <div name="game_type_2" class="kj_box">
                        <h1>快三</h1>
                        <table cellpadding="0" cellspacing="0" class="kj_tab">
                            <thead>
                            <tr class="title">
                                <td width="88">彩种</td>
                                <td width="120">期号</td>
                                <td width="180">开奖时间</td>
                                <td width="330">开奖号码</td>
                                <td width="110">投注提示</td>
                                <td width="78">开奖频率</td>
                                <td width="40">详情</td>
                                <td width="40">走势</td>
                                <td width="80">购买</td>
                            </tr>
                            </thead>
                            <tbody id="k3">

                            </tbody>
                        </table>
                    </div>

                    <div name="game_type_1" class="kj_box">
                        <h1>时时彩</h1>
                        <table cellpadding="0" cellspacing="0" class="kj_tab">
                            <thead>
                            <tr class="title">
                                <td width="88">彩种</td>
                                <td width="120">期号</td>
                                <td width="180">开奖时间</td>
                                <td width="330">开奖号码</td>
                                <td width="110">投注提示</td>
                                <td width="78">开奖频率</td>
                                <td width="40">详情</td>
                                <td width="40">走势</td>
                                <td width="80">购买</td>
                            </tr>
                            </thead>
                            <tbody id="ssc">

                            </tbody>
                        </table>
                    </div>

                    <div name="game_type_6" class="kj_box">
                        <h1>PC蛋蛋</h1>
                        <table cellpadding="0" cellspacing="0" class="kj_tab">
                            <thead>
                            <tr class="title">
                                <td width="88">彩种</td>
                                <td width="120">期号</td>
                                <td width="180">开奖时间</td>
                                <td width="330">开奖号码</td>
                                <td width="110">投注提示</td>
                                <td width="78">开奖频率</td>
                                <td width="40">详情</td>
                                <td width="40">走势</td>
                                <td width="80">购买</td>
                            </tr>
                            </thead>
                            <tbody id="pcdd">

                            </tbody>
                        </table>
                    </div>



                    <!--<div name="game_type_3" class="kj_box">
                        <h1>11选5</h1>
                        <table cellpadding="0" cellspacing="0" class="kj_tab">
                            <thead>
                            <tr class="title">
                                <td width="88">彩种</td>
                                <td width="80">期号</td>
                                <td width="180">开奖时间</td>
                                <td width="330">开奖号码</td>
                                <td width="110">投注提示</td>
                                <td width="78">开奖频率</td>
                                <td width="40">详情</td>
                                <td width="40">走势</td>
                                <td width="80">购买</td>
                            </tr>
                            </thead>
                            <tbody id="11x5">

                            </tbody>
                        </table>
                    </div>-->

                    <div name="game_type_5" class="kj_box">
                        <h1>低频彩</h1>
                        <table cellpadding="0" cellspacing="0" class="kj_tab">
                            <thead>
                            <tr class="title">
                                <td width="88">彩种</td>
                                <td width="120">期号</td>
                                <td width="180">开奖时间</td>
                                <td width="330">开奖号码</td>
                                <td width="110">投注提示</td>
                                <td width="78">开奖频率</td>
                                <td width="40">详情</td>
                                <td width="40">走势</td>
                                <td width="80">购买</td>
                            </tr>
                            </thead>
                            <tbody id="dp">

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="div_iframe" name="iframe_div"></div>
            </div>
        </div>
    </div>
</div>
<script>
  var arr_pcdd = ["80", "83"]; //PCDD
  var arr_ssc = ["86", "1", "20", '85']; //时时彩
  var arr_k3 = ["63"]; //快三
  var arr_11x5 = ["6", "7", "15", "16"]; //十一选五
  var arr_dp = ["34"]; //低频彩种ID
  var kj_html = "";
  var ssc_html = "";
  var k3_html = "";
  var html_11x5 = "";
  var dp_html = "";
  $.ajax({
    type: "get",
    url: "/index.php/getOpenLotteryNumber",
    //dataType: "json",
    success: function (msg) {

      var jsonarray = $.parseJSON(msg);
      $.each(jsonarray, function (i, n) {
        //alert(n.title);
        //PC蛋蛋
        if ($.inArray(n.type, arr_pcdd) > -1) {
          var day_n = "";
          var q_time = "";
          //<tr class="bgcolor"><td><a class="name" onclick="">幸运28</a></td><td><a onclick="">2775352</a></td><td>2017-07-26 18:10:00</td><td><div class="ballbg"><span>2</span><b>+</b><span>3</span><b>+</b><span>4</span><b>=</b><span class="ball_red">09</span></div></td><td>每天开奖660期</td><td>2分</td><td><a class="c-blue blod" onclick="">详情</a></td><td><a onclick=""><img src="/files/zst_01.gif"></a></td><td class="b"><a onclick="" class="draw-lottery-btn">我要投注</a></td></tr>
          kj_html += "<tr class=\"bgcolor\"><td><a class=\"name\" onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\">" + n.title + "</a></td><td><a onclick=\"\">" + n.number + "</a></td><td>" + n.time + "</td>";
          //kj_html+="<span class=\"term\">"+n.time+"</span><span class=\"clear\"></span><div class=\"clear\"></div>";
          var strs = new Array(); //定义一数组
          strs = n.data.split(","); //字符分割
          var hezhi = parseInt(strs[0]) + parseInt(strs[1]) + parseInt(strs[2]);
          //<td><div class="ballbg"><span>2</span><b>+</b><span>3</span><b>+</b><span>4</span><b>=</b><span class="ball_red">09</span></div></td>
          kj_html += "<td><div class=\"ballbg\"><span>" + strs[0] + "</span><b>+</b><span>" + strs[1] + "</span><b>+</b><span>" + strs[2] + "</span><b>=</b><span class=\"ball_red\">" + hezhi + "</span></div></td>"
            /* for(var y=0;y<strs.length;y++){
             kj_html+="<div class=\"redball\">"+strs[y]+"</div>"
             } */
          if (n.type == "80") {
            day_n = "660";
            q_time = "2分"
          } else {
            day_n = "179";
            q_time = "5分"
          }
          kj_html += "<td>每天开奖" + day_n + "期</td><td>" + q_time + "</td><td><a class=\"c-blue blod\" onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\">详情</a></td><td><a onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\"><img src=\"/files/zst_01.gif\"></a></td><td class=\"b\"><a onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\" class=\"draw-lottery-btn\">我要投注</a></td></tr>";
        }
        $("#pcdd").html(kj_html);

        //时时彩
        if ($.inArray(n.type, arr_ssc) > -1) {
          var day_n = "";
          var q_time = "";
          //<tr class="bgcolor"><td><a class="name" onclick="">幸运28</a></td><td><a onclick="">2775352</a></td><td>2017-07-26 18:10:00</td><td><div class="ballbg"><span>2</span><b>+</b><span>3</span><b>+</b><span>4</span><b>=</b><span class="ball_red">09</span></div></td><td>每天开奖660期</td><td>2分</td><td><a class="c-blue blod" onclick="">详情</a></td><td><a onclick=""><img src="/files/zst_01.gif"></a></td><td class="b"><a onclick="" class="draw-lottery-btn">我要投注</a></td></tr>
          ssc_html += "<tr class=\"bgcolor\"><td><a class=\"name\" onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\">" + n.title + "</a></td><td><a onclick=\"\">" + n.number + "</a></td><td>" + n.time + "</td>";
          //kj_html+="<span class=\"term\">"+n.time+"</span><span class=\"clear\"></span><div class=\"clear\"></div>";
          var strs = new Array(); //定义一数组
          strs = n.data.split(","); //字符分割
          //var hezhi=parseInt(strs[0])+parseInt(strs[1])+parseInt(strs[2]);
          //<div class="ballbg"><span>8</span><span>1</span><span>3</span><span>8</span><span>9</span></div>
          ssc_html += "<td><div class=\"ballbg\">"
          for (var y = 0; y < strs.length; y++) {
            ssc_html += "<span>" + strs[y] + "</span>"
          }
          if (n.type == "87") {
            day_n = "23";
            q_time = "30分"
          }
          if (n.type == "86") {
            day_n = "420";
            q_time = "3分"
          }
          if (n.type == "85") {
            day_n = "420";
            q_time = "3分"
          }
          if (n.type == "1") {
            day_n = "120";
            q_time = "5/10分"
          }
          if (n.type == "12") {
            day_n = "96";
            q_time = "10分"
          }
          if (n.type == "20") {
            day_n = "179";
            q_time = "5分"
          }
          if (n.type == "60") {
            day_n = "84";
            q_time = "10分"
          }
          ssc_html += "</div></td><td>每天开奖" + day_n + "期</td><td>" + q_time + "</td><td><a class=\"c-blue blod\" onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\">详情</a></td><td><a onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\"><img src=\"/files/zst_01.gif\"></a></td><td class=\"b\"><a onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\" class=\"draw-lottery-btn\">我要投注</a></td></tr>";
        }
        $("#ssc").html(ssc_html);

        //快三
        if ($.inArray(n.type, arr_k3) > -1) {
          var day_n = "";
          var q_time = "";
          //<tr class="bgcolor"><td><a class="name" onclick="">幸运28</a></td><td><a onclick="">2775352</a></td><td>2017-07-26 18:10:00</td><td><div class="ballbg"><span>2</span><b>+</b><span>3</span><b>+</b><span>4</span><b>=</b><span class="ball_red">09</span></div></td><td>每天开奖660期</td><td>2分</td><td><a class="c-blue blod" onclick="">详情</a></td><td><a onclick=""><img src="/files/zst_01.gif"></a></td><td class="b"><a onclick="" class="draw-lottery-btn">我要投注</a></td></tr>
          k3_html += "<tr class=\"bgcolor\"><td><a class=\"name\" onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\">" + n.title + "</a></td><td><a onclick=\"\">" + n.number + "</a></td><td>" + n.time + "</td>";
          //kj_html+="<span class=\"term\">"+n.time+"</span><span class=\"clear\"></span><div class=\"clear\"></div>";
          var strs = new Array(); //定义一数组
          strs = n.data.split(","); //字符分割
          //var hezhi=parseInt(strs[0])+parseInt(strs[1])+parseInt(strs[2]);
          //<td><div class="ball_kuaisan"><span class="ks_ball_2">2</span><span class="ks_ball_3">3</span><span class="ks_ball_3">3</span></div></td>
          k3_html += "<td><div class=\"ball_kuaisan\"><span class=\"ks_ball_" + strs[0] + "\">" + strs[0] + "</span><span class=\"ks_ball_" + strs[1] + "\">" + strs[1] + "</span><span class=\"ks_ball_" + strs[2] + "\">" + strs[2] + "</span></div></td>"
          day_n = "288";
          q_time = "5分"
          k3_html += "<td>每天开奖" + day_n + "期</td><td>" + q_time + "</td><td><a class=\"c-blue blod\" onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\">详情</a></td><td><a onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\"><img src=\"/files/zst_01.gif\"></a></td><td class=\"b\"><a onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\" class=\"draw-lottery-btn\">我要投注</a></td></tr>";
        }
        $("#k3").html(k3_html);

        //十一选五
        if ($.inArray(n.type, arr_11x5) > -1) {
          var day_n = "";
          var q_time = "";
          //<tr class="bgcolor"><td><a class="name" onclick="">幸运28</a></td><td><a onclick="">2775352</a></td><td>2017-07-26 18:10:00</td><td><div class="ballbg"><span>2</span><b>+</b><span>3</span><b>+</b><span>4</span><b>=</b><span class="ball_red">09</span></div></td><td>每天开奖660期</td><td>2分</td><td><a class="c-blue blod" onclick="">详情</a></td><td><a onclick=""><img src="/files/zst_01.gif"></a></td><td class="b"><a onclick="" class="draw-lottery-btn">我要投注</a></td></tr>
          html_11x5 += "<tr class=\"bgcolor\"><td><a class=\"name\" onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\">" + n.title + "</a></td><td><a onclick=\"\">" + n.number + "</a></td><td>" + n.time + "</td>";
          //kj_html+="<span class=\"term\">"+n.time+"</span><span class=\"clear\"></span><div class=\"clear\"></div>";
          var strs = new Array(); //定义一数组
          strs = n.data.split(","); //字符分割
          //var hezhi=parseInt(strs[0])+parseInt(strs[1])+parseInt(strs[2]);
          //<td><div class="ballbg"><span>2</span><b>+</b><span>3</span><b>+</b><span>4</span><b>=</b><span class="ball_red">09</span></div></td>
          //html_11x5+="<td><div class=\"ballbg\"><span>"+strs[0]+"</span><b>+</b><span>"+strs[1]+"</span><b>+</b><span>"+strs[2]+"</span><b>=</b><span class=\"ball_red\">"+hezhi+"</span></div></td>"
          html_11x5 += "<td><div class=\"ballbg\">"
          for (var y = 0; y < strs.length; y++) {
            html_11x5 += "<span>" + strs[y] + "</span>"
          }
          q_time = "10分"
          if (n.type == "6" || n.type == "16") {
            day_n = "84";
          }
          if (n.type == "7") {
            day_n = "87";
          }
          if (n.type == "17") {
            day_n = "90";
          }
          html_11x5 += "</div></td><td>每天开奖" + day_n + "期</td><td>" + q_time + "</td><td><a class=\"c-blue blod\" onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\">详情</a></td><td><a onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\"><img src=\"/files/zst_01.gif\"></a></td><td class=\"b\"><a onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\" class=\"draw-lottery-btn\">我要投注</a></td></tr>";
        }
        $("#11x5").html(html_11x5);

        //快三
        if ($.inArray(n.type, arr_dp) > -1) {
          var day_n = "";
          var q_time = "";
          if (n.type == "34") {

            dp_html += "<tr class=\"bgcolor\"><td><a class=\"name\" onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\">" + n.title + "</a></td><td><a onclick=\"\">" + n.number + "</a></td><td>" + n.time + "</td>";
            var strs = new Array(); //定义一数组
            strs = n.data.split(","); //字符分割
            dp_html += "<td><div class=\"ball_liuhecai\">";
            for (var y = 0; y < strs.length; y++) {
              //<p><span class="col-08">08</span><span class="font">虎</span></p>
              dp_html += "<p><span class=\"col-" + strs[y] + "\">" + strs[y] + "</span><span class=\"font\"></span></p>"
            }
            day_n = "80";
            q_time = "10分"
            dp_html += "</div></td><td>每天开奖" + day_n + "期</td><td>" + q_time + "</td><td><a class=\"c-blue blod\" onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\">详情</a></td><td><a onclick=\"\"><img src=\"/files/zst_01.gif\"></a></td><td class=\"b\"><a onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\" class=\"draw-lottery-btn\">我要投注</a></td></tr>";
          } else {
            //<tr class="bgcolor"><td><a class="name" onclick="">幸运28</a></td><td><a onclick="">2775352</a></td><td>2017-07-26 18:10:00</td><td><div class="ballbg"><span>2</span><b>+</b><span>3</span><b>+</b><span>4</span><b>=</b><span class="ball_red">09</span></div></td><td>每天开奖660期</td><td>2分</td><td><a class="c-blue blod" onclick="">详情</a></td><td><a onclick=""><img src="/files/zst_01.gif"></a></td><td class="b"><a onclick="" class="draw-lottery-btn">我要投注</a></td></tr>
            dp_html += "<tr class=\"bgcolor\"><td><a class=\"name\" onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\">" + n.title + "</a></td><td><a onclick=\"\">" + n.number + "</a></td><td>" + n.time + "</td>";
            //kj_html+="<span class=\"term\">"+n.time+"</span><span class=\"clear\"></span><div class=\"clear\"></div>";
            var strs = new Array(); //定义一数组
            strs = n.data.split(","); //字符分割
            //var hezhi=parseInt(strs[0])+parseInt(strs[1])+parseInt(strs[2]);
            //<td><div class="ball_kuaisan"><span class="ks_ball_2">2</span><span class="ks_ball_3">3</span><span class="ks_ball_3">3</span></div></td>
            dp_html += "<td><div class=\"ballbg\"><span >" + strs[0] + "</span><span >" + strs[1] + "</span><span >" + strs[2] + "</span></div></td>"
            day_n = "80";
            q_time = "10分"
            dp_html += "<td>每天开奖" + day_n + "期</td><td>" + q_time + "</td><td><a class=\"c-blue blod\" onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\">详情</a></td><td><a onclick=\"__openWin('user_center','/index.php/getzst?" + n.type + "');\"><img src=\"/files/zst_01.gif\"></a></td><td class=\"b\"><a onclick=\"__openWin('lottery_hall','/index.php/index/game/" + n.type + "');\" class=\"draw-lottery-btn\">我要投注</a></td></tr>";
          }
        }
        $("#dp").html(dp_html);
      });

    }
  });
</script>