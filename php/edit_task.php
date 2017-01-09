<?php
  require_once 'config.php';
  require_once 'functions.php';
  $tasker=new Tasker;
  //check for DB connection
  $connect=$tasker->connectDB();
  if ($connect->connect_errno) {
    die("There is no connection to the DB");
  }
  //check for injections
  $task=$tasker->implementFilters($_REQUEST["task"], $connect);
  $status=$_REQUEST["status"];
  $id=$_REQUEST["id"];
  //update data in the DB
  $lock=$connect->query("LOCK TABLES `urls` WRITE");
  $success=$connect->query("UPDATE `tasks` SET `task`='$task', `status`='$status' WHERE `id`='$id'");
  $unlock=$connect->query("UNLOCK TABLES");
  $connect->close();
  echo "Update has been done";
?>
