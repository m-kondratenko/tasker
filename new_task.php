<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Task Manager</title>
    <link rel="stylesheet" href="css/style.css" title="test beejee">
    <script src="js/jquery.min.js"></script>
    <script src="js/new_task.js"></script>
  </head>
  <body>
    <?php
      require_once "php/header.php"
    ?>
    <h1>Task Manager</h1>
    <input class="input" type="text" placeholder="Username" id="username" maxlength="25"><br>
    <input class="input" type="text" placeholder="Email" id="email" maxlength="32"><br>
    <textarea class="text" id="task" placeholder="Type your task here"></textarea><br>
    <input class="input" type="text" placeholder="Link for image" id="imageLink" maxlength="128"><br>
    <input class="button" type="button" id="send" value="Send">
    <input class="button" type="button" id="preview" value="Preview"><br>
    <div class="view" id="messageShow"></div>
    <div class="view" id="view"></div>
  </body>
</html>
