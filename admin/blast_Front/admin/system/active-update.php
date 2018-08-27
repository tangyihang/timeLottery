<?php
	$sql="select * from {$this->prename}active where id=?";
	$info=$this->getRow($sql, $args[0]);
?>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('#editor_2',{
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : false,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });
    });
</script>
<article class="module width_full">
    <input type="hidden" value="<?=$this->user['username']?>" />
    <header><h3 class="tabs_involved">修改内容</h3></header>
    <table>
        <tr><td>
                <form id= "uploadForm">
                    <input type="hidden" value="<?=$info['id']?>" class='id' name='id'/>
                        上传文件：
                        <input type="file" name="photo" onchange="showPreview(this)" class="file" width="50px;"/>
                        <img class="portrait" name='portrait' src="<?=$info['img']?>" width="350" height="100">
                    <input type="button" value="上传" onclick="doUpload()" />
                </form>
                <br><br>
                <form action="/index.php/system/doUpdateActive/<?=$info['id']?>" method="post" target="ajax" onajax="beforeUpdateActive" call="doUpdateActive">
                    <table class="tablesorter table2" cellspacing="0" width="100%">
                        <tr>
                            <td><span class="aq-txt">活动标题：</span></td>
                            <td align="left"><input type="text" name="title" style="width:550px;margin-left:-100px;" value="<?=$info['title']?>" /></td>
                        </tr>
                        <tr>
                            <td><span class="aq-txt">标题对象：</span></td>
                            <td align="left"><input type="text" name="obj" style="width:550px;margin-left:-100px;" value="<?=$info['obj']?>" /></td>
                        </tr>
                        <tr>
                            <td><span class="aq-txt">标题内容：</span></td>
                            <td align="left"><input type="text" name="content" style="width:550px;margin-left:-100px;" value="<?=$info['content']?>" /></td>
                        </tr>
                        <tr>
                            <td><span class="aq-txt">活动简介：</span></td>
                            <td align="left">
                                <textarea rows="10" name="text" id="editor_2" boxid="content" style="width:550px;height:300px;"><?=$info['text']?></textarea>
                            </td>
                        </tr>
                        <input type="hidden" name="img" style="width:550px;margin-left:-100px;" value="<?=$info['img']?>"  id="img"/>
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
<script src="/skin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    function doUpload() {
        var formData = new FormData($( "#uploadForm" )[0]);
        $.ajax({
            url: '/index.php/system/uploadify' ,
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
                var result = eval("("+returndata+")");
                if (result.code == 200) {
                    $('#img').val(result.dir);
                }
                console.log(result);

            },
            error: function (returndata) {
                console.log(returndata);
            }
        });
    }
</script>
<script type="text/javascript">
    function showPreview(source) {
        var file = source.files[0];
        if (window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function(e) {
                $(source).next()[0].src = e.target.result;
            };
            fr.readAsDataURL(file);
        }
    }
</script>


