<?php
$lastNo=$this->getGameLastNo($this->type);
$nowtime = strtotime($lastNo['actionTime']);
$sql = "select time, number, data from {$this->prename}data 
where type={$this->type} and time <= {$nowtime}
order by time desc, number desc limit {$args[0]}";
if ($data = $this->getRows($sql))
    foreach ($data as $var) {
        ?>
        <tr align=center>
            <td>
                <div class='periodlist'><?= $var['number'] ?></div>
            </td>
            <td title='<?= $var['data'] ?>'>
                <div class='periodlist'><?= $var['data'] ?></div>
            </td>
        </tr>
    <?php } ?>
<script type="text/javascript">
  $(function () {
    $("dd").each(function () {
      $(this).children().first().css("color", "red");
    });
  });
</script>
