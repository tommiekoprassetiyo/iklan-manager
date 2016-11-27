<?php
/*******************************************************************************
* Iklan Manager                                                                *
*                                                                              *
* Version: 1.0(beta)                                                           *
* Date:    2016-11-27                                                          *
* Author:  TOMMI EKO PRASSETIYO                                                *
*******************************************************************************/
ob_start();
include_once('config/config.php');
include_once('header.php');
$iktable = $_GET['table'];
$ikid=$_GET['ikid'];

if(isset($_POST['btn-del']))
{
    $crud->delete($iktable,$ikid);
    header("Location: maindel.php?deleted&ikid=$ikid&table=$iktable"); 
    ?>
    <?php
}
?>

<div id="page-wrapper">

 <?php    
    if(isset($_GET['deleted']))
    {
        ?>
        <div class="alert alert-success">
        <strong>Success!</strong> record was deleted... 
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="alert alert-danger">
        <strong>Sure !</strong> to remove the following record ? 
        </div>
        <?php
    }

    $crud->getid($iktable,$ikid);

        if(isset($_GET['deleted']))
        {
            ?>
            <a href="main.php?table=<?php print($iktable); ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            <?php
        }
        else
        {
            ?>
            <form method="post">
            <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
            <a href="main.php?table=<?php print($iktable); ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
            </form>  
            <?php
        }   

     ?>

</div>
<?php
include_once('footer.php');
?>