<?php $this->display('inc_header.php'); ?>
<div class="container" style="margin-top: 20px;">
    <ol class="breadcrumb">
        <li>
            <a href="/">
                首页
            </a>
        </li>
        <li class="active">
            推广链接
        </li>
    </ol>
</div>
<div class="container">
    <div class="bootstrap-table">
        <div class="fixed-table-toolbar">
            <div class="bars pull-left">
                <div id="toolbar">
                    <div id="search" class="form-inline">
                        <input value="" id="yhType" type="hidden">
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" id="getByType">
                                    <option selected="selected" value="">
                                        全部
                                    </option>
                                    <option value="0">
                                        会员
                                    </option>
                                    <option value="1">
                                        代理
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- <button class="btn btn-primary" onclick="search();">搜索</button> -->
                        <button class="btn btn-primary" onclick="addLink();">
                            添加推广链接
                        </button>
                    </div>
                </div>
            </div>
            <div class="columns columns-right btn-group pull-right">
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <label>
                            <input type="checkbox" data-field="userAccount" value="0" checked="checked">
                            账号
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" data-field="type" value="1" checked="checked">
                            类型
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" data-field="cpRolling" value="2" checked="checked">
                            返点
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" data-field="linkUrl" value="3" checked="checked">
                            推广链接
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" data-field="vcode" value="4" checked="checked">
                            推广码
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" data-field="status" value="5" checked="checked">
                            状态
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" data-field="5" value="6" checked="checked">
                            操作
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-header" style="display: none;">
                <table>
                </table>
            </div>
            <div class="fixed-table-body">
                <div class="fixed-table-loading" style="top: 41px; display: none;">
                    正在努力地加载数据中，请稍候……
                </div>
                <table id="datagrid_tb" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle; width: 100px; "
                            data-field="userAccount" tabindex="0">
                            <div class="th-inner ">
                                账号
                            </div>
                            <div class="fht-cell">
                            </div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; width: 60px; "
                            data-field="type" tabindex="0">
                            <div class="th-inner ">
                                类型
                            </div>
                            <div class="fht-cell">
                            </div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; width: 60px; "
                            data-field="cpRolling" tabindex="0">
                            <div class="th-inner ">
                                返点
                            </div>
                            <div class="fht-cell">
                            </div>
                        </th>
                        <th class="copyBtns" style="text-align: center; vertical-align: middle; width: 200px; "
                            data-field="linkUrl" tabindex="0">
                            <div class="th-inner ">
                                推广链接
                            </div>
                            <div class="fht-cell">
                            </div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; width: 100px; "
                            data-field="status" tabindex="0">
                            <div class="th-inner ">
                                推广码
                            </div>
                            <div class="fht-cell">
                            </div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; width: 100px; "
                            data-field="status" tabindex="0">
                            <div class="th-inner ">
                                状态
                            </div>
                            <div class="fht-cell">
                            </div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; width: 100px; "
                            data-field="5" tabindex="0">
                            <div class="th-inner ">
                                操作
                            </div>
                            <div class="fht-cell">
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <tr data-index="0">
                        <td style="text-align: center; vertical-align: middle; width: 100px; ">
                            456aaacom
                        </td>
                        <td style="text-align: center; vertical-align: middle; width: 60px; ">
                            <span class="label label-success">
                                会员
                            </span>
                        </td>
                        <td style="text-align: center; vertical-align: middle; width: 60px; ">
                            -
                        </td>
                        <td class="copyBtns" style="text-align: center; vertical-align: middle; width: 200px; ">
                            22c788.com/registerMutil/link_jipsz.do&nbsp;
                            <span class="label label-primary handIco" id="22c788.com/registerMutil/link_jipsz.do"
                            linkurl="22c788.com/registerMutil/link_jipsz.do">
                                复制
                            </span>
                            <div class="zclip" id="zclip-ZeroClipboardMovie_1" style="position: absolute; left: 254px; top: 20px; width: 38px; height: 20px; z-index: 99;">
                                <embed id="ZeroClipboardMovie_1" src="/common/js/pasteUtil/ZeroClipboard.swf"
                                loop="false" menu="false" quality="best" bgcolor="#ffffff" width="38" height="20"
                                name="ZeroClipboardMovie_1" align="middle" allowscriptaccess="always" allowfullscreen="false"
                                type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"
                                flashvars="id=1&amp;width=38&amp;height=20" wmode="transparent">
                            </div>
                        </td>
                        <td class="copyBtns" style="text-align: center; vertical-align: middle; width: 120px; ">
                            http://t.cn/RS71bKN&nbsp;
                            <span class="label label-primary handIco" id="http://t.cn/RS71bKN" linkurl="http://t.cn/RS71bKN">
                                复制
                            </span>
                            <div class="zclip" id="zclip-ZeroClipboardMovie_2" style="position: absolute; left: 138px; top: 20px; width: 38px; height: 20px; z-index: 99;">
                                <embed id="ZeroClipboardMovie_2" src="/common/js/pasteUtil/ZeroClipboard.swf"
                                loop="false" menu="false" quality="best" bgcolor="#ffffff" width="38" height="20"
                                name="ZeroClipboardMovie_2" align="middle" allowscriptaccess="always" allowfullscreen="false"
                                type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"
                                flashvars="id=2&amp;width=38&amp;height=20" wmode="transparent">
                            </div>
                        </td>
                        <td class="copyBtns" style="text-align: center; vertical-align: middle; width: 120px; ">
                            22c788.com/vote_topic_jipsz.do&nbsp;
                            <span class="label label-primary handIco" id="22c788.com/vote_topic_jipsz.do"
                            linkurl="22c788.com/vote_topic_jipsz.do">
                                复制
                            </span>
                            <div class="zclip" id="zclip-ZeroClipboardMovie_3" style="position: absolute; left: 216px; top: 20px; width: 38px; height: 20px; z-index: 99;">
                                <embed id="ZeroClipboardMovie_3" src="/common/js/pasteUtil/ZeroClipboard.swf"
                                loop="false" menu="false" quality="best" bgcolor="#ffffff" width="38" height="20"
                                name="ZeroClipboardMovie_3" align="middle" allowscriptaccess="always" allowfullscreen="false"
                                type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"
                                flashvars="id=3&amp;width=38&amp;height=20" wmode="transparent">
                            </div>
                        </td>
                        <td style="text-align: center; vertical-align: middle; width: 100px; ">
                            <span class="text-success">
                                启用
                            </span>
                            <a href="https://22c788.com/daili/generalizeLink/index.do#">
                                <span class="text-danger stateClose">
                                    (禁用)
                                </span>
                            </a>
                        </td>
                        <td style="text-align: center; vertical-align: middle; width: 100px; ">
                            <a class="eidt" href="javascript:void(0)" title="修改">
                                <i class="glyphicon glyphicon-pencil">
                                </i>
                                修改
                            </a>
                            <a class="del" href="javascript:void(0)" title="删除">
                                <i class="glyphicon glyphicon-remove">
                                </i>
                                删除
                            </a>
                        </td>
                    </tr> -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="clearfix">
    </div>
