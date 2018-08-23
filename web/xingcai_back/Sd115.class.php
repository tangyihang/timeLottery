<?php

class Sd115 extends WebLoginBase
{
    public final function sd115_129kai()
    {
        $type = $_REQUEST['type'];
        $lastNo = $this->getGameLastNo($type);
        $api = 'https://129kai.net/index.php?c=api&a=updateinfo&cp=sd11x5&uptime=1488044922&chtime=37625&catid=188&modelid=25';
        $resource = file_get_contents( $api );
        $data = json_decode( $resource , 1 );

        foreach ($data['list'] as $key => $value) {
            if(trim(substr(date('Y'),0,2).$lastNo['actionNo']) == trim($value['c_t'])){
                $ct = $lastNo['actionNo'];
                $cd = $value['c_d'];
                $cr = $value['c_r'];
                break;
            }
        }
        header('Content-Type: text/xml;charset=utf8');
        //$limit=strlen($ct)-0;
        //$ct=substr($ct,2,$limit).''.substr($ct,$limit,$limit+0);
        echo '<xml>
<row expect="'.$ct.'" opencode="'.$cr.'" opentime="'.str_replace('/','-',$cd).'"/>
</xml>';
    }
}