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
?>

<div id="page-wrapper">
	<?php
					if(isset($_POST['submit']))
					{
						try {
								$tableikman = $_POST['tabletb'];
								if($crud->createtb($tableikman))
								{
									echo "<div class='alert alert-success alert-dismissable'>
					                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					                                Data Berhasil Terupdate. <a href='index.php' class='alert-link'>View</a>.
					                   </div>";
								}
								else
								{
									echo "<div class='alert alert-danger alert-dismissable'>
					                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					                                Data gagal di Update.
					                   </div>";	
								}
						} catch (PDOException $e) {
							$e->getmessage();
							
						}
					}
	?>

	<div class="row">
        	<form role="form" method="POST">
        	<br>
        	<a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a><br><br><br>

        	<div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Create Table</label>
	                <div class="col-sm-6 input">
	                	<input type="text" class="form-control" name="tabletb" placeholder="Create Table" aria-describedby="basic-addon1" required>
	                </div>	
               	</div><br><br>
               	<div class="form-group" style="display: block;">
	               	<label for="" class="col-sm-2 control-label"></label>
	               	<div class="col-sm-6 input">
		               	<button type="submit" class="btn btn-primary" name="submit">
				    		<span class="glyphicon glyphicon-plus"></span> Create New Table
						</button>  
					</div>
				</div>
            </form>
</div>
</div>
<?php
include_once('footer.php');