</div>
<!-- 修改 -->
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="editLabel">
                    推广链接生成
                </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" style="clear: both">
                    <tbody>
                    <input value="" id="zjId" type="hidden">
                    <input value="" id="linkCode" type="hidden">
                    <input value="" id="linkType" type="hidden">
                    <tr>
                        <td width="30%" class="text-right">
                            推广用户类型：
                        </td>
                        <td width="55%" class="text-left">
                            <select class="form-control" id="tgType">
                                <option value="0">
                                    会员
                                </option>
                                <option value="1" selected="selected">
                                    代理
                                </option>
                            </select>
                            <!-- <span class="form-control" id="tgType" value="2">代理</span> -->
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right">
                            代理机制：
                        </td>
                        <td width="55%" class="text-left">
                            <input type="text" class="form-control" disabled="disabled" id="dljz">
                        </td>
                        <!-- <td width="15%"><span class="label label-info handIco" id="abcd" onclick="fuzhi(this);">复制</span></td> -->
                    </tr>
                    <!--   <tr id="trLink">
                          <td width="30%" class="text-right">
                              生成链接：
                          </td>
                          <td width="55%" class="text-left">
                              <input type="text" class="form-control" disabled="disabled" id="urlLink">
                          </td>
                          <!-- <td width="15%"><span class="label label-info handIco" id="abcd" onclick="fuzhi(this);">复制</span></td>
                      </tr> -->
                    <tr id="cpfds">
                        <td width="30%" class="text-right">
                            彩票返点数
                            <span class="">
                                            (
                                            <span id="minRoll">
                                                0.1
                                            </span>
                                            -
                                            <span id="getCpFds">
                                                0.4
                                            </span>
                                            )
                                        </span>
                            ：
                        </td>
                        <td width="55%" class="text-left">
                            <input type="text" class="form-control" id="rollPoint" placeholder="请输入返点数!">
                            <input id="minFd" type="hidden" value="0">
                            <input id="maxFd" type="hidden" value="0.4">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right">
                            状态：
                        </td>
                        <td width="55%" class="text-left">
                            <select id="status" class="form-control">
                                <option value="1">
                                    启用
                                </option>
                                <option value="2" selected="selected">
                                    禁用
                                </option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    关闭
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editor();">
                    保存
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(function () {

    getTab();

    getFds();

    $("#tgType").change(function () {
      var curVal = $(this).find("option:checked").attr("value");
      $("#linkType").val(curVal);
      // if (curVal == 1) { //代理
      //     $('#cpfds').show();
      // } else {
      //     $('#cpfds').hide();
      // }
    });

    $("#getByType").change(function () {
      var curVal = $(this).find("option:checked").attr("value");
      $("#yhType").val(curVal);
      $("#datagrid_tb").bootstrapTable('refresh');
    });
  })

  //得到返点数
  function getFds() {
    $.ajax({
      url: "/index.php/team/getMemberInfo",
      success: function (j) {
        var curRebateNum = j.curRebateNum;
        $('#maxFd').val(curRebateNum);
        $('#minRoll').html(j.rebateMinNum);
        $('#getCpFds').html(curRebateNum);
      }
    });
  }

  function getTab() {
    window.table = new Game.Table({
      id: 'datagrid_tb',
      url: '/index.php/team/getTgLinkList',
      queryParams: queryParams,
      toolbar: $('#toolbar'),
      columns: [{
        field: 'userAccount',
        title: '账号',
        align: 'center',
        width: '100',
        valign: 'middle'
      },
        {
          field: 'type',
          title: '类型',
          align: 'center',
          width: '60',
          valign: 'middle',
          formatter: typeFormatter
        },

        {
          field: 'cpRolling',
          title: '返点',
          align: 'center',
          width: '60',
          valign: 'middle'
        },
        {
          field: 'linkUrl',
          title: '推广链接',
          align: 'center',
          width: '200',
          valign: 'middle',
          formatter: pasteFormatter,
          class: 'copyBtns'
        }
        ,
        {
          field: 'vcode',
          title: '推广码',
          align: 'center',
          width: '100',
          valign: 'middle',
          events: operateEvents,
          formatter: vcodeFormatter
        },
        {
          field: 'status',
          title: '状态',
          align: 'center',
          width: '100',
          valign: 'middle',
          events: operateEvents,
          formatter: statusFormatter2
        },
        {
          title: '操作',
          align: 'center',
          width: '100',
          valign: 'middle',
          events: operateEvents,
          formatter: operateFormatter
        }],
      onLoadSuccess: function () {
        $('.handIco').zclip({
          path: "/common/js/pasteUtil/ZeroClipboard.swf",
          copy: function () {
            return this.id;
          },
          afterCopy: function () {
            layer.alert('复制成功,请按ctrl+v粘贴:<br/>' + this.id);
          }
        });
      }
    });
  }

  //状态
  function statusFormatter2(value, row, index) {
    console.log(value);
    if (value == 1) {
      return '<span class="text-success">启用</span><a href="#"><span class="text-danger stateClose">(禁用)</span></a>';
    }
    return '<span class="text-danger">禁用</span><a href="#"><span class="text-success stateOpen">(启用)</span></a>';
  }

  //推广码
  function vcodeFormatter(value, row, index) {

    return '<span class="text-success">' + row.id + '</span>';
  }

  function operateFormatter(value, row, index) {
    return ['<a class="del" href="javascript:void(0)" title="删除">', '<i class="glyphicon glyphicon-remove"></i>', '删除</a>  '].join('');
  }

  function typeFormatter(value, row, index) {
    var type = row.type;
    if (type == 1) {
      return '<span class="label label-info">代理</span>';
    } else {
      return '<span class="label label-success">会员</span>';
    }
  }

  var host = "http://www.mptype.com/index.php/team/register/"

  function pasteFormatter(value, row, index) {
    return host + row.linkUrl + '&nbsp;<span class="label label-primary handIco" id="' + host + row.linkUrl + '" linkUrl="' + host + row.linkUrl + '">复制</span>';
  }


  window.operateEvents = {
    'click .eidt': function (e, value, row, index) {
      $("#editmodel").modal('toggle');
      if ("true" == "true") {
        $('#dljz').val('多级代理');
        if (row.type == 1) {
          $('#cpfds').show();
        } else {
          $('#cpfds').hide();
        }
      } else {
        $('#dljz').val('一级代理');
        $('#cpfds').hide();
      }
      $("#zjId").val(row.id);
      // $('#urlLink').val(row.linkUrl);
      $('#rollPoint').val(row.cpRolling);
      $('#status').val(row.status);
      $('#linkCode').val(row.linkKey);
      $('#tgType').val(row.type);
      $('#tgType').attr('onmousedown', 'return false;');

      $("#linkType").val(row.type);
    },
    'click .stateOpen': function (e, value, row, index) {
      closeOrOpen(row);
    },
    'click .stateClose': function (e, value, row, index) {
      closeOrOpen(row);
    },
    'click .del': function (e, value, row, index) {
      del(row);
    }
  };

  //添加推广链接地址
  function addLink() {
    $("#editmodel").modal('toggle');
    // $.ajax({
    //     url: "/daili/generalizeLink/getRandCode.do",
    //     dataType: "text",
    //     success: function(randomCode) {
    if ("true" == "true") {
      $('#tgType').attr('onmousedown', 'return true;');
      $('#dljz').val('多级代理');
    } else {
      $('#tgType').attr('onmousedown', 'return false;');
      $('#dljz').val('一级代理');
    }
    // var url = "22c788.com/registerMutil/link_link998.do";
    // url = url.replace(/link998/, randomCode);
    // $('#linkCode').val(randomCode);
    // $('#urlLink').val(url);
    $('#rollPoint').val('');
    $('#tgType').val('1');
    // $('#cpfds').hide();
    //     }
    // });
  }

  //保存编辑的推广链接地址
  function editor() {
    var zjId = $('#zjId').val();
    var type = $("#tgType").val();
    var linkCode = $('#linkCode').val();
    var rollPoint = $('#rollPoint').val();
    var status = $('#status').val();
    if ("true" == "true") {
      if (type == 1) {
        if (rollPoint == null || rollPoint == "") {
          layer.alert("彩票返点数为必填项!");
          return false;
        }
        var minFd = $('#minFd').val();
        var maxFd = $('#maxFd').val();
        if (rollPoint * 1 < minFd * 1) {
          layer.alert("彩票返点数不能小于" + minFd + "!");
          return false;
        }
        if (rollPoint * 1 > maxFd * 1) {
          layer.alert("彩票返点数不能大于" + maxFd + "!");
          return false;
        }
      }
    }
    var param = {};
    param["id"] = zjId;
    param["type"] = type;
    param["linkKey"] = linkCode;
    param["cpRolling"] = rollPoint;
    param["status"] = status;
    $.ajax({
      url: "/index.php/team/insertLink",
      data: param,
      success: function (r) {
        layer.alert(r.msg);
        $("#datagrid_tb").bootstrapTable('refresh');
      }
    });

  }

  //删除
  function del(row) {
    Msg.confirm('确定要把【' + row.linkUrl + '】删除掉？',
      function () {
        $.ajax({
          url: "/index.php/team/linkDeleteed",
          data: {
            id: row.id
          },
          success: function (r) {
            layer.alert(r.msg);
            $("#datagrid_tb").bootstrapTable('refresh');
          }
        });
      });

  }

  function closeOrOpen(row) {
    var state = 1;
    if (row.status == 1) {
      state = 2;
    }
    var bc = {
      "status": state,
      "id": row.id
    };
    $.ajax({
      url: "/index.php/team/modifyLink",
      data: bc,
      success: function (result) {
        if (row.status == 1) {
          tips(result.msg, 4);
        } else {
          tips(result.msg, 4);
        }
        $("#datagrid_tb").bootstrapTable('refresh');
      }
    });
  }

  //设置传入参数
  function queryParams(params) {
    params['stationId'] = $("#stationId").val();
    params['type'] = $("#yhType").val();
    return params
  }

  function search() {
    $("#datagrid_tb").bootstrapTable('refresh');
  }

  function tips(param, index) {
    switch (index) {
      case 1:
        //普通提示框
        layer.alert(param, {
          icon: 0,
          skin: 'layer-ext-moon'
        });
        break;
      case 2:
        //状态开启提示框
        layer.alert('【' + param + '】已被启用!', {
          icon: 1,
          skin: 'layer-ext-moon'
        });
        break;
      case 3:
        //状态关闭提示框
        layer.alert('【' + param + '】已被禁用!', {
          icon: 1,
          skin: 'layer-ext-moon'
        });
        break;
      case 4:
        //状态关闭提示框
        layer.alert(param, {
          icon: 2,
          skin: 'layer-ext-moon'
        });
        break;
      default:
        layer.alert('【参数不正确!】', {
          icon: 1,
          skin: 'layer-ext-moon'
        });
        break;
    }

  }
</script>
<style>
    .handIco {
        cursor: pointer;
    }

    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td,
    .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        vertical-align: middle;
    }

    .form-control1 {
        width: 60%
    }

    .copyBtns {
        position: relative;
    }
</style>
</body>

</html>