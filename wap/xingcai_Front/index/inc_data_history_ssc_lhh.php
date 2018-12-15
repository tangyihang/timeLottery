<?php
$sql = "select time, number, data from {$this->prename}data where type={$this->type} order by number desc,time desc limit {$args[0]}";
if ($data = $this->getRows($sql))
    foreach ($data as $var) {
        if ($this->type == 1) {
            $splitD = explode(",", $var['data']);
            $wq_lhh = '';
            if ($splitD[0] > $splitD[1]) {
                $wq_lhh = '龙';
            } else if ($splitD[0] < $splitD[1]) {
                $wq_lhh = '虎';
            } else {
                $wq_lhh = '和';
            }
            ?>
            <tr align=center>
                <td>
                    <div class='periodlist'><?= $var['number'] ?></div>
                </td>
                <td title='<?= $var['data'] ?>'>
                    <div class='periodlist'><?= $var['data'] ?></div>
                </td>
                <td>
                    <div class='periodlist'><?= $wq_lhh ?></div>
                </td>
            </tr>
        <?php }
    } ?>
<script type="text/javascript">
  $(function () {
    $("dd").each(function () {
      $(this).children().first().css("color", "red");
    });
  });
</script>
