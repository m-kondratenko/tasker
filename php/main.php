<?php
  require_once 'config.php';
  require_once 'functions.php';
  $tasker=new Tasker;
  //check for DB connection
  $connect=$tasker->connectDB();
  if ($connect->connect_errno) {
    die("There is no connection to the DB");
  }
  //load tasks from the DB
  $tasks=$tasker->getData($connect);
  $connect->close();
  //write loaded data into the table
  for ($i=0; $i<count($tasks); $i++) {
    echo '<tr><td id="num">'.$tasks[$i]["id"].'</td>
      <td>'.$tasks[$i]["username"].'</td>
      <td>'.$tasks[$i]["email"].'</td>
      <td id="taskCol">'.$tasks[$i]["task"].'</td>
      <td id="statusCol">'.$tasks[$i]["status"].'</td>
      <td><img src="'.$tasks[$i]["imagelink"].'"/></td></tr>';
  }
  ?>
