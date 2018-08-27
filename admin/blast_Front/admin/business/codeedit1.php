<?php
$sql = "select * from {$this->prename}code where id=?";
echo $args[0];
$info = $this->getRow($sql, $args[0]);
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
    <input type="hidden" value="<?= $this->user['username'] ?>" />
    <header><h3 class="tabs_involved">修改内容</h3></header>
    <table>
        <tr><td>
                <form action="/index.php/business/Updatecode/<?= $info['id'] ?>" method="post" target="ajax" onajax="beforeUpdatecode" call="doUpdatecode">
                    <table class="tablesorter table2" cellspacing="0" width="100%">
                        <tr>
                            <td><span class="aq-txt">微信名称：</span></td>
                            <td ><input type="text" name="title"  value="<?= $info['title'] ?>" /></td>
                        </tr>
                        <tr>
                            <td><span class="aq-txt">上传二维码：</span></td>
                            <td><div><image src="<?= $info['imgaddr'] ?>"></div></td>
                            <td>
                                <div id="i_select_files">
                                </div>

                                <div id="i_stream_files_queue">
                                </div>
                                <!-- 	<button onclick="javascript:_t.upload();">开始上传<?=$args[0]?></button>|<button onclick="javascript:_t.stop();">停止上传</button>|<button onclick="javascript:_t.cancel();">取消</button>
	|<button onclick="javascript:_t.disable();">禁用文件选择</button>|<button onclick="javascript:_t.enable();">启用文件选择</button> -->
                                <br>
                                Messages:
                                <div id="i_stream_message_container" class="stream-main-upload-box" style="overflow: auto;height:200px;">
                                </div>
                            </td>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left"><input type="submit" class="alt_btn" value="确定修改"/></td>
                        </tr>
                    </table>
                </form>
            </td>

        </tr>
    </table>

    <script type="text/javascript" src="/skin/js/stream-v1.js"></script>
    <script type="text/javascript">
        /**
         * 配置文件（如果没有默认字样，说明默认值就是注释下的值）
         * 但是，on*（onSelect， onMaxSizeExceed...）等函数的默认行为
         * 是在ID为i_stream_message_container的页面元素中写日志
         */
        var config = {
            browseFileId : "i_select_files", /** 选择文件的ID, 默认: i_select_files */
            browseFileBtn : "<div>请选择文件</div>", /** 显示选择文件的样式, 默认: `<div>请选择文件</div>` */
            dragAndDropArea: "i_select_files", /** 拖拽上传区域，Id（字符类型"i_select_files"）或者DOM对象, 默认: `i_select_files` */
            dragAndDropTips: "<span>把文件(文件夹)拖拽到这里</span>", /** 拖拽提示, 默认: `<span>把文件(文件夹)拖拽到这里</span>` */
            filesQueueId : "i_stream_files_queue", /** 文件上传容器的ID, 默认: i_stream_files_queue */
            filesQueueHeight : 200, /** 文件上传容器的高度（px）, 默认: 450 */
            messagerId : "i_stream_message_container", /** 消息显示容器的ID, 默认: i_stream_message_container */
            multipleFiles: true, /** 多个文件一起上传, 默认: false */
            autoUploading: true, /** 选择文件后是否自动上传, 默认: true */
//		autoRemoveCompleted : true, /** 是否自动删除容器中已上传完毕的文件, 默认: false */
//		maxSize: 104857600//, /** 单个文件的最大大小，默认:2G */
//		retryCount : 5, /** HTML5上传失败的重试次数 */
//		postVarsPerFile : { /** 上传文件时传入的参数，默认: {} */
//			param1: "val1",
//			param2: "val2"
//		},
            imgid :<?=$info['id']?>,
            swfURL : "swf/FlashUploader.swf", /** SWF文件的位置 */
            tokenURL : "/upload/upload.php?action=tk&id="+<?=$info['id']?>, /** 根据文件名、大小等信息获取Token的URI（用于生成断点续传、跨域的令牌） */
            frmUploadURL : "/upload/upload.php?action=fd;", /** Flash上传的URI */
            uploadURL : "/upload/upload.php?action=up&id="+<?=$info['id']?>, /** HTML5上传的URI */
//		simLimit: 200, /** 单次最大上传文件个数 */
            extFilters: [".png", ".jpg", ".gif"], /** 允许的文件扩展名, 默认: [] */
//		onSelect: function(list) {alert('onSelect')}, /** 选择文件后的响应事件 */
//		onMaxSizeExceed: function(size, limited, name) {alert('onMaxSizeExceed')}, /** 文件大小超出的响应事件 */
//		onFileCountExceed: function(selected, limit) {alert('onFileCountExceed')}, /** 文件数量超出的响应事件 */
//		onExtNameMismatch: function(name, filters) {alert('onExtNameMismatch')}, /** 文件的扩展名不匹配的响应事件 */
//		onCancel : function(file) {alert('Canceled:  ' + file.name)}, /** 取消上传文件的响应事件 */
//		onComplete: function(file) {alert('onComplete')}, /** 单个文件上传完毕的响应事件 */
		onQueueComplete: function() {alert('onQueueComplete')}, /** 所以文件上传完毕的响应事件 */
//		onUploadError: function(status, msg) {alert('onUploadError')} /** 文件上传出错的响应事件 */
        };
        var _t = new Stream(config);
    </script>
</article>
