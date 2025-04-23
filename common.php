<?php

/**
 * If you install koolreport with composer, you only need to
 * require the composer autoload file
 * 
 * require_once dirname(__FILE__)."/vendor/autoload.php";
 */

// require_once dirname(__FILE__) . "/vendor/autoload.php";
require_once dirname(__FILE__)."/../koolreport/core/autoload.php";

function getConfig() {
    return array(
        "automaker" => array(
            "connectionString" => "mysql:host=sampledb.koolreport.com;dbname=automaker",
            "username" => "expusr",
            "password" => "koolreport sampledb",
            "charset" => "utf8"
        ),
        "sakila" => array(
            "connectionString" => "mysql:host=sampledb.koolreport.com;dbname=sakila",
            "username" => "expusr",
            "password" => "koolreport sampledb",
            "charset" => "utf8"
        ),
        "world" => array(
            "connectionString" => "mysql:host=sampledb.koolreport.com;dbname=world",
            "username" => "expusr",
            "password" => "koolreport sampledb",
            "charset" => "utf8"
        ),
        "employees" => array(
            "connectionString" => "mysql:host=sampledb.koolreport.com;dbname=employees",
            "username" => "expusr",
            "password" => "koolreport sampledb",
            "charset" => "utf8"
        ),
        "salesCSV" => array(
            'filePath' => '../../../data/customer_product_dollarsales2.csv',
            'class' => "\koolreport\datasources\CSVDataSource",
            'fieldSeparator' => ';',
        )
    );
}

function getRootUrl()
{
    $document_root = $_SERVER["DOCUMENT_ROOT"];
    $script_name = dirname($_SERVER["SCRIPT_NAME"]);
    $root_url = $script_name;
    while (!is_file($document_root . $root_url . "/common.php")) {
        $root_url = dirname($root_url);
    }
    return $root_url;
}

$root_url = getRootUrl();
?>
<link href="<?php echo $root_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">