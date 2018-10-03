<input type="hidden" name="playedGroup" value="<?= $this->groupId ?>"/>
<input type="hidden" name="playedId" value="<?= $this->played ?>"/>
<input type="hidden" name="type" value="<?= $this->type ?>"/>
<style>
    .nList1 {
        margin-left: 1rem;
    }

    .nList1 ul {
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    .ball_list ul li {
        vertical-align: top;
        display: inline-block;
        text-align: center;
        margin-top: 0.5rem;
        border: 1px solid hsla(0, 85%, 37%, 0.68);
        padding: 0px 0 5px;
        width: 5.5rem;
        padding-top: .1em;
        overflow: hidden;
        margin: .1rem .2em;
        line-height: 1.22em;
        font-size: .9em;
    }

    .num-table .pp .code {
        margin: 0.5rem;
    }

    .num-table .pp .code.checked {
        margin: 0.5rem;
    }

    .nList1 li p {
        font-size: .6em;
        line-height: 1.2em;
        color: #caebda;
    }
</style>
<div class="pp pp11" action="tz11x5Select" length="1" style="width:100%;text-align: left;">
    <div class="relative">
        <div style="text-align: center;">猜3个开奖号相加的和，3-10为小，11-18为大。</div>
        <ul class="nList1" style="">
            <?php
            // 获取澳门快三赔率
            $sql = "select id, Rte, rName from {$this->prename}k3 where enable=1 order by sort";
            $groups = $this->getRows($sql);
            if ($groups)
                foreach ($groups as $key => $group) {
                    ?>
                    <li>
                        <input type="button" value="<?php echo $group['rName'] ?>" class="code"/>
                        <br/><label>赔率<?php echo $group['Rte'] ?></label>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>


</div>
<?php
$maxPl = $this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
  $(function () {
    gameSetPl(<?= json_encode($maxPl) ?>);
  })
</script>