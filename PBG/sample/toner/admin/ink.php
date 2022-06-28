<!DOCTYPE html>
<?php 
	include('connection.php'); 

	$emp_no = $_SESSION['emp_no'];
	$sql = mysqli_query($db, "SELECT * FROM employee WHERE emp_no=$emp_no");
	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
?>
<html lang="en">

	<head>

		<div class="w3-main" style="margin-left:310px;margin-right:50px">
		
				<a class="w3-right">
					<img width="30" height="30" src="..\img\Male.jpg">
					<span><?php echo $row['emp_name']; ?></span>
				</a>

		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
				$(document).ready(function(){
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
				});
		</script>
		
		<title>TONER</title>
		<link href="./css/table.css" rel="stylesheet" type="text/css">
		<h1 class="w3-padding-32 w3-center"><b>TONER LIST</b></h1>
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
		
	</head>
	
	<body>
				<nav class="w3-sidebar w3-bar-block w3-orange w3-animate-left w3-text-black w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar">
					<h3 class="w3-padding-64 w3-center" href="#"><b>PBG<br>IT ASSET MANAGEMENT</b></h3>
					<a class="w3-bar-item w3-button w3-padding w3-hide-large" href="javascript:void(0)" onclick="w3_close()"></a>
					<a class="w3-bar-item w3-button" href="new.php" onclick="w3_close()">NEW TONER</a>
					<a class="w3-bar-item w3-button" href="/PBG/sample/item/admin../desc.php" onclick="w3_close()">ITEM</a>	
				</nav>
				
				<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
					<a class="w3-left w3-button w3-white" href="javascript:void(0)" onclick="w3_open()">&#9776 </a>
					<span class="w3-left w3-padding">PBG IT ASSET MANAGEMENT</span>	
				</header>
				
				<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
					<div class="w3-main" style="margin-left:310px;margin-right:50px">	
						
						<input id="myInput" type="text" class="w3-right" placeholder="Search"><br><br>
						
						<form action= "new.php" method= "post">	
							<?php $results = mysqli_query($db, "SELECT * from toner")?>
								<table class= "table table-hover table-resposive table-bordered">
									<thead>
										<tr class= "w3-purple">
											<th>NO</th>
											<th>TONER NAME</th>
											<th>DESCRIPTION	</th>
											<th>PRINTER NAME</th>
											<th>LOCATION</th>
											<th>PURCHASE DATE</th>
											<th>RELEASE DATE</th>
											<th>QUANTITY</th>
											<th>ACTION</th>
										</tr>
									</thead>
									
									<?php while ($row = mysqli_fetch_array($results)) {?>
										<tbody id="myTable">
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['t_name']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td><?php echo $row['p_name']; ?></td>
											<td><?php echo $row['location']; ?></td>
											<td><?php echo $row['p_date']; ?></td>
											<td><?php echo $row['r_date']; ?></td>
											<td><?php echo $row['quantity']; ?></td>
										
											<td>
													<a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a> 
													<a href="ink.php?delete=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
										</tbody>
									<?php } ?>
								</table>	
						</form>	
					</div>
		
			
		<script>
			function w3_open() {
				  document.getElementById("mySidebar").style.display = "block";
				  document.getElementById("myOverlay").style.display = "block";
			}
				 
			function w3_close() {
				  document.getElementById("mySidebar").style.display = "none";
				  document.getElementById("myOverlay").style.display = "none";
			}	
		</script>
		
	</body>

</html>