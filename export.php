<head>
    <style type="text/css">
        table{
    width:70%;
            }
            table td{
                white-space: nowrap;
            }
            table td:last-child{
                width:100%;
            }
    </style>
</head>
<table border="1">
<thead><!-- universal table heading -->
    <tr>
        <th>#</th>
        <th>Tanggal</th>
        <th>Judul</th>
        <th>Link</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
<?php
include_once('config/config.php');
$iktable = $_GET['table'];
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Laporan Iklan $iktable ".date('Y').".xls");
		$stmt = $pdo->prepare("SELECT * FROM $iktable");
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
echo '
    <tr>
    	<td>'.$row['id'].'</td>
    	<td>'.$row['tanggal'].'</td>
        <td>'.$row['judul'].'</td>
        <td>'.$row['link'].'</td>
    	<td>'.$row['status'].'</td>
    </tr>
';
					?>
						<?php
						
			}
				}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
?>
</tbody>
</table>