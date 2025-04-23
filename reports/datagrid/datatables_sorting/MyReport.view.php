<?php
    use \koolreport\datagrid\DataTables;
?>
<div class="container report-content">
    <div class="text-center">
        <h1>Table Sorting</h1>
        <p class="lead">
        This eaxmple shows how to set order on columns of DataTables
        </p>
    </div>
    
    <?php
    DataTables::create(array(
        "dataSource"=>$this->dataStore("employees"),
        "options"=>array(
            "order"=>array(
                array(1,"asc")
            )
        )
    ));
    ?>
</div>