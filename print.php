<?php
/*******************************************************************************
* Iklan Manager                                                                *
*                                                                              *
* Version: 1.0(beta)                                                           *
* Date:    2016-11-27                                                          *
* Author:  TOMMI EKO PRASSETIYO                                                *
*******************************************************************************/
include 'config/config.php';
require('assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('assets/gambar/bolo.png',1,1,4,2);
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,'BOLO SOLUTIONS',0,'L');
$pdf->SetX(5);
$pdf->MultiCell(19.5,0.5,'Telpon : 085708709710',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(5);
$pdf->MultiCell(19.5,0.5,'Jln Juwingan No 129',0,'L');
$pdf->SetX(5);
$pdf->MultiCell(19.5,0.5,'Website : www.bolosolutions.com email : cs.bolosolutions@gmail.com | TEPLab(Tommi Eko Prassetiyo Lab) ',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Iklan Bulanan",0,10,'C');
$pdf->ln(0.2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Nama : ".strtoupper($_GET["nama"]),0,1,'L');
$pdf->Cell(5,0.7,"Bulan : ".$_GET["bulan"],0,1,'L');
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Awal', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Akhir', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Tabel', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Sundul', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Baru', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Keterangan', 1, 1, 'C');
$no=1;
$nopage=1;
$pdf->SetFont('Arial','',10);
$stmt = $pdo->prepare("SHOW TABLES");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
	if($row["Tables_in_ikman"]=="note")
	{
		
	}
	else
	{
	if($nopage==13)
	{
		$nopage=1;
		$pdf->AddPage();
		$tot = $row["Tables_in_ikman"];
		$pdf->Cell(1, 0.8, $no,1, 0, 'C');
		$pdf->Cell(3, 0.8,$_GET["tanggalawal"], 1, 0, 'C');
		$pdf->Cell(3, 0.8,$_GET["tanggalakhir"], 1, 0, 'C');
		$pdf->Cell(5, 0.8, $tot,1, 0, 'C');		
		$query = $pdo->prepare("SELECT count( * ) FROM $tot WHERE status ='sundul'");
		$query->execute();
		while($rowsun=$query->fetch(PDO::FETCH_ASSOC))
		{
			$pdf->Cell(3, 0.8,$rowsun['count( * )'],1, 0, 'C');
		}

		/*baru*/
		$query = $pdo->prepare("SELECT count( * ) FROM $tot WHERE status ='baru'");
		$query->execute();
			while($rowbaru=$query->fetch(PDO::FETCH_ASSOC))
			{
				$pdf->Cell(3, 0.8,$rowbaru['count( * )'],1, 0, 'C');
			}
		$pdf->Cell(7, 0.8, '', 1, 1, 'C');
		$no++;
		$nopage++;
	}
	else
	{
		$tot = $row["Tables_in_ikman"];
		$pdf->Cell(1, 0.8, $no,1, 0, 'C');
		$pdf->Cell(3, 0.8,$_GET["tanggalawal"], 1, 0, 'C');
		$pdf->Cell(3, 0.8,$_GET["tanggalakhir"], 1, 0, 'C');
		$pdf->Cell(5, 0.8, $tot,1, 0, 'C');		
		$query = $pdo->prepare("SELECT count( * ) FROM $tot WHERE status ='sundul'");
		$query->execute();
		while($rowsun=$query->fetch(PDO::FETCH_ASSOC))
		{
			$pdf->Cell(3, 0.8,$rowsun['count( * )'],1, 0, 'C');
		}

		/*baru*/
		$query = $pdo->prepare("SELECT count( * ) FROM $tot WHERE status ='baru'");
		$query->execute();
			while($rowbaru=$query->fetch(PDO::FETCH_ASSOC))
			{
				$pdf->Cell(3, 0.8,$rowbaru['count( * )'],1, 0, 'C');
			}
		$pdf->Cell(7, 0.8, '', 1, 1, 'C');
		$no++;	
		$nopage++;
	}
	
	}
}
$pdf->ln(0.2);
$pdf->MultiCell(17,0.5,'Dengan ini saya menyatakan dengan sebenar-benarnya.',0,'L');
$pdf->ln(0.5);
$pdf->Cell(42,0.5,date("d F Y"),0,1, 'C');
$pdf->ln(2);
$pdf->Cell(42,0.5,strtoupper($_GET["namapanjang"]),0,1, 'C');
$pdf->Output("Laporan iklan Bulan ".$_GET["bulan"].".pdf","I");
?>