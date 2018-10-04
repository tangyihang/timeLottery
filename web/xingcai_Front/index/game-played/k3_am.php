<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<style>
    .num_option {
        width: 90px;
        text-align: center;
    }
    .game .pp input.code {
        margin: 0px;
    }
    .code-wrapperk3 {
        margin-left: 50px;
        padding-top: 10px;
        float: left;
        text-align: center;
    }
</style>
<div class="pp pp11" action="tz11x5Select" length="1" >
    <div class="code-wrapperk3">
    <?php
    // 获取澳门快三赔率
    $sql = "select id, Rte, rName from {$this->prename}k3 where enable=1 order by sort";
    $groups = $this->getRows($sql);
    if ($groups)
        $arr = array_slice($groups,4,8);
        foreach ($arr as $key => $group) {
            ?>
            <label class="num_option">
                <input type="button" value="<?php echo $group['rName'] ?>" class="code"/>
                <br/><span>赔率<?php echo $group['Rte'] ?></span>
            </label>
            <?php
        }
    ?>
    </div>
    <div class="code-wrapperk3">
        <?php
        if ($groups)
            $arr = array_slice($groups,12,8);
        foreach ($arr as $key => $group) {
            ?>
            <label class="num_option">
                <input type="button" value="<?php echo $group['rName'] ?>" class="code"/>
                <br/><span>赔率<?php echo $group['Rte'] ?></span>
            </label>
            <?php
        }
        ?>
    </div>
    <div class="code-wrapperk3">
        <?php
        if ($groups)
            $arr = array_slice($groups,0,4);
        foreach ($arr as $key => $group) {
            ?>
            <label class="num_option">
                <input type="button" value="<?php echo $group['rName'] ?>" class="code"/>
                <br/><span>赔率<?php echo $group['Rte'] ?></span>
            </label>
            <?php
        }
        ?>
    </div>
</div>
<?php

$maxPl=$this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
  $(function(){
    gameSetPl(<?=json_encode($maxPl)?>);
  })
</script>