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
    <script src="js/jquery.tablesorter.js"></script>
    <script>
      $(document).ready(function() {
        $("table").tablesorter({
          headers: {
            3: { sorter: false },
            5: { sorter: false }
          }
        });
      })
    </script>
  </head>
  <body>
    <?php
      require_once "php/header.php"
    ?>
    <h1>Task Manager</h1><br>
    <form id="editForm" method="post">
      <div class="text">You can edit text and status of the task №<span id="editID"></span></div>
      <textarea class="input" id="taskEdit"></textarea><br>
      <input class="input" type="text" id="statusEdit" maxlength="1"><br>
      <input class="button" type="button" id="edit" value="Send">
      <div class="text" id="editMes"></div>
      <p></p>
    </form>
    <table class="tablesorter">
      <thead>
        <tr>
          <th>№</th>
          <th>Username</th>
          <th>Email</th>
          <th>Task</th>
          <th>Status</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody class="text" id="body">
        <?php
          require_once "php/main.php"
        ?>
      </tbody>
    </table>
  </body>
</html>
