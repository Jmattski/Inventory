<?php
    include('connection.php');

    $Username = $_POST['User'];
    $Password = $_POST['Pass'];

    $Username = stripcslashes($Username);
    $Password = stripcslashes($Password);
    $Username = mysqli_real_escape_string($con, $Username);
    $Password = mysqli_real_escape_string($con, $Password);

    $sql = "select * from employee where Username = '$Username' and Password = '$Password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
        echo "Login Successfully:";
    }
    else
    {
		$message = "INCORRECT TRY AGAIN";
        echo "<script type = 'text/javascript'>alert('$message');</script>";
    }
	
?>