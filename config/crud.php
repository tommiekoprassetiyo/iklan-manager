<?php
/*******************************************************************************
* Iklan Manager                                                                *
*                                                                              *
* Version: 1.0(beta)                                                           *
* Date:    2016-11-27                                                          *
* Author:  TOMMI EKO PRASSETIYO                                                *
*******************************************************************************/
class crud
{
	private $db;
	function __construct($pdo)
	{
		# First App by TEPLab
		$this->db = $pdo;

	}

	//Create Table
	public function createtb($tableikman)
	{
		try {
			$query = $this->db->prepare ("CREATE TABLE $tableikman (
	                id int AUTO_INCREMENT PRIMARY KEY,
	                tanggal date NOT NULL,
	                judul varchar(40) NOT NULL,
	                link text NOT NULL,
	                status varchar(20) )");
	    	$query->execute();
    	return true;
		} catch (PDOException $e) {
			$e->getmessage();
			return false;
		}	
	}

	public function deletetb($iktable)
	{
		try {
			$query = $this->db->prepare ("DROP TABLE $iktable");
	    	$query->execute();
    	return true;
		} catch (PDOException $e) {
			$e->getmessage();
			return false;
		}	
	}

	public function dataviewtable()
		 {
		  $stmt = $this->db->prepare("SHOW TABLES");
		  $stmt->execute();
		 
		  if($stmt->rowCount()>0)
		  {
		   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		   {
		   	if($row["Tables_in_ikman"]=="note")
		   	{
		   		?>
		   		<ul class="nav nav-second-level">
                            </ul>
                <?php
		   	}
		   	else
		   	{
		    ?>
		                <ul class="nav nav-second-level">
                                <li>
                                     <a href="main.php?table=<?php print($row["Tables_in_ikman"]); ?>"><i class="fa fa-table" aria-hidden="true"></i> <?php print($row["Tables_in_ikman"]); ?></a>
                                </li>
                            </ul>
		                <?php
		    }
		   }
		  }
		  else
		  {
		   ?>
            <ul class="nav nav-second-level">
                            </ul>
            <?php
  			}
  	}

	//Create DATA
	public function create($ikid,$iktanggal,$ikjudul,$iklink,$ikstatus,$iktable)
	{
		try {
			
			$query = $this->db->prepare("INSERT INTO $iktable (id,tanggal,judul,link,status) VALUES (:ikid,:iktanggal,:ikjudul,:iklink,:ikstatus)");
			$query->bindparam(":ikid", $ikid);
			$query->bindparam(":iktanggal", $iktanggal);
			$query->bindparam(":ikjudul", $ikjudul);
			$query->bindparam(":iklink", $iklink);
			$query->bindparam(":ikstatus", $ikstatus);
			$query->execute();
			return true;
			
		} catch (PDOException $e) {
			$e->getmessage();
			return false;			
		}
	}

	public function getidupdate($iktable,$ikid)
	{
		try {
			$query = $this->db->prepare("SELECT * FROM $iktable where id=:ikid");
			$query->bindparam(":ikid", $ikid);
			$query->execute();
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row;
			
		} catch (PDOException $e) {
			$e->getmessage();
			return false;
		}
	}

	public function getid($iktable,$ikid)
	{
		try {
			$query = $this->db->prepare("SELECT * FROM $iktable where id=:ikid");
			$query->bindparam(":ikid", $ikid);
			$query->execute();
			
			while($row=$query->fetch(PDO::FETCH_ASSOC))
			{

					?>
					<div class="well well-lg">         
                            <?php
									?>
                                <h3><?php print($row['judul']); ?></h3>
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php print($row['tanggal']); ?> via Twitter</small></p>
                                <h4><?php print($row['link']); ?></h4>				 
                        </div>
						<?php
						
			}
			
		} catch (PDOException $e) {
			$e->getmessage();
			return false;
		}
	}

	//update DATA
	public function update($ikid,$iktanggal,$ikjudul,$iklink,$ikstatus,$iktable)
	{
		try {
			$query = $this->db->prepare("UPDATE $iktable SET tanggal=:iktanggal,judul=:ikjudul,link=:iklink,status=:ikstatus WHERE id=:ikid");
			$query->bindparam(":iktanggal", $iktanggal);
			$query->bindparam(":ikjudul", $ikjudul);
			$query->bindparam(":iklink", $iklink);
			$query->bindparam(":ikstatus", $ikstatus);
			$query->bindparam(":ikid", $ikid);
			$query->execute();
			return true;
			
		} catch (PDOException $e) {
			$e->getmessage();
		}
	}

	//Delete Table
	public function delete($iktable,$ikid)
	{
		$query=$this->db->prepare("DELETE FROM $iktable WHERE id=:ikid");
		$query->bindparam(":ikid", $ikid);
		$query->execute();
		return true;
	}

	//View dan Paging
	public function dataview($query)
	{
		$iktable = $_GET['table'];
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			echo "<b>Dari Iklan Keseluruhan :</b> ";
			$query = $this->db->prepare("SELECT count( * ) FROM $iktable WHERE status ='sundul'");
			$query->execute();
				while($rowsun=$query->fetch(PDO::FETCH_ASSOC))
				{
					echo "<b>Sundul : ".$rowsun['count( * )']." | </b>";
				}	

	/*baru*/
			$query = $this->db->prepare("SELECT count( * ) FROM $iktable WHERE status ='baru'");
			$query->execute();
					while($rowbaru=$query->fetch(PDO::FETCH_ASSOC))
					{
						echo "<b>baru : ".$rowbaru['count( * )']."</b><br><br>";
					}
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{

					?>
					<div class="well well-lg">         
                            <?php
                            	if($row['status']== "Sundul")
                            	{
									?>
									<span class="label label-success"><?php print($row['status']); ?></span>
								<?php
								}
								else
								{
									?>
									<span class="label label-primary"><?php print($row['status']); ?></span>
									<?php
								}
								?>
                                <h3><?php print($row['judul']); ?></h3>
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php print($row['tanggal']); ?></small></p>
                                <h4><?php print($row['link']); ?></h4>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-gear"></i> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="mainupdate.php?ikid=<?php print($row['id']); ?>&table=<?php print($iktable); ?>">Edit</a>
                                    </li>
                                    <li><a href="maindel.php?ikid=<?php print($row['id']); ?>&table=<?php print($iktable); ?>">Delete</a>
                                    </li>
                                </ul>
                            </div>					 
                        </div>
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
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		$iktable = $_GET['table'];
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1&table=$iktable'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."&table=$iktable'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."&table=$iktable' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."&table=$iktable'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."&table=$iktable'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."&table=$iktable'>Last</a></li>";
			}
			?></ul><?php
		}
	}
}
?>