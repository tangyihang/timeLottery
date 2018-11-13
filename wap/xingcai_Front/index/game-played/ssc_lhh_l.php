<input type="hidden" name="playedGroup" value="<?= $this->groupId ?>"/>
<input type="hidden" name="playedId" value="<?= $this->played ?>"/>
<input type="hidden" name="type" value="<?= $this->type ?>"/>
<?php if ($this->type == 1) { ?>
    <div class="tz_xz" id="tz_xz1" style="background-color: #fff;display: block !important;">
        <a data_id="407" href="#" tourl="/index.php/index/played_new/1/407" class="tag"
           style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">龙</a>
        <a data_id="408" href="#" tourl="/index.php/index/played_new/1/408"
           style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">虎</a>
        <a data_id="409" href="#" tourl="/index.php/index/played_new/1/409"
           style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">和</a>
    </div>
<?php } ?>
<?php foreach (array(' (龙) ') as $var) { ?>
    <div class="pp" action="tz5xDwei" length="1" random="sscRandom">
        <div class="wei"><?= $var ?></div>
        &nbsp;
        <ul class="nList" style="display:inline;float:left;">
            <input type="button" value="万千 " class="code reset2 checked"/>
            <!--	<input type="button" value="万百 " class="code reset2" />-->
            <!--	<input type="button" value="万十 " class="code reset2" />-->
            <!--	<input type="button" value="万个 " class="code reset2" />-->
            <!--	<input type="button" value="千百 " class="code reset2" />-->
            <!--	<input type="button" value="千十 " class="code reset2" />-->
            <!--	<input type="button" value="千个 " class="code reset2" />-->
            <!--	<input type="button" value="百十 " class="code reset2" />-->
            <!--	<input type="button" value="百个 " class="code reset2" />-->
            <!--	<input type="button" value="十个" class="code reset2" />-->

            &nbsp;&nbsp;

    </div>
    <?php
}

$maxPl = $this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
  $(function () {
    gameSetPl(<?=json_encode($maxPl)?>);
    $('#lt_sel_insert').on('click', function () {
      setTimeout(function () {
        $('.num-table :button').addClass('checked');
      }, 1000);
    });
      <?php if ($this->type == 1) { ?>
    $('#tz_xz1 a[href]').live('click', function () {
      var $this = $(this);
      if ($this.parent().is('.tag')) return false;
      $('#playList').load($this.attr('tourl'), function () {
        $('#playList #tz_xz').attr('style', 'display: none;');
        $this.addClass("tag").siblings("a").removeClass("tag");
        $(".m-lott-methodBox-list").hide();
      });

      return false;
    });
      <?php } ?>
  })
</script>