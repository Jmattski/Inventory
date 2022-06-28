<!DOCTYPE html>
<?php 

	include('connection.php'); 
	$limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $result = mysqli_query($db, "SELECT * FROM item LIMIT $start, $limit");
    $item = $result->fetch_all(MYSQLI_ASSOC);

    $result1 = mysqli_query($db, "SELECT count(item_id) AS item_id FROM item");
    $itemCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $itemCount[0]['item_id'];
    $pages = ceil( $total / $limit);

    $Previous = $page - 1;
    $Next = $page + 1;
	
	$emp_no = $_SESSION['emp_no'];
	$sql = mysqli_query($db, "SELECT * FROM employee WHERE emp_no=$emp_no");
	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
?>
<html lang="en">

	<head>
				
					<div class="w3-right" style="margin-left:310px;margin-right:50px">	
						<img width="30" height="30" src="..\img\Male.jpg">
						<span onclick="alert('Hello')" class="btn btn-primary"><?php echo $row['emp_name']; ?></span>
					</div>
		


				<!-- <div class="nav-right">
					<img width="30" height="30" src="..\img\Male.jpg">
					<span onclick="alert('Hello')" class="btn btn-primary"><?php echo $row['emp_name']; ?></span>
				 </div> -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
				$(document).ready(function() {
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
				});
		</script>

		<title>MAIN</title>
		
		<!--<link href="./css/table.css" rel="stylesheet" type="text/css">-->
		
		
		<meta charset="utf-8">
		<!--<link rel="stylesheet" href="../library/css/bootstrap.min.css" type="text/css">-->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!--<link rel="stylesheet" href="../../css/pbg.css" type="text/css">-->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	</head>
	
	<body>
				
				<nav class="w3-sidebar w3-bar-block w3-orange w3-animate-left w3-text-black w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar">
					
					<h3 class="w3-padding-64 w3-center" href="#"><b>PBG<br>IT ASSET MANAGEMENT</b></h3>
					<a class="w3-bar-item w3-button w3-padding w3-hide-large" href="javascript:void(0)" onclick="w3_close()"></a>
					<a class="w3-bar-item w3-button" href="Item.php" onclick="w3_close()">NEW ITEM</a>
					<a class="w3-bar-item w3-button" href="/PBG/sample/toner/admin../ink.php" onclick="w3_close()">TONER</a>

				</nav>
				<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
					<a class="w3-left w3-button w3-white" href="javascript:void(0)" onclick="w3_open()">&#9776 </a>
					<span class="w3-left w3-padding">PBG IT ASSET MANAGEMENT</span>	
					
				</header>
				
				<div>
					

					<div class="pbg-main" style="margin-left:310px;margin-right:50px">	
						<h1 class="w3-padding-32 w3-center"><b>ITEM LIST</b></h1>
						<input id="myInput" type="text" class="w3-right" placeholder="Search">
						<nav>
							
							
							<ul class="pagination">
								<li	class="<?php if($page <= 1) { echo 'disabled';}	?>">
									<a href="<?php if($page <= 1) { echo '#';} else { echo 'desc.php?page='.( $Previous);} ?>">&laquo; Previous</a>
								</li>
								<?php for($i = 1; $i <= $pages; $i++) : ?>
									<li><a href="desc.php?page=<?= $i; ?>"><?= $i; ?></a></li>
								<?php endfor; ?>
								<li	class="<?php if($page >= $pages) {echo 'disabled';} ?>">
									<a href="<?php if($page >= $pages) {echo '#';} else { echo 'desc.php?page='.($Next);} ?>">Next &raquo;</a>
								</li>
							</ul>
							
						</nav>

						<form action= "Item.php" method= "post">		
								
								<table id="dtBasicExample" class= "table table-hover table-resposive table-bordered">
									<thead>
										<tr class= "w3-purple">
											<th>ITEM NO</th>
											<th>NAME</th>
											<th>DESCRIPTION	</th>
											<th>TYPE</th>
											<th>CABENET</th>
											<th>PURCHASE DATE</th>
											<th>RELEASE DATE</th>
											<th>QUANTITY</th>
											<th>ACTION</th>
										</tr>
									</thead>
									
									<?php foreach($item as $item): ?>
										<tbody id="myTable">
										<tr>
											<td><?= $item['item_id']; ?></td>
											<td><?= $item['name']; ?></td>
											<td><?= $item['description']; ?></td>
											<td><?= $item['type']; ?></td>
											<td><?= $item['cabenet']; ?></td>
											<td><?= $item['purchase_date']; ?></td>
											<td><?= $item['release_date']; ?></td>
											<td><?= $item['quantity']; ?></td>
										
											<td>
													<a href="Update.php?edit=<?= $item['item_id']; ?>" class="btn btn-primary">Edit</a> 
													<a href="desc.php?delete=<?= $item['item_id']; ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
										</tbody>
									<?php endforeach ?>
								</table>
							
						</form>	
					</div>
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