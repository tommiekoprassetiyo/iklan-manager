<?php
/*******************************************************************************
* Iklan Manager                                                                *
*                                                                              *
* Version: 1.0(beta)                                                           *
* Date:    2016-11-27                                                          *
* Author:  TOMMI EKO PRASSETIYO                                                *
*******************************************************************************/
include_once('header.php');
?>
<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard Iklan Manager</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Add</div>
                                    <div>Tambah Tabel Iklan</div>
                                </div>
                            </div>
                        </div>
                        <a href="createtable.php">
                            <div class="panel-footer">
                                <span class="pull-left">Create</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-print fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Print</div>
                                    <div>Print Laporan Iklan</div>
                                </div>
                            </div>
                        </div>
                        <a href="printproses.php">
                            <div class="panel-footer">
                                <span class="pull-left">Print</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<div id="modalpesan" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create DATA Table</h4>
				</div>
				<div class="modal-body">
					<?php
					if(isset($_POST['submit']))
					{
						try {
								$tableikman = $_POST['tabletb'];
								if($crud->createtb($tableikman))
								{
									echo "<div class='alert alert-success alert-dismissable'>
					                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					                                Data Berhasil Terupdate. <a href='#'' class='alert-link'>View</a>.
					                   </div>";
								}
								else
								{
									echo "<div class='alert alert-danger alert-dismissable'>
					                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					                                Data gagal di Update.  <a href='#'' class='alert-link'>Alert Link</a>.
					                   </div>";	
								}
						} catch (PDOException $e) {
							$e->getmessage();
							
						}
					}
					?>
							<form method="POST" action="">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
									  	<input type="text" class="form-control" name="tabletb" placeholder="Create Table" aria-describedby="basic-addon1" required>
									</div>
								</div>
								<input type="submit" class="btn btn-lg btn-primary" name="submit" value="Login" style="float: ;"></input>
							</form>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>		
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php
include_once('footer.php');
?>