<!DOCTYPE html>
<?php include('connection.php'); ?>

<html>
	<head>
		<title>ITEM</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>
		
			<nav class="w3-sidebar w3-bar-block w3-khaki w3-animate-left w3-text-black w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar">
					<h3 class="w3-padding-64 w3-center"><b>PBG<br>IT ASSET MANAGEMENT</b></h3>
					<a class="w3-bar-item w3-button w3-padding w3-hide-large" href="javascript:void(0)" onclick="w3_close()"></a>
					<a class="w3-bar-item w3-button" href="Item.php" onclick="w3_close()">NEW ITEM</a>	
			</nav>
				
			<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
					<span class="w3-left w3-padding">PBG IT ASSET MANAGEMENT</span>
					<a class="w3-right w3-button w3-white" href="javascript:void(0)" onclick="w3_open()">&#9776 </a>
			</header>
	
		<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
			<div class="w3-main" style="margin-left:310px;margin-right:50px">
		
			<div class="page-header">
					<h1>Update</h1>
			</div>
			
			<?php if (isset($_SESSION['message'])): ?>
			<div class="msg">
				<?php
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				?>
			</div>
			<?php endif ?>
			
			<form action ="connection.php" method ="post">
				<?php $results = mysqli_query($db, "SELECT * from item WHERE item_id=$item_id") ?>
					<?php while ($row = mysqli_fetch_array($results)) {?>
						<table class="table table-hover table-resposive table-bordered">
							<tr>
								<td>Item No</td>
								<td><input type="text" name="item_id" class="form-control" value="<?php echo $item_id; ?>" readonly></td>
							</tr>
						
							<tr>
								<td>Name</td>
								<td><input type="text"	name="name" class="form-control" value="<?php echo $row['name']; ?>" required></td>
							</tr>
							<tr>
								<td>Description</td>
								<td><input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>" required></td>
							</tr>
							<tr>
								<td>Type</td>
								<td><input type="text" name="type" class="form-control" value="<?php echo $row['type']; ?>" required></td>
							</tr>
							<tr>
								<td>Cabenet</td>
								<td><input type="text" name="cabenet" class="form-control" value="<?php echo $row['cabenet']; ?>" required></td>
							</tr>
							<tr>
								<td>Purchase Date</td>
								<td><input type="date" name="purchase" class="form-control" value="<?php echo $row['purchase_date']; ?>"></td>
							</tr>
							<tr>
								<td>Release Date</td>
								<td><input type="date" name="release" class="form-control" value="<?php echo $row['release_date']; ?>"></td>
							</tr>	
							<tr>
								<td>Quantity</td>
								<td><input type="text" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>" required></td>
							</tr>
						</table>	
					<?php } ?>	
					<button type="submit" name="update" class="btn btn-primary">YES</button>
					<a href="desc.php" class="btn btn-primary">NO</a>
			</form>
			
			</div>
	
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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