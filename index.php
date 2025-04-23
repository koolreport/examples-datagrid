<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="KoolReport is an intuitive and flexible Open Source PHP Reporting Framework for faster and easier data report delivery.">
    <meta name="author" content="KoolPHP Inc">
    <meta name="keywords" content="php reporting framework">
    <title>KoolReport Examples &amp; Demonstration</title>

    <link href="./assets/fontawesome/font-awesome.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.css" rel="stylesheet">

    <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .fa-plus-square-o,
    .fa-minus-square-o {
        cursor: pointer;
    }
</style>
<script>
    function toggleExpandCollapse(i) {
        i.classList.toggle('fa-plus-square-o');
        i.classList.toggle('fa-minus-square-o');
    }

    function toggleExpandCollapseAll(i) {
        let div = i.parentElement.parentElement;
        let expandCollapseButtons = div.querySelectorAll('.expand-collapse');
        expandCollapseButtons.forEach(function(btn) {
            if (i.classList.contains('fa-plus-square-o')) {
                if (btn.classList.contains('fa-plus-square-o')) {
                    btn.click();
                }
            } else if (i.classList.contains('fa-minus-square-o')) {
                if (btn.classList.contains('fa-minus-square-o')) {
                    btn.click();
                }
            }
        })
        i.classList.toggle('fa-plus-square-o');
        i.classList.toggle('fa-minus-square-o');
    }
</script>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a id="baseUrl" class="navbar-brand" href="https://www.koolreport.com/examples">KoolReport Examples</a>
        <a id="repoUrl" class="navbar-brand" href="https://github.com/koolreport/examples-datasources">GitHub</a>
        <ul id="topMenu" class="navbar-nav mr-auto">

        </ul>
        <div class="my-2 my-lg-0">
            <a href="https://www.koolreport.com/get-koolreport-pro" class="btn-get-koolreort-pro btn btn-outline-success my-2 my-sm-0">Get KoolReport Pro</a>
        </div>
    </nav>
    <main class="container">
        <?php
        $root_url = ".";
        $reportJson = <<<EOD
            {
                "EXTENDED PACKAGES": {
                    "<i class='fa fa-th'></i>DataGrid": {
                        "DataTables": "/reports/datagrid/datatables/",
                        "Table Paging": "/reports/datagrid/datatables_paging/",
                        "Table Searching": "/reports/datagrid/datatables_searching/",
                        "Table Sorting": "/reports/datagrid/datatables_sorting/",
                        "Column Reorder": "/reports/datagrid/datatables_colreorder/",
                        "Fixed Order Column": "/reports/datagrid/datatables_ordered_column/",
                        "Custom Type Sorting": "/reports/datagrid/custom_type_sorting/",
                        "Server Processing": "/reports/datagrid/server_processing/",
                        "Server Side Footer": "/reports/datagrid/server_side_footer/",
                        "Client Side Footer": "/reports/datagrid/client_side_footer/",
                        "Plugins": "/reports/datagrid/plugins/",
                        "Complex Headers": "/reports/datagrid/complex_headers/",
                        "Rowgroup": "/reports/datagrid/rowgroup/",
                        "Rowgroup Collapse": "/reports/datagrid/rowgroup_collapse/",
                        "Rowgroup Count Distinct": "/reports/datagrid/rowgroup_count_distinct/",
                        "Rowgroup Sort Aggregate": "/reports/datagrid/rowgroup_sort_aggregate/",
                        "Row Span": "/reports/datagrid/rowspan/",
                        "Row Group with Span": "/reports/datagrid/rowgroup_rowspan/",
                        "Fast Render": "/reports/datagrid/fast_render/",
                        "Row Detail": "/reports/datagrid/row_detail/",
                        "Row Detail Expand": "/reports/datagrid/row_detail_expand/"
                    }
                }
            }        
        EOD;

        $menu = json_decode($reportJson, true);
        foreach ($menu as $section_name => $section) {
        ?>
            <h4 class="section-header"><?php echo $section_name; ?></h4>
            <div class="row">
                <?php
                foreach ($section as $group_name => $group) {
                    $hasChildArray = false;
                    foreach($group as $sname=>$surl) {
                        if(is_array($surl)) {
                            $hasChildArray = true;
                            break;
                        }
                    }
                ?>
                    <div class="col-md-3 example-group col-sm-6">
                        <h5>
                            <?php if ($hasChildArray) { ?>
                                <i class='fa fa-minus-square-o' data-toggle="collapse" onclick="toggleExpandCollapseAll(this);"></i>
                            <?php } ?>
                            <?php echo (strpos($group_name, "</i>") > 0) ? $group_name : "<i class='icon-layers'></i>$group_name"; ?></h5>
                        <ul class="list-unstyled">
                            <?php
                            foreach ($group as $sname => $surl) {
                                if (is_string($surl)) {
                            ?>
                                    <li><a href="<?php echo $root_url . $surl; ?>"><?php echo $sname; ?></a></li>
                                <?php
                                } else {
                                    $idName = $sname;
                                    $idName = str_replace(" ", "", $idName);
                                    $idName = str_replace("/", "", $idName);
                                    $idName = str_replace("&", "", $idName);
                                ?>
                                    <li>
                                        <strong><i class='fa fa-minus-square-o expand-collapse' data-toggle="collapse" data-target="#<?php echo $idName; ?>" onclick="toggleExpandCollapse(this);"></i> <?php echo $sname; ?></strong>
                                        <ul class="list-unstyled collapse show" id="<?php echo $idName; ?>">
                                            <?php
                                            foreach ($surl as $tname => $turl) {
                                            ?>
                                                <li><a href="<?php echo $root_url . $turl; ?>"><?php echo $tname; ?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </main>
</body>

</html>