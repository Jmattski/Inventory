<?php

session_start();
$db = new mysqli('localhost', 'root', '', 'pbg_itam') or die ("enable to connect.");

$item_id = 0;
$name = "";
$description = "";
$type = "";
$quantity = "";
$purchase = "";
$release = "";
$cabenet = "";
$update = false;

if (isset($_POST['save'])){
	$item_id = $_POST['item_id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$type = $_POST['type'];
	$quantity = $_POST['quantity'];
	$purchase = $_POST['purchase'];
	$release = $_POST['release'];
	$cabenet = $_POST['cabenet'];
	
	mysqli_query($db, "INSERT INTO item (item_id, name, description, type, quantity, purchase_date, release_date, cabenet) VALUES ('$item_id', '$name', '$description', '$type', '$quantity', '$purchase', '$release','$cabenet')");
	$_SESSION['message'] = "New Data Added.";
	header('location: Item.php');
}

if (isset($_GET['edit'])) {
		$item_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM item WHERE item_id=$item_id");
		
		if (is_countable($record) && count($record) == 1) {
			$n = mysqli_fetch_array($record);
			$item_id = $n['item_id'];
			$name = $n['name'];
			$description = $n['description'];
			$type = $n['type'];
			$cabenet = $n['cabenet'];
			$purchase = $n['purchase_date'];
			$release = $n['release_date'];
			$quantity = $n['quantity'];
		}	
	}

if (isset($_POST['update'])) {
	$item_id = $_POST['item_id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$type = $_POST['type'];
	$cabenet = $_POST['cabenet'];
	$purchase = $_POST['purchase'];
	$release = $_POST['release'];
	$quantity = $_POST['quantity'];
	
	mysqli_query($db, "UPDATE item SET name='$name', description='$description', type='$type', quantity='$quantity', purchase_date='$purchase', release_date='$release', cabenet='$cabenet' WHERE item_id=$item_id");
	$_SESSION['message'] = "Updated Record.";
	header('location: desc.php');
	
}

if (isset($_GET['delete'])){
	$item_id = $_GET['delete'];
	
	mysqli_query($db, "DELETE FROM item WHERE item_id=$item_id");
		
	$_SESSION['message'] = "ITEM DELETED.";
	header('location: desc.php');
	
	
}

?>
