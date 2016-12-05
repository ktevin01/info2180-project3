<!DOCTYPE html>
<html>
<title>Homepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">

<link rel="stylesheet" href="Cheapostyle.css">
<style>

</style><head>
<script>
function showUser() {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q=",true);
        xmlhttp.send();

}
</script></head>

<body onload="showUser()" onmouseover="showUser()">


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
<br/>
<br/>
<br/>
<br/>
<div id="txtHint"><b></b></div>


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
