<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>User Login </title>
  <link rel="stylesheet" type="text/css" href="Cheapostyle.css"/>
	<style>
	.error {color: #FF0000;}
	</style>
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

        if (empty($_POST['Email']) || empty($_POST['Password'])) {
      			$error = "Username or Password is invalid";
      	}else  if (!preg_match("/^(?=.*[A-Zaz])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/",$_POST['Password'])) {// checks to see if value matches pattern
		 						  $error = "Password format Incorect, 1 letter, 1 capital, 1 numeric, 1 symbol,8 digits long ";
      		 				$email=validation($_POST['Email']);
       }
            
      	else{

      		$email=validation($_POST['Email']);
      		$pass=validation($_POST['Password']);
      		$hash=password_hash($pass, PASSWORD_DEFAULT);
      		$servername = "localhost";
          $username = "root";
          $password = "";

          try {
              $conn = new PDO("mysql:host=$servername;dbname=Cheapo", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              }
          catch(PDOException $e)
              {
              echo "Connection failed: " . $e->getMessage();
              }

              $stmt = $conn->prepare("SELECT * FROM User WHERE username='$email'");
              $stmt->execute();
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              if(password_verify($pass,$result['password'])){
              
              $counter=count($result);
            if ($counter>1){
            $_SESSION['login_user']=$username;
						$_SESSION['first.name']=$result['first_name'];
						$_SESSION['last.name']=$result['last_name'];
							$_SESSION['user.id']=$result['id'];
            header("location: Homepage.php");
          } else
          {
            $error = "Username or Password is invalid";
          }
              }else{ $error="Password Invalid";}

        }
      }


?>

<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" name="Email" placeholder="username"/>
      <input type="password" name="Password" placeholder="password"/>
			 <input type="submit" name="submit" value="Login">
			 <span><?php echo $error; ?></span>
		</form>
  </div>
</div>



</body>
</html>