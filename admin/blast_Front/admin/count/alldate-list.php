<?php
$para=$_GET;
if ($para['fromTime'] && $para['toTime']) {
    $fromTime = strtotime($para['fromTime']);
    $toTime = strtotime($para['toTime']) + 24 * 3600;
    $betTimeWhere="and actionTime between $fromTime and $toTime";
    $rechargeTimeWhere = "and r.actionTime between $fromTime and $toTime";
    $cashTimeWhere="and c.actionTime between $fromTime and $toTime";
    $fanDiaTimeWhere="and l.actionTime between $fromTime and $toTime";
} elseif ($para['fromTime']) {
    $fromTime = strtotime($para['fromTime']);
    $betTimeWhere="and b.actionTime >=$fromTime";
    $rechargeTimeWhere = "and r.actionTime >=$fromTime";
    $cashTimeWhere="and c.actionTime >=$fromTime";
    $fanDiaTimeWhere="and l.actionTime >= $fromTime";
} elseif ($para['toTime']) {
    $toTime = strtotime($para['toTime']) + 24 * 3600;
    $betTimeWhere="and b.actionTime < $toTime";
    $rechargeTimeWhere = "and r.actionTime < $toTime";
    $cashTimeWhere="and c.actionTime < $toTime";
    $fanDiaTimeWhere="and l.actionTime < $toTime";
} else {
    $toTime = strtotime('00:00');
    $betTimeWhere="and b.actionTime > $toTime";
    $rechargeTimeWhere = "and r.actionTime > $toTime";
    $cashTimeWhere="and c.actionTime > $toTime";
    $fanDiaTimeWhere="and l.actionTime > $toTime";
}

// 投注金额，中奖金额
$sql2="select sum(b.mode * b.beiShu * b.actionNum) betAmount, sum(b.bonus) zjAmount from blast_bets b where b.isDelete=0  $betTimeWhere";
$all=$this->getRow($sql2);
// 充值金额
$all['rechargeAmount'] = $this->getValue("
  select sum(r.amount) from {$this->prename}member_recharge r where r.state in (1,2,9) $rechargeTimeWhere
");
// 提现金额
$all['cashAmount']=$this->getValue("
  select sum(c.amount) from {$this->prename}member_cash c where c.state=0 $cashTimeWhere
");
$all['fanDianAmount']=$this->getValue("
  select sum(l.coin) from {$this->prename}coin_log l where l.liqType between 2 and 3 $fanDiaTimeWhere
");
$all['coin']=$this->getValue("
  select sum(u.coin) coin from {$this->prename}members u where 1 
");
?>

<table class="tablesorter" cellspacing="0">
    <input type="hidden" value="<?= $this->user['username'] ?>"/>
    <thead>
    <tr>
        <td>充值金额</td>
        <td>提现金额</td>
        <td>投注金额</td>
        <td>中奖金额</td>
        <td>总返点</td>
        <td>盈亏金额</td>
        <td>用户总余额</td>
    </tr>
    </thead>
    <tbody id="nav01">
    <?php if ($all) { ?>
        <tr>
            <td><?= $this->ifs($all['rechargeAmount'], '--') ?></td>
            <td><?= $this->ifs($all['cashAmount'], '--') ?></td>
            <td><?= $this->ifs($all['betAmount'], '--') ?></td>
            <td><?= $this->ifs($all['zjAmount'], '--') ?></td>
            <td><?= $this->ifs($all['fanDianAmount'], '--') ?></td>
            <td><?= $this->ifs($all['betAmount']-$all['zjAmount']-$all['fanDianAmount'], '--')?></td>
            <td><?= $this->ifs($all['coin'], '--') ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script type="text/javascript">
  ghhs("nav01", "tr");
</script>