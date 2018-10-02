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
        <ul class="nList1" style="">
            <li>
                <input type="button" value="大" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="小" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="单" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="双" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="3" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="4" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="5" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="6" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="7" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="8" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="9" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="10" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="11" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="12" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="13" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="14" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="15" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="16" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="17" class="code"/><br/><label>赔率1.88</label>
            </li>
            <li>
                <input type="button" value="18" class="code"/><br/><label>赔率1.88</label>
            </li>
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