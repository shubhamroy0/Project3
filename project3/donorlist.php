<!DOCTYPE html>
<?php
session_start();

$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['age'] = $_POST['age'];
$_SESSION['blood_group'] = $_POST['blood_group'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['lat'] = $_POST['lat'];
$_SESSION['lng'] = $_POST['lng'];


?>


<html>
<head>
<!--
<script language="JavaScript">

	function myValidation() {
	  //Validate Donor Selection
		var checkSel=false;
		for(i=0;i<donorselectform.donorsCheckId[].length;i++){
		if(donorselectform.donorsCheckId[i].checked)
			checkSel=true;
	}
	if(!checkSel){
		alert("Please select at least one donor!");	
	return false;
	}
	}

</script>
-->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MyDonorList</title>
<link href="css/webpagestyle.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
		 
			<h1><a href="index.php">Findmydonor</a></h1>
			<p>save life, give blood.</p>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="index.php">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="donor_registration.php">Donor Registraion</a></li>
			<li><a href="#">Find Hospitals</a></li>
			<li><a href="#">Report a Problem</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<form name="donorselectform" action="NotifyDonors.php" method="post">
			<?php
				
				$Requester_blood_group=$_POST["blood_group"];
				
				include("db.php");
				$result = $mysqli->query("SELECT * FROM users where blood_group='$Requester_blood_group'")  or die($mysqli->error());
				//$num_results = mysql_num_rows($result);
				/*if ($num_results > 0){}
				else{
				header( "location: donornotfounderror.php" );
				}*/
				
			?>
			<style>
				table,th,td{border:1px solid black;border-collapse:collapse;

				table.gridtable{
					border-collapse:collapse;
					border-color:#666666;
					color:#333333;
					font-family:verdana,arial,sans-serif;
					font-size:11px;
			}
			
			}
			.homebutton
			{
				padding-left: 15em		
      		}
			</style>
			
			<table style="font-size:12 px" class="gridtable">
			<tr>
			<th>Donor Name</th>
			<th>Donor Age</th>
			<th>Donor Gender</th>
			<th>Donor Address</th>
			</tr> 
			<?php
			
			while($row=mysqli_fetch_array($result)){?>
			
				<tr>
				<td><?php echo $row['first_name'] . " ". $row['last_name']?></td>
				<td><?php echo $row['age']?></td>
				<td><?php echo $row['gender']?></td>
				<td><?php echo $row['address']?></td>
				
				</tr>
			<?php	
			}
			?>
			
			</table>
			<br>
			<div class="homebutton">
			<input type="submit" value="Notify" /> 
			</div>
		</form> 		
	</div>
	<!-- end #page -->
</div>

<div id="footer">
	<p>Copyright &copy All rights reserved.</p>
</div>
<!-- end #footer -->

</body>
</html>
