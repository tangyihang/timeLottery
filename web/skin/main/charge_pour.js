/**
 * 获取随机一注
 * @param gameId
 * @param type
 */
function gameListData_charge_index(gameId) {
  var i1 = 0, i2 = 0, i3 = 0, i4 = 0, i5 = 0;
  var num_list = $("ul[name=num_list]");
  switch (gameId) {
    case '63'://澳门快三
      i1 = GetRandomNum(1, 6);
      i2 = GetRandomNum(1, 6);
      i3 = GetRandomNum(1, 6);
      $(num_list.children('li').eq(0)).find('input').val(i1);
      $(num_list.children('li').eq(1)).find('input').val(i2);
      $(num_list.children('li').eq(2)).find('input').val(i3);
      break;
    case '1'://重庆时时彩
      i1 = GetRandomNum(0, 9);
      i2 = GetRandomNum(0, 9);
      i3 = GetRandomNum(0, 9);
      i4 = GetRandomNum(0, 9);
      i5 = GetRandomNum(0, 9);
      $(num_list.children('li').eq(0)).find('input').val(i1);
      $(num_list.children('li').eq(1)).find('input').val(i2);
      $(num_list.children('li').eq(2)).find('input').val(i3);
      $(num_list.children('li').eq(3)).find('input').val(i4);
      $(num_list.children('li').eq(4)).find('input').val(i5);
      break;
    case '86'://三分时时彩
      i1 = GetRandomNum(0, 9);
      i2 = GetRandomNum(0, 9);
      i3 = GetRandomNum(0, 9);
      i4 = GetRandomNum(0, 9);
      i5 = GetRandomNum(0, 9);
      $(num_list.children('li').eq(0)).find('input').val(i1);
      $(num_list.children('li').eq(1)).find('input').val(i2);
      $(num_list.children('li').eq(2)).find('input').val(i3);
      $(num_list.children('li').eq(3)).find('input').val(i4);
      $(num_list.children('li').eq(4)).find('input').val(i5);
      break;
    case '20'://北京PK拾
      i1 = GetRandomNum(1, 9);
      i2 = GetRandomNum(1, 9);
      i3 = GetRandomNum(1, 9);
      $(num_list.children('li').eq(0)).find('input').val(i1);
      $(num_list.children('li').eq(1)).find('input').val(i2);
      $(num_list.children('li').eq(2)).find('input').val(i3);
      break;
    case '85'://三分PK拾
      i1 = GetRandomNum(1, 9);
      i2 = GetRandomNum(1, 9);
      i3 = GetRandomNum(1, 9);
      $(num_list.children('li').eq(0)).find('input').val(i1);
      $(num_list.children('li').eq(1)).find('input').val(i2);
      $(num_list.children('li').eq(2)).find('input').val(i3);
      break;
  }
}

function GetRandomNum(Min, Max) {
  var Range = Max - Min;
  var Rand = Math.random();
  return (Min + Math.round(Rand * Range));
}

function rightNow() {
  setCookie("tyz", 0);
  setCookie("tyz_load", 0);
  var gameId = $(".tab-sel-open.on").attr("data-gameid");
  var i1 = 0, i2 = 0, i3 = 0, i4 = 0, i5 = 0;
  var num_list = $("ul[name=num_list]");
  var times_nums = $('#times_nums').val();
  var bet_amount = $('#bet_amount').text();
  switch (gameId) {
    case '63'://澳门快三
      i1 = $(num_list.children('li').eq(0)).find('input').val();
      i2 = $(num_list.children('li').eq(1)).find('input').val();
      i3 = $(num_list.children('li').eq(2)).find('input').val();
      var num = parseInt(i1) + parseInt(i2) + parseInt(i3);
      __openWin('lottery_hall', '/index.php/index/game/63?bet=' + num + '&dc=' + times_nums + '&my=' + bet_amount + '&gdid=' + gameId);
      break;
    case '86'://三分时时彩
      i1 = $(num_list.children('li').eq(0)).find('input').val();
      i2 = $(num_list.children('li').eq(1)).find('input').val();
      i3 = $(num_list.children('li').eq(2)).find('input').val();
      i4 = $(num_list.children('li').eq(3)).find('input').val();
      i5 = $(num_list.children('li').eq(4)).find('input').val();
      __openWin('lottery_hall', '/index.php/index/game/86?bet=' + i1 + '|' + i2 + '|' + i3 + '|' + i4 + '|' + i5 + '&dc=' + times_nums + '&my=' + bet_amount + '&gdid=' + gameId);
      break;
    case '1'://重庆时时彩
      i1 = $(num_list.children('li').eq(0)).find('input').val();
      i2 = $(num_list.children('li').eq(1)).find('input').val();
      i3 = $(num_list.children('li').eq(2)).find('input').val();
      i4 = $(num_list.children('li').eq(3)).find('input').val();
      i5 = $(num_list.children('li').eq(4)).find('input').val();
      __openWin('lottery_hall', '/index.php/index/game/1?bet=' + i1 + '|' + i2 + '|' + i3 + '|' + i4 + '|' + i5 + '&dc=' + times_nums + '&my=' + bet_amount + '&gdid=' + gameId);
      break;
    case '20'://北京PK拾
      i1 = $(num_list.children('li').eq(0)).find('input').val();
      __openWin('lottery_hall', '/index.php/index/game/20?bet=' + i1 + '&dc=' + times_nums + '&my=' + bet_amount + '&gdid=' + gameId);
      break;
    case '85'://三分PK拾
      i1 = $(num_list.children('li').eq(0)).find('input').val();
      __openWin('lottery_hall', '/index.php/index/game/85?bet=' + i1 + '&dc=' + times_nums + '&my=' + bet_amount + '&gdid=' + gameId);
      break;
  }
}