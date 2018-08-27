<?php
$sql = "select * from {$this->prename}code where id=?";
$info = $this->getRow($sql, $args[0]);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<article class="module width_full">
    <input type="hidden" value="<?= $this->user['username'] ?>"/>
    <header><h3 class="tabs_involved">修改内容</h3></header>
    <table>
        <tr>
            <td>
                <form action="/index.php/business/Updatecode/<?= $info['id'] ?>" method="post" target="ajax"
                      onajax="beforeUpdatecode" call="doUpdatecode">
                    <table class="tablesorter table2" cellspacing="0" width="100%">
                        <tr>
                            <td><span class="aq-txt">收款姓名：</span></td>
                            <td><input type="text" name="title" value="<?= $info['title'] ?>"/></td>
                        </tr>

                        <tr>
                            <td><span class="aq-txt">收款账户：</span></td>
                            <td><input type="text" name="account" value="<?= $info['account'] ?>"/></td>
                        </tr>

                        <tr>
                            <td><span class="aq-txt">上传二维码：</span></td>
                            <td>
                                <div class="qrcode">
                                    <img src="<?= $info['imgaddr'] ?>">
                                    <input type="hidden" class="imgaddr" name="imgaddr" value="<?= $info['imgaddr']?>" />
                                </div>
                            </td>
                            <td>
                                <div id="uploader-demo">
                                    <!--用来存放item-->
                                    <div id="fileList" class="uploader-list"></div>
                                    <div id="filePicker">选择图片</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left"><input type="submit" class="alt_btn" value="确定修改"/></td>
                        </tr>
                    </table>
                </form>
            </td>

        </tr>
    </table>
</article>

<script>
    // 初始化Web Uploader
    var uploader = WebUploader.create({

        // 选完文件后，是否自动上传。
        auto: true,

        // swf文件路径
        swf: 'http://cdn.staticfile.org/webuploader/0.1.0/Uploader.swf',

        // 文件接收服务端。
        server: '/index.php/Upload/index',

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',

        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });
    // 当有文件添加进来的时候
    uploader.on('fileQueued', function (file) {

    });
    //然后剩下的就是上传状态提示了，当文件上传过程中, 上传成功，上传失败，上传完成都分别对应uploadProgress, uploadSuccess, uploadError, uploadComplete事件。

    // 文件上传过程中创建进度条实时显示。
    uploader.on('uploadProgress', function (file, percentage) {
        var $li = $('#' + file.id),
            $percent = $li.find('.progress span');

        // 避免重复创建
        if (!$percent.length) {
            $percent = $('<p class="progress"><span></span></p>')
                .appendTo($li)
                .find('span');
        }

        $percent.css('width', percentage * 100 + '%');
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on('uploadSuccess', function (file, res) {
        console.log(file);
        if (res !== undefined) {
            $(".qrcode img").prop("src", res.img);
            $(".imgaddr").val(res.img);
        } else {
            alert("上传失败");
        }
    });

    // 文件上传失败，显示上传出错。
    uploader.on('uploadError', function (file) {
        alert("error");
        var $li = $('#' + file.id),
            $error = $li.find('div.error');

        // 避免重复创建
        if (!$error.length) {
            $error = $('<div class="error"></div>').appendTo($li);
        }

        $error.text('上传失败');
    });

    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on('uploadComplete', function (file) {
        $('#' + file.id).find('.progress').remove();
    });
</script>
</body>
</html>
