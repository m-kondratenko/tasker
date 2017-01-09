<?php
require_once 'config.php';
if (!empty($_GET["logout"])) {
 unset($_SESSION["logged"], $_SESSION["login"]);
}
//check if credentials are ok
if (!empty($_POST["login"])&&(!empty($_POST["password"]))) {
 if (($_POST["login"]==ADMIN_LOGIN)&&($_POST["password"]==ADMIN_PASSWORD)) {
   $_SESSION["logged"]=1;
   $_SESSION["login"]=ADMIN_LOGIN;
 }
}
//show logon form if not logged
if ((!isset($_SESSION["logged"]))||(empty($_SESSION["logged"]))) {
 ?>
 <br>
 <form action="index.php" method="post">
   <input class="admin" type="text" placeholder="Admin login" name="login" maxlength="25"/>
   <input class="admin" type="password" placeholder="Admin password" name="password" maxlength="32"/>
   <input class="admin" type="submit" value="Send" />
 </form>
 <script>
   $(document).ready(function() {
     $("#editForm").hide();
   })
 </script>
 <?php
  }
  //show message if logged
  else {
 ?>
 <br>
 <p class="small_text">You have been authorized as <?=$_SESSION["login"]?>.
 <a href="/index.php?logout=1">Logout</a></p>
 <script src="js/main.js"></script>
 <?php
}
?>
