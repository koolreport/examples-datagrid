<?php
    use \koolreport\datagrid\DataTables;
?>
<div class="container report-content">
    <div class="text-center">
        <h1>Table Paging</h1>
        <p class="lead">
        This example shows how to turn on paging feature of DataTables
        </p>
    </div>
    
    <?php
    DataTables::create(array(
        "dataSource"=>$this->dataStore("employees"),
        "options"=>array(
            "paging"=>true
        )
    ));
    ?>
</div>