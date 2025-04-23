<?php
//Step 1: Load KoolReport
require_once "../../../common.php";

//Step 2: Creating Report class
class MyReport extends \koolreport\KoolReport
{
    public function settings()
    {
        //Get default connection from config.php
        $config = getConfig();

        return array(
            "dataSources"=>array(
                "automaker"=>$config["automaker"]
            )
        );
    }   
    protected function setup()
    {
        $this->src('automaker')
        ->query("SELECT employeeNumber, firstName,lastName,jobTitle, extension from employees")
        ->pipe($this->dataStore("employees"));
    } 

}