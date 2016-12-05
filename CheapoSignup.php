<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Signup </title>
  <link rel="stylesheet" type="text/css" href="Cheapostyle.css"/>
</head>
<body>


<?php
session_start();
    $error="";

		if (isset($_POST['submit']))
    {
           function validation($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
          }

        if (empty($_POST['FirstName']) || empty($_POST['LastName']) || empty($_POST['Password'])|| empty($_POST['Username'])|| empty($_POST['Passwordconfirm'])) {
      			$error = "You have missing fields";
      			$first_name=validation($_POST['FirstName']);
      		  $last_name=validation($_POST['LastName']);
           $user=validation($_POST['Username']);

      	}else  if (!preg_match("/^(?=.*[A-Zaz])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/",$_POST['Password'])) {// checks to see if value matches pattern
		 						  $error = "Password format Incorect, 1 letter, 1 capital, 1 numeric, 1 symbol,8 digits long ";
      		 				$first_name=validation($_POST['FirstName']);
            		  $last_name=validation($_POST['LastName']);
                 $user=validation($_POST['Username']);
				}else if (strcmp($_POST['Password'],$_POST['Passwordconfirm'])!==0){
				   $error = "Passwords Do not match Incorect";
		 						  $first_name=validation($_POST['FirstName']);
            		  $last_name=validation($_POST['LastName']);
                 $user=validation($_POST['Username']);
				}

        else{

      	    $first_name=validation($_POST['FirstName']);
      		  $last_name=validation($_POST['LastName']);
             $user=validation($_POST['Username']);
            $pass=validation($_POST['Password']);
            $hash=password_hash($pass, PASSWORD_DEFAULT);

        	$servername = "localhost";
          $username = "root";
          $password = "";

          try {
              $conn = new PDO("mysql:host=$servername;dbname=Cheapo", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql=" INSERT into User(first_name,last_name,username,password)values('$first_name','$last_name','$user','$hash')";
              $conn->exec($sql);
              $error="New User Created";
              $first_name="";
            	$last_name="";
              $username="";
              }

          catch(PDOException $e)
              {
              echo "Connection failed: " . $e->getMessage();
              }


        }
      }


?>

<div class="login-page">
  <div class="form">
    <form class="signup-form" method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" name="FirstName" placeholder="First name"  value="<?php echo $first_name;?>"/>
      <input type="text" name="LastName" placeholder="Surname"  value="<?php echo $last_name;?>"/>
      <input type="text" name="Username" placeholder="Username" value="<?php echo $user;?>"/>
      <input type="password" name="Password" placeholder="password" />
      <input type="password" name="Passwordconfirm" placeholder="Password Confirmation"/>
			 <input type="submit" name="submit" value="Submit">
			 <span><?php echo $error; ?></span>
		</form>

  </div>
</div>



</body>
</html>
