<?php
//Step 1: Load KoolReport
require_once "../../../common.php";

//Step 2: Creating Report class
class MyReport extends \koolreport\KoolReport
{
    function settings()
    {
        $config = getConfig();

        return array(
            "dataSources"=>$config
        );
    }
    protected function setup()
    {

    }
}