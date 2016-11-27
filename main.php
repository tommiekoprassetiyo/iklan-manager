<?php
/*******************************************************************************
* Iklan Manager                                                                *
*                                                                              *
* Version: 1.0(beta)                                                           *
* Date:    2016-11-27                                                          *
* Author:  TOMMI EKO PRASSETIYO                                                *
*******************************************************************************/
include_once('config/config.php');
include_once('header.php');
$iktable = $_GET['table'];
?>

<div id="page-wrapper">
<br><a href="mainadd.php?table=<?php print($iktable); ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
<a href="deletetable.php?table=<?php print($iktable); ?>" class="btn btn-outline btn-danger"><i class="fa fa-exclamation-circle"></i> &nbsp; DROP</a>
<a href="export.php?table=<?php print($iktable); ?>" class="btn btn-outline btn-info"><i class="fa fa-print"></i> &nbsp; Export Excel</a><br><br>


     <?php
        $query = "SELECT * FROM $iktable ORDER BY id desc";       
        $records_per_page=4;
        $newquery = $crud->paging($query,$records_per_page);
        $crud->dataview($newquery);
     ?>
    <div class="pagination-wrap">
    <?php $crud->paginglink($query,$records_per_page); ?>
    </div>
</div>
<?php
include_once('footer.php');
?>