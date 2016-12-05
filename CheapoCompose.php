  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <title>W3.CSS Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" type="text/css" href="CheapoLogin.css"/>
  <link rel="stylesheet" href="Cheapostyle.css">
</head>
  <body >


    <?php
    session_start();
        $error=$recp=$body=$subject="";
        if (isset($_POST['submit']))
        {
               function validation($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
              }

            if (empty($_POST['Subject'])||empty($_POST['Recipient'])||empty($_POST['message'])) {
          			$error = "Missing Field";
                $subject=validation($_POST['Subject']);
                $recp=validation($_POST['Recipient']);
                $body=validation($_POST['message']);
          	}
          	else{

          		$subject=validation($_POST['Subject']);
          		$recp=validation($_POST['Recipient']);
              $body=validation($_POST['message']);

              $servername = "localhost";
              $username = "root";
              $password = "";

              try {
                  $conn = new PDO("mysql:host=$servername;dbname=Cheapo", $username, $password);
                  // set the PDO error mode to exception
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql=" INSERT into Message(recipient_ids,user_id,subject,body,date_sent)values('$recp',{$_SESSION['user.id']},'$subject ','$body',now())";
                  $conn->exec($sql);
                  $error="Message sent";
                  $recp=$body=$subject="";
                  }
              catch(PDOException $e)
                  {
                  echo "Connection failed: " . $e->getMessage();
                  }


            }
          }

    ?>




<div id="top">
    <p style="text-align:center;">Welcome to CheapoMail</p>
<div class="dropdown">
  <button class="dropbtn">☰</button>
  <div class="dropdown-content">
  <a href="CheapoCompose.php" onclick="w3_close()">Compose New</a>
  <a href="Homepage.php" onclick="w3_close()">Inbox</a>
  <a href="CheapoSent.php" onclick="w3_close()">Sent</a>
  <a href="CheapoContact.php" onclick="w3_close()">Contact List</a>
  <a href="CheapoLogout.php" onclick="w3_close">User Logout</a>
  </div>
</div>
</div>

    <div class="login-page">
      <div class="form">
        <form name="User Login"  method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="name" value="<?php echo $_SESSION['first.name'] ;?>">
            <input type="text" name="Subject" placeholder="Subject" value="<?php echo $subject;?>">
            <input type="text" name="Recipient"  placeholder="Recipients" value="<?php echo $recp;?>">
            <textarea name="message" type="text" id="input-message" placeholder="Message" style="height:169px width: 285px" value="<?php echo $body;?>"></textarea>
          <input type="submit" value="Send" name="submit">
          <span><?php echo $error; ?></span>
        </form>

      </div>
    </div>

  <script>
  function w3_open() {
      document.getElementById("mySidenav").style.display = "block";
  }
  function w3_close() {
      document.getElementById("mySidenav").style.display = "none";
  }
  </script>

</body>
</html>
