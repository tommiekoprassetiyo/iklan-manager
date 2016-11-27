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
<?php
if(isset($_POST['btn-save']))
{
	$ikid = $_GET['ikid'];
	$iktanggal = date("Y/m/d");
	$ikjudul = $_POST['judul'];
	$iklink = $_POST['link'];
	$ikstatus = $_POST['status'];
	if($crud->update($ikid,$iktanggal,$ikjudul,$iklink,$ikstatus,$iktable))
	{
        echo "<div class='alert alert-success alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                Data Berhasil di Update. <a href='main.php?table=$iktable' class='alert-link'>View</a>.
                   </div>";
	}
	else
	{
        echo "<div class='alert alert-danger alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                Data gagal di Update.
                   </div>"; 
	}
}

if(isset($_GET['ikid']))
{
	$ikid = $_GET['ikid'];
	extract($crud->getidupdate($iktable,$ikid));
}
?>

<div class="row">
        	<form role="form" method="POST">
        	<br>
        	<a href="main.php?table=<?php print($iktable); ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a><br><br><br>
        	<input type="hidden" name="id" >
               	<div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Judul</label>
	                <div class="col-sm-6 input">
	                	<input class="form-control" type="text" name="judul" placeholder="Masukkan Judul Iklan" value="<?php echo $judul; ?>" required>
	                </div>	
               	</div><br><br>
               	<div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Link</label>
	                <div class="col-sm-6 input">
	                	<input class="form-control" type="text" name="link" placeholder="Masukkan Link Iklan" value="<?php echo $link; ?>" required>
	                </div>	
               	</div><br><br>
               	<div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Status Iklan</label>
	                <div class="col-sm-6 input">
		                <label class="radio-inline">
	                        <input type="radio" name="status" id="optionsRadiosInline1" value="Sundul" <?php if ($status == 'Sundul') echo 'checked="checked"'; ?> >Sundul
	                    </label>
	                    <label class="radio-inline">
	                        <input type="radio" name="status" id="optionsRadiosInline2" value="Baru" <?php if ($status == 'Baru') echo 'checked="checked"'; ?>>Baru
	                    </label>
	                </div>	
               	</div><br><br>
               	<div class="form-group" style="display: block;">
	               	<label for="" class="col-sm-2 control-label"></label>
	               	<div class="col-sm-6 input">
		               	<button type="submit" class="btn btn-primary" name="btn-save">
				    		<span class="glyphicon glyphicon-plus"></span> Update Record
						</button>  
					</div>
				</div>
            </form>
</div>
			
</div>

<?php
include_once('footer.php');
?>