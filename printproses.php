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
	<div class="row">
        	<form role="form" method="GET" action="print.php">
        	<br>
        	<a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a><br><br><br>

        	<div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Nama Panggilan</label>
	                <div class="col-sm-6 input">
	                	<input type="text" class="form-control" name="nama" placeholder="Nama Panggilan Pembuat Iklan" aria-describedby="basic-addon1" required>
	                </div>	
               	</div><br><br>
            <div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Nama Panjang</label>
	                <div class="col-sm-6 input">
	                	<input type="text" class="form-control" name="namapanjang" placeholder="Nama Panjang Pembuat Iklan" aria-describedby="basic-addon1" required>
	                </div>	
               	</div><br><br>
            <div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Bulan Pembuatan Iklan</label>
	                <div class="col-sm-2 input">
		                <select class="form-control" name="bulan">
		                	<option>JANUARI</option>
		                	<option>FEBRUARI</option>
		                	<option>MARET</option>
		                	<option>APRIL</option>
		                	<option>MEI</option>
		                	<option>JUNI</option>
		                	<option>JULI</option>
		                	<option>AGUSTUS</option>
		                	<option>SEPTEMBER</option>
		                	<option>OKTOBER</option>
		                	<option>NOVEMBER</option>
		                	<option>DESEMBER</option>
		                </select>
		            </div>
               	</div><br><br>
            <div class="form-group" style="display: block;">
	                <label for="" class="col-sm-2 control-label">Tanggal Kegiatan</label>
	                <div class="col-sm-13 input">
	                <div class="col-sm-2">
	                	<label>Awal</label>
		                <select class="form-control" name="tanggalawal">
		                <?php
		                $noawal=31;
						for($i=1;$i<=$noawal;$i++)
						{
						?>					
		                	<option><?php echo $i; ?></option>
		                <?php
		            	}
		            	?>
		                </select>
		                <br>
		                <button type="submit" class="btn btn-primary" name="submit">
				    		<span class="fa fa-print"></span> Print
						</button>
		            </div>
		            <div class="col-sm-2">
		            	<label>Akhir</label>
		                <select class="form-control" name="tanggalakhir">
		                <?php
		                $noawal=31;
						for($i=1;$i<=$noawal;$i++)
						{
						?>					
		                	<option><?php echo $i; ?></option>
		                <?php
		            	}
		            	?>
		                </select>
		            </div>
		                
		            </div>
               	</div>
            </form>
</div>
</div>
<?php
include_once('footer.php');

?>