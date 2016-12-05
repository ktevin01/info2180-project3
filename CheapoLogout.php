<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Signup </title>
  <link rel="stylesheet" type="text/css" href="Cheapostyle.css"/>
</head>
<body>
  <?php
  session_start();
      $error="";

  		if (isset($_POST['Logout'])){
        if(session_destroy()) // Destroying All Sessions
        {
        header("Location: CheapoLogin.php"); // Redirecting To Home Page
        }
      }

      		if (isset($_POST['HomePage'])){
            
            header("Location: Homepage.php"); // Redirecting To Home Page
            
          }





      ?>

  <div class="login-page">
    <div class="form">
      <form  method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <p style="text-align:center">Are You Sure You Want to Log Out?</p>
  			 <input type="submit" name="Logout"  id="log"value="Yes">
         <input type="submit" name="HomePage"id="return" value="NO">
  		</form>
    </div>
  </div>
  <script>


</body>
</html>
