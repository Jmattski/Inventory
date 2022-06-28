<?php
    session_start();
    $db = new mysqli('localhost', 'root', '', 'pbg_itam') or die ("enable to connect.");

    $Username = $_POST['User'];
    $Password = $_POST['Pass'];

    $Username = stripcslashes($Username);
    $Password = stripcslashes($Password);
    $Username = mysqli_real_escape_string($db, $Username);
    $Password = mysqli_real_escape_string($db, $Password);

    $result = mysqli_query($db, "select * from employee where Username = '$Username' and Password = '$Password'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $emp_no = $row['emp_no'];
    
    

    if($row['status'] == '1 ')
    {
    //echo "Login Successfully:";

		header('location:./sample/item/admin/desc.php');
    $_SESSION['emp_no'] = $emp_no;
    }
      elseif($row['status'] == '0')
      {
      header('location:./sample/item/user/desc.php');
      $_SESSION['emp_no'] = $emp_no;
      }
      else
      {
		    $message = "INCORRECT LOGIN, TRY AGAIN!";
          echo "<script type = 'text/javascript'>\n";
		      echo "alert('$message');\n";
		      echo "location='index.html'";
		      echo "</script>";
      }
	
    //$count = mysqli_num_rows($result);
    //if($count == 1)
?>

