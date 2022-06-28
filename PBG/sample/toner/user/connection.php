<?php

session_start();
$db = new mysqli('localhost', 'root', '', 'pbg_itam') or die ("enable to connect.");

$id = 0;
$tname = "";
$description = "";
$pname = "";
$location = "";
$purchase = "";
$release = "";
$quantity = "";
$update = false;

if (isset($_POST['save'])){
	$id = $_POST['id'];
	$tname = $_POST['tname'];
	$description = $_POST['description'];
	$pname = $_POST['pname'];
	$location = $_POST['location'];
	$purchase = $_POST['purchase'];
	$release = $_POST['release'];
	$quantity = $_POST['quantity'];
	
	mysqli_query($db, "INSERT INTO toner (id, t_name, description, p_name, location, p_date, r_date, quantity) VALUES ('$id', '$tname', '$description', '$pname', '$location', '$purchase', '$release', '$quantity')");
	$_SESSION['message'] = "New Data Added.";
	header('location: new-u.php');
}

if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM toner WHERE id=$id");
		
		if (is_countable($record) && count($record) == 1) {
			$n = mysqli_fetch_array($record);
			$id = $n['id'];
			$tname = $n['tname'];
			$description = $n['description'];
			$pname = $n['pname'];
			$location = $n['location'];
			$purchase = $n['p_date'];
			$release = $n['r_date'];
			$quantity = $n['quantity'];
		}	
	}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$tname = $_POST['tname'];
	$description = $_POST['description'];
	$pname = $_POST['pname'];
	$location = $_POST['location'];
	$purchase = $_POST['purchase'];
	$release = $_POST['release'];
	$quantity = $_POST['quantity'];
	
	mysqli_query($db, "UPDATE toner SET t_name='$tname', description='$description', p_name='$pname', location='$location', p_date='$purchase', r_date='$release', quantity='$quantity' WHERE id=$id");
	$_SESSION['message'] = "Updated Record.";
	header('location: ink.php');
	
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	
	mysqli_query($db, "DELETE FROM toner WHERE id=$id");
		
	$_SESSION['message'] = "ITEM DELETED.";
	header('location: ink.php');
	
}

?>

<?php

	


/*
$query = "SELECT * FROM item order by item_id desc limit 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$last_item = $row('item_id');
if ($last_item == " ")
{
	$ITEMid= 1;
}
else
{
	$ITEMid = substr($last_item, 2);
	$ITEMid = intval($ITEMid);
	$ITEMid = ($ITEMid + 1);
}
*/
?